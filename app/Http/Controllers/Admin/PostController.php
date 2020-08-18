<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\admin;
use App\Model\User\post;
use App\Model\User\postcategory;
use App\Model\User\tag;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = admin::where('status',1)->first();
        $posts = post::all();
        $categories = postcategory::all();
        $tags = tag::all();
        return view('admin.blog.post.index',compact('admin','posts','categories','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'image'=>'nullable',
            'image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|unique:posts',
            'body' => 'required',
        ]);


        if($request->hasFile('image'))
        {
            $imageName = $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
        }
        else
        {
            $imageName = 'noimage.jpg';
        }
        $admin = Auth::guard('admin')->user();
        $name = $admin->name;

        $post =  new post();
        $post->title = $request->title;
        $post->image = $imageName;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->posted_by = $name;
        $post->save(); 
        $post->tags()->sync($request->tags);      
        $post->categories()->sync($request->categories);
        $notification = array(
                'message' => 'Post Add Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('post.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = admin::where('status',1)->first();
        $post =  post :: with('tags','categories','comments')->where('id',$id)->first();
        $tags = tag::all();
        $categories = postcategory::all();

        return view('admin.blog.post.show',compact('admin','post','tags','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = admin::where('status',1)->first();
        $posts =  post :: with('tags','categories')->where('id',$id)->first();
        $tags = tag::all();
        $categories = postcategory::all();
        return view('admin.blog.post.edit',compact('admin','posts','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'image'=>'nullable',
            'image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required',
            'body' => 'required',
        ]);


        if($request->hasFile('image'))
        {
            $imageName = $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
        }
        else
        {
            $data = post::where('id',$id)->first();
            $imageName = $data->image;
        }

        $post =  post::find($id);
        $post->title = $request->title;
        $post->image = $imageName;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->tags()->sync($request->tags);      
        $post->categories()->sync($request->categories);
        $post->save(); 
        $notification = array(
                'message' => 'Post Update Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('post.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        $notification = array(
                'message' => 'Post destroy.', 
                'alert-type' => 'error',
            );
        return redirect()->back()->with($notification);
    }
}

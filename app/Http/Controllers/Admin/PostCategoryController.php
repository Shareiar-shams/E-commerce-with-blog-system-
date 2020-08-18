<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\admin;
use App\Model\User\postcategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
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
        $categories = postcategory::all();
        return view('admin.blog.category.show',compact('admin','categories'));
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
            'name'=>'required',
            'slug' => 'required',
        ]);
        $category = new postcategory();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();       
        $notification = array(
                'message' => 'Category Added Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('post-category.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $categories = postcategory::where('id',$id)->first();
        return view('admin.blog.category.edit',compact('admin','categories'));
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
            'name'=>'required',
            'slug' => 'required',
        ]);
        $category = postcategory::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();       
        $notification = array(
                'message' => 'Category Added Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('post-category.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        postcategory::where('id',$id)->delete();
        $notification = array(
                'message' => 'Category destroy.', 
                'alert-type' => 'error',
            );
        return redirect()->back()->with($notification);
    }
}

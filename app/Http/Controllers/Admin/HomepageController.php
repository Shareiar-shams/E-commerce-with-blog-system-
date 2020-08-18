<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\admin;
use App\Model\Admin\slideingimage;
use Illuminate\Http\Request;

class HomepageController extends Controller
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
        $sliders = slideingimage::all();
        return view('admin.page.homepage',compact('admin','sliders'));
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
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:30',
            'subtitle' => 'required',
        ]);
         if($request->hasFile('filename'))
        {
            $imageName = $request->filename->getClientOriginalName();
            $imageName = $request->filename->store('public');
        }
        else
        {
            $imageName = 'noimage.jpg';
        }
        $sliders =  new slideingimage();
        $sliders->title = $request->title;
        $sliders->filename = $imageName;
        $sliders->subtitle = $request->subtitle;
        $sliders->status = $request->status;
        $sliders->price = $request->price;
        $sliders->newprice = $request->newprice;
        $sliders->save();      
        $notification = array(
                'message' => 'File Add Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('HomePage.index'))->with($notification);    
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
        $sliders = slideingimage::where('id',$id)->first();
        return view('admin.page.editimage',compact('admin','sliders'));
    }

    public function fiexdImage($id)
    {
        $admin = admin::where('status',1)->first();
        $sliders = slideingimage::where('id',$id)->first();
        return view('admin.page.fixedimagesedit',compact('admin','sliders'));
    }

    public function offerarea($id)
    {
        $admin = admin::where('status',1)->first();
        $sliders = slideingimage::where('id',$id)->first();
        return view('admin.page.offerarea',compact('admin','sliders'));
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
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|max:30',
            'subtitle' => 'required',
        ]);
         if($request->hasFile('filename'))
        {
            $imageName = $request->filename->getClientOriginalName();
            $imageName = $request->filename->store('public');
        }
        else
        {
            $li = slideingimage::where('id',$id)->first();
            $imageName = $li->image;
        }
        $sliders =  slideingimage::find($id);
        $sliders->title = $request->title;
        $sliders->filename = $imageName;
        $sliders->subtitle = $request->subtitle;
        $sliders->status = $request->status;
        $sliders->price = $request->price;
        $sliders->newprice = $request->newprice;
        $sliders->save();      
        $notification = array(
                'message' => 'File Updated Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('HomePage.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        slideingimage::where('id',$id)->delete();
        $notification = array(
                'message' => 'Image destroy.', 
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\admin;
use App\Model\Admin\fontedit;
use App\Model\Admin\socialmedia;
use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
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
        return view('admin.dashboard',compact('admin'));
    }

    /**
     * Show the form for creating a new resource widget heading part editing.
     *
     * @return \Illuminate\Http\Response
     */
    public function header_edit()
    {
        $c = DB::table('fontedits')->count();
        if($c>0)
        {
            $admin = admin::where('status',1)->first();
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            return view('admin.widget.headeredit',compact('admin','logos','medias'));
        }
        else
        {
            DB::table('fontedits')->insert(array("logo"=>'noimage.jpg',"phoneNo"=>'+8801770129781'));
            $admin = admin::where('status',1)->first();
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            return view('admin.widget.headeredit',compact('admin','logos','medias'));
        }
    }

    /**
     * Show the form for creating a new resource Social Media part editing.
     *
     * @return \Illuminate\Http\Response
     */
    public function media_edit()
    {
         $c = DB::table('fontedits')->count();
        if($c>0)
        {
            $admin = admin::where('status',1)->first();
            $media = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
           return view('admin.widget.socialiconedit',compact('admin','logos','media'));
        }
        else
        {
            DB::table('fontedits')->insert(array("logo"=>'noimage.jpg',"phoneNo"=>'01770129781'));
            $admin = admin::where('status',1)->first();
            $media = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            return view('admin.widget.socialiconedit',compact('admin','logos','media'));
        }
        
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
            'title'=>'required',
            'fontawsomeicon' => 'required',
            'link' => 'required',
        ]);
        $icon = new socialmedia();
        $icon->title = $request->title;
        $icon->fontawsomeicon = $request->fontawsomeicon;
        $icon->link = $request->link;
        $icon->save();       
        $notification = array(
                'message' => 'Media Icon Added Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('social_media'))->with($notification);
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
        $specificmedia = socialmedia::where('id',$id)->first();
        return view('admin.widget.mediaiconupdate',compact('admin','specificmedia'));
    }

    /**
     * Update the specified resource in Social Media Icon.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function icon_update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required',
            'fontawsomeicon' => 'required',
            'link' => 'required',
        ]);
        $icon = socialmedia::find($id);
        $icon->title = $request->title;
        $icon->fontawsomeicon = $request->fontawsomeicon;
        $icon->link = $request->link;
        $icon->save();       
        $notification = array(
                'message' => 'Media Icon Update Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('social_media'))->with($notification);
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
            'logo'=>'required|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
        ]);
        if($request->hasFile('logo'))
        {
            $imageName = $request->logo->getClientOriginalName();
            $imageName = $request->logo->store('public');
        }
        else
        {
            $imageName = 'noimage.jpg';
        }
        $logo = fontedit::find($id);
        $logo->logo = $imageName;
        $logo->save();       
        $notification = array(
                'message' => 'Logo Update Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('headerediting'))->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function number(Request $request, $id)
    {
        $this->validate($request,[
            'phoneNo'=>'required|integer|max:10',
        ]);
        $logo = fontedit::find($id);
        $logo->phoneNo = '+880'.$request->phoneNo;
        $logo->save();       
        $notification = array(
                'message' => 'Number Update Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('headerediting'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        socialmedia::where('id',$id)->delete();
        $notification = array(
                'message' => 'Social Media Icon destroy.', 
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
    }
}

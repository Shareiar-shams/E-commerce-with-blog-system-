<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        return view('admin.profile',compact('admin'));
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
        //
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
        //
    }
    /**
     * Update the specified resource in password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password($id)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required|alphaNum|min:6',
            'confirm_password'=>'required_with:password|same:password|min:6',
            'old_password' => 'required|alphaNum',
        ]);
        $admin = admin::find(Auth::guard('admin')->user()->id);
        if (!Hash::check($request['old_password'], $admin->password)) {
              return back()->with('error', 'The specified password does not match the old password');
        }
        else
        {
           $admin->name = $request->name;
           $admin->email = $request->email;
           $admin->password = bcrypt($request->password);
           $admin->save();
           $notification = array(
                'message' => 'Password Change Successfully!', 
                'alert-type' => 'success'
            );


           return redirect()->back()->with($notification);
        }
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
            'email'=>'required',
            'position'=>'required',
            'image'=>'nullable|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'experience'=>'nullable',
            'location'=>'nullable',
        ]);
        if($request->hasFile('image'))
        {
            $imageName = $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
        }
        else
        {
            $li = admin::where('id', '=', Auth::guard('admin')->user()->id)->first();
            $imageName = $li->image;
        }
        $admin = admin::find(Auth::guard('admin')->user()->id);
        $admin->name = $request->name;
        $admin->position = $request->position;
        $admin->email = $request->email;
        $admin->image = $imageName;
        $admin->experience = $request->experience;
        $admin->location = $request->location;
        $admin->save();       
        $notification = array(
                'message' => 'Profile Update Successfully!', 
                'alert-type' => 'success'
            );
        return redirect(route('profile.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

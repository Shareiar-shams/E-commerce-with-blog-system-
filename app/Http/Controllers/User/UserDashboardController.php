<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\User\orderproduct;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slug = Auth::user()->slug;
        $user = User::where('slug',$slug)->first();
        $pandingorder = orderproduct::all()->where('user_slug',$slug);
        return view('user.deshboard.dashboard',compact('user','pandingorder'));
    }

    public function completeorder()
    {
        $slug = Auth::user()->slug;
        $user = User::where('slug',$slug)->first();
        $completeorder = orderproduct::all()->where('user_slug',$slug);
        return view('user.deshboard.completeorder',compact('user','completeorder'));
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
        $slug = Auth::user()->slug;
        $user = User::where('slug',$slug)->first();
        $products = orderproduct::where('id',$id)->orWhere('status',0)->first();
        return view('user.deshboard.view',compact('user','products'));
    }

    public function myprofile($slug)
    {
        $user = User::where('slug',$slug)->first();
        return view('user.deshboard.profile',compact('user'));
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
            'image'=>'nullable|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'phoneNo'=>'required',
            'location'=>'nullable',
        ]);
        if($request->hasFile('image'))
        {
            $imageName = $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
        }
        else
        {
            $li = User::where('id', '=',$id)->first();
            $imageName = $li->image;
        }
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->image = $imageName;
        $admin->phoneNo = $request->phoneNo;
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

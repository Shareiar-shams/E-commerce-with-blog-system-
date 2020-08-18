<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\admin;
use App\Model\Admin\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
        $testimonials = testimonial::all();
        return view('admin.testimonial.show',compact('admin','testimonials'));
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
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Critic_Name' => 'required|max:30',
            'Critic_location' => 'nullable',
            'Company_name' => 'nullable',
            'text' => 'required',
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
        $testimonials =  new testimonial();
        $testimonials->Critic_Name = $request->Critic_Name;
        $testimonials->image = $imageName;
        $testimonials->Critic_location = $request->Critic_location;
        $testimonials->Company_name = $request->Company_name;
        $testimonials->text = $request->text;
        $testimonials->save();      
        $notification = array(
                'message' => 'Testimonial Add Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('Testimonial.index'))->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $testimonials = testimonial::where('id',$id)->first();
        return view('admin.testimonial.edit',compact('admin','testimonials'));
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
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'Critic_Name' => 'required|max:30',
            'Critic_location' => 'nullable',
            'Company_name' => 'nullable',
            'text' => 'required',
        ]);
         if($request->hasFile('image'))
        {
            $imageName = $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
        }
        else
        {
            $li = testimonial::where('id',$id)->first();
            $imageName = $li->image;
        }
        $testimonials = testimonial::find($id);
        $testimonials->Critic_Name = $request->Critic_Name;
        $testimonials->filename = $imageName;
        $testimonials->Critic_location = $request->Critic_location;
        $testimonials->Company_name = $request->Company_name;
        $testimonials->text = $request->text;
        $testimonials->save();      
        $notification = array(
                'message' => 'Testimonial Update Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('Testimonial.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        testimonial::where('id',$id)->delete();
        $notification = array(
                'message' => 'Testimonial destroy.', 
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
    }
}

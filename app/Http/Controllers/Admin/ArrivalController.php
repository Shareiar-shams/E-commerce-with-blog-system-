<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\ArrivalCategory;
use App\Model\Admin\admin;
use App\Model\Admin\arrival;
use Illuminate\Http\Request;

class ArrivalController extends Controller
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
        $arrivals = arrival::all();
        $categories = ArrivalCategory::all();
        return view('admin.arrival.show',compact('admin','arrivals','categories'));
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
            'image'=>'required|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'slug' => 'required',
            'price' => 'required',
            'text' => 'nullable',
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

        $arrival =  new arrival();
        $arrival->image = $imageName;
        $arrival->slug = $request->slug;
        $arrival->price = $request->price;
        $arrival->text = $request->text;
        $arrival->status = $request->status;
        $arrival->save(); 
        $arrival->categories()->sync($request->categories);      
        $notification = array(
                'message' => 'Arrival Add Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('Arrivals.index'))->with($notification);
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
        $arrivals = arrival::with('categories')->where('id',$id)->first();
        $categories = ArrivalCategory::all();
        return view('admin.arrival.edit',compact('admin','arrivals','categories'));
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
            'image'=>'nullable|sometimes|image|mimes:jpeg,bmp,png,jpg,svg|max:2000',
            'slug' => 'required',
            'price' => 'required',
            'text' => 'nullable',
            'status' => 'required',
        ]);

        if($request->hasFile('image'))
        {
            $imageName = $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
        }
        else
        {
            $li = arrival::where('id',$id)->first();
            $imageName = $li->image;
        }

        $arrival =  arrival::find($id);
        $arrival->image = $imageName;
        $arrival->slug = $request->slug;
        $arrival->price = $request->price;
        $arrival->text = $request->text;
        $arrival->status = $request->status;
        $arrival->categories()->sync($request->categories);      
        $arrival->save(); 
        $notification = array(
                'message' => 'Arrival Add Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('Arrivals.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        arrival::where('id',$id)->delete();
        $notification = array(
                'message' => 'Arrival destroy.', 
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\ArrivalCategory;
use App\Model\Admin\admin;
use Illuminate\Http\Request;

class ArrivalCategoryController extends Controller
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
        $categories = ArrivalCategory::all();
        return view('admin.arrivalcategory.show',compact('admin','categories'));
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
            'categoryName'=>'required',
            'slug' => 'required',
        ]);
        $category = new ArrivalCategory();
        $category->categoryName = $request->categoryName;
        $category->slug = $request->slug;
        $category->save();       
        $notification = array(
                'message' => 'Category Added Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('Arrivalscategory.index'))->with($notification);
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
        $categories = ArrivalCategory::where('id',$id)->first();
        return view('admin.arrivalcategory.edit',compact('admin','categories'));   
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
            'categoryName'=>'required',
            'slug' => 'required',
        ]);
        $category = ArrivalCategory::find($id);
        $category->categoryName = $request->categoryName;
        $category->slug = $request->slug;
        $category->save();       
        $notification = array(
                'message' => 'Category Edit Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('Arrivalscategory.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ArrivalCategory::where('id',$id)->delete();
        $notification = array(
                'message' => 'Category destroy.', 
                'alert-type' => 'error',
            );
        return redirect()->back()->with($notification);
    }
}

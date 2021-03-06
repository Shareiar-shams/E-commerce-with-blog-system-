<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\admin;
use App\Model\Admin\product_category;
use App\Model\Admin\subcategory;
use Illuminate\Http\Request;


class ProductSubCategoryController extends Controller
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
        $categories = subcategory::all();
        $product_categories = product_category::all();
        return view('admin.shop.subcategory.show',compact('admin','categories','product_categories'));
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
            'slug' => 'required',
        ]);
        $category = new subcategory();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->save();
        $category->categories()->sync($request->categories);         
        $notification = array(
                'message' => 'Sub Category Added Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('subcategory.index'))->with($notification);
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
        $categories = subcategory::with('categories')->where('id',$id)->first();
        $product_categories = product_category::all();
        return view('admin.shop.subcategory.edit',compact('admin','categories','product_categories'));
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
            'title'=>'required',
            'slug' => 'required',
        ]);
        $category = subcategory::find($id);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->categories()->sync($request->categories);       
        $category->save();
        $notification = array(
                'message' => 'Category Edit Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('subcategory.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subcategory::where('id',$id)->delete();
        $notification = array(
                'message' => 'Category destroy.', 
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
    }
}

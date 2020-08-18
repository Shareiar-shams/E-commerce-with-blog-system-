<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\product;
use App\Model\Admin\subcategory;
use App\Model\Admin\admin;

class ProductController extends Controller
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
        $products = product::all();
        $subcategories = subcategory::all();
        return view('admin.shop.product.show',compact('admin','products','subcategories'));
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
            'title' => 'required|unique:products',
            'images'=>'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required|unique:products',
            'price' => 'required',
            'newprice' => 'nullable',
            'details' => 'required',
            'displayimage' => 'required',
            'displayimage.*' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'size' => 'required',
            // 'color' => 'required',
        ]);


        if($request->hasFile('displayimage'))
        {
            $imageName1 = $request->displayimage->getClientOriginalName();
            $imageName1 = $request->displayimage->store('public');
        }
        else
        {
            $imageName1 = 'noimage.jpg';
        }

        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $imageName=$image->getClientOriginalName();
                $image->move(public_path().'/image/',$imageName);
                $data[] = $imageName;
            }
        }
        else
        {
            $data[] = 'noimage.jpg';
        }

        foreach ($request->size as $sizes) {
            $s[] = $sizes;
        }

        foreach ($request->color as $colors) {
            $c[] = $colors;
        }

        $product =  new product();
        $product->title = $request->title;
        $product->displayimage = $imageName1;
        $product->images =json_encode($data);
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->newprice = $request->newprice;
        $product->details = $request->details;
        $product->size = json_encode($s);
        $product->color = json_encode($c);
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->save(); 
        $product->subcategories()->sync($request->subcategories);      
        $notification = array(
                'message' => 'Product Add Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('product.index'))->with($notification);
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
        $products = product::where('id',$id)->first();
        return view('admin.shop.product.showproduct',compact('admin','products'));

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
        $products = product::with('subcategories')->where('id',$id)->first();
        $subcategories = subcategory::all();
        return view('admin.shop.product.edit',compact('admin','products','subcategories'));
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
            'images'=>'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'required',
            'price' => 'required',
            'newprice' => 'nullable',
            'details' => 'required',
            'displayimage' => 'required',
            'displayimage.*' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'size' => 'required',
            // 'color' => 'required',
        ]);

        if($request->hasFile('displayimage'))
        {
            $imageName1 = $request->displayimage->getClientOriginalName();
            $imageName1 = $request->displayimage->store('public');
        }
        else
        {
            $li = product::where('id',$id)->first();
            $imageName1 = $li->image;
        }

        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $imageName=$image->getClientOriginalName();
                $image->move(public_path().'/image/',$imageName);
                $data[] = $imageName;
            }
        }
        else
        {
            $li = product::where('id',$id)->first();
            foreach(json_decode($li->images) as $image)
            {
                $data[] = $image;
            }
            
        }

        foreach ($request->size as $sizes) {
            $s[] = $sizes;
        }

        foreach ($request->color as $colors) {
            $c[] = $colors;
        }

        $product =  product::find($id);
        $product->title = $request->title;
        $product->displayimage = $imageName1;
        $product->images =json_encode($data);
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->newprice = $request->newprice;
        $product->details = $request->details;
        $product->size = json_encode($s);
        $product->color = json_encode($c);
        $product->status = $request->status;
        $product->stock = $request->stock;
        $product->subcategories()->sync($request->subcategories);      
        $product->save(); 
        $notification = array(
                'message' => 'Product Update Successfully!', 
                'alert-type' => 'success',
            );
        return redirect(route('product.index'))->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::where('id',$id)->delete();
        $notification = array(
                'message' => 'Product destroy.', 
                'alert-type' => 'error'
            );
        return redirect()->back()->with($notification);
    }
}

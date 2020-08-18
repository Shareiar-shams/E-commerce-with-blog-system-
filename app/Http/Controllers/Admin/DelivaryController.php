<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\User\orderproduct;
use Illuminate\Http\Request;
use App\Model\Admin\admin;
use Nexmo\Laravel\Facade\Nexmo;
use Auth;

class DelivaryController extends Controller
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
        $pandingorder = orderproduct::all()->where('status',0);
        return view('admin.productorder.pendingorder',compact('admin','pandingorder'));
    }

    public function ordercomplete()
    {
        $admin = admin::where('status',1)->first();
        $completeorder = orderproduct::all()->where('status',1);
        return view('admin.productorder.completeorder',compact('admin','completeorder'));
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
            'country'=>'required',
            'address'=>'required',
            'city'=>'required',
            'postcode'=>'required',
            'phoneNo' => 'required',
            'email' => 'required',
            'customCheck1'=>'required',
        ]);

        foreach ($request->slug as $slug) {
            $s[] = $slug;
        }
        foreach ($request->pname as $productname) {
            $p[] = $productname;
        }
        foreach ($request->pquantity as $productquantity) {
            $q[] = $productquantity;
        }
        foreach ($request->image as $image_path) {
            $image[] = $image_path;
        }


        $order = new orderproduct();
        $order->name = $request->name;
        $order->user_slug = $request->user_slug;        
        $order->country = $request->country;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->postcode = $request->postcode;
        $order->phoneNo = $request->phoneNo;
        $order->email = $request->email;
        $order->slug = json_encode($s);
        $order->pname = json_encode($p);
        $order->pquantity = json_encode($q);
        $order->image = json_encode($image);
        $order->total = $request->total;
        $order->de_method = 'cash on delievery';
        $order->status = '0';
        $order->save(); 
        return redirect()->back()->with('success_msg', 'Thanks for Order the Product wait for our message!');

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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request,[
            'status'=>'required',
        ]);


        $phoneNo = $request->phoneNo;
        $name = $request->name;
        $orderdate = $request->orderdate;
        $orderdate = $request->orderdate;
        $totalbil = $request->totalbil;
        $productname = $request->productname;
        $productquantity = $request->productquantity;
        $text="Dear Sir". $name ." your order has been complete which you placed on the". $orderdate.". Product Name: " . $productname . " & Quantity of the product are:". $productquantity . " Total bil are :". $totalbil.". The delivary boy will come and understand your product from him in the middle of today. Check your product while the delivary boy is there. In fack, no complaint will be accepted if the delivary boy is deceived. If you like or product, please review it on our Facebook page. Thanks a lot sir.";
        $order = orderproduct::find($id);
        $order->status = $request->status;
        $order->save();
        $notification = array(
                    'message' => 'Order Complete, Chack the complete page.', 
                    'alert-type' => 'success',
                    );

         Nexmo::message()->send([
            'to'   => $phoneNo,
            'from' => config('app.name'),
            'text' => $text,
        ]);
        return redirect(route('delivary.index'))->with($notification);
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

<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Model\Admin\fontedit;
use App\Model\Admin\socialmedia;
use App\Model\Admin\subcategory;

class CartController extends Controller
{
    public function index()
    {
    	if (Auth::check()) 
        {
            $medias = socialmedia::all();
            $logos = fontedit::where('id',1)->first();
            $subcategories = subcategory::all();
            $cartCollection = \Cart::getContent();
            return view('user.cart',compact('medias','logos','subcategories'))->with(['cartCollection' => $cartCollection]);
        }
        return redirect(route('login'));
    }

    public function add(Request$request)
    {
        if (Auth::check()) 
        {
            $this->validate($request,[
                'id' => 'required',
                'price'=>'required',
                'quantity' => 'required|numeric|min:1',
                'name' => 'required',
                'size' => 'required',
                'color' => 'required',
                'details' => 'required',
                'slug' => 'required',
                'newprice' => 'required|numeric|min:1',
            ]);
            \Cart::add(array(
                'id' => $request->id,
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'details' => $request->details,
                'size' => $request->size,
                'color' => $request->color,
                'newprice' => $request->newprice,
                'slug' => $request->slug,
                'attributes' => array(
                    'image' => $request->img,
                )
            ));
            return redirect()->route('cart')->with('success_msg', 'Item is Added to Cart!');
        }
        return redirect(route('login'));
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->route('cart')->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request)
    {
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart')->with('success_msg', 'Car is cleared!');
    }

    public function cartTocheckout()
    {
        $user = Auth::user()->slug;
        $td = \Cart::getContent();
        $medias = socialmedia::all();
        $logos = fontedit::where('id',1)->first();
        $subcategories = subcategory::all();
        return view('user.checkout',compact('td','medias','logos','subcategories','user'));
    }

}

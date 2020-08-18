@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Cart</title>
@endsection

@section('css_content')

@endsection

@section('main_content')
	<!-- ****** Cart Area Start ****** -->
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        @if(session()->has('success_msg'))
                            <p class="alert alert-success" role="alert">{{session ('success_msg')}}</p>
                        @endif

                        @if(session()->has('alert_msg'))
                            <p class="alert alert-success" role="alert">{{session ('alert_msg')}}</p>
                        @endif

                        @if ($errors->any())
                  
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger" role="alert">{{$error}}</p>
                            @endforeach
                                               
                        @endif
                        @if(\Cart::getTotalQuantity()>0)
                            <div class="cart-title">
                            <h4>{{ \Cart::getTotalQuantity()}} Product(s) In Your Cart</h4><br>
                            </div>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartCollection as $item)
                                    <tr>
                                        <td class="cart_product_img d-flex align-items-center">
                                            <a href="#"><img src="{{Storage::disk('local')->url($item->attributes->image)}}"></a>
                                            <h6>{{$item->name}}</h6>
                                        </td>
                                        <td class="align-items-center"><span>{{$item->size}}</span></td>
                                        <td class="align-items-center"><span>{{$item->color}}</span></td>
                                        <td class="price">
                                            @if($item->newprice > 1 )
                                            <span>{{$item->newprice}}</span>
                                            @else
                                            <span>${{$item->price}}</span>
                                            
                                            @endif
                                        </td>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                        {{csrf_field()}}
                                            <td class="qty">
                                                <div class="quantity">
                                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                    <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity" value="{{ $item->quantity }}">
                                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                                </div>
                                            </td>
                                            <td class="total_price"><span>${{ \Cart::get($item->id)->getPriceSum() }}</span></td>
                                            <td>
                                                <button class="btn btn-secondary btn-sm" style="margin-right: 25px;"><i class="fa fa-edit"></i></button>
                                            </td>
                                        </form>
                                            <td>
                                                <form action="{{ route('cart.remove') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                                    <button class="btn btn-dark btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>No Product(s) In Your Cart</h4><br>
                        @endif
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="{{route('shop')}}">Continue shooping</a>
                        </div>
                        <div class="update-checkout w-50 text-right">
                            @if(count($cartCollection)>0)
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    {{ csrf_field() }}
                                    <button type="submit">Clear Cart</button>
                                </form>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="coupon-code-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cupon code</h5>
                            <p>Enter your cupone code</p>
                        </div>
                        <form>
                            <input type="search" name="search" placeholder="#569ab15">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="shipping-method-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Shipping method</h5>
                            <p>Select the one you want</p>
                        </div>

                        {{-- <div class="custom-control custom-radio mb-30">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio1"><span>Next day delivery</span><span>$4.99</span></label>
                        </div>

                        <div class="custom-control custom-radio mb-30">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio2"><span>Standard delivery</span><span>$1.99</span></label>
                        </div> --}}

                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                            <label class="custom-control-label d-flex align-items-center justify-content-between" for="customRadio3"><span>Personal Pickup</span><span>Free</span></label>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-total-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cart total</h5>
                            <p>Final info</p>
                        </div>
                         @if(count($cartCollection)>0)
                            <ul class="cart-total-chart">
                                <li><span>Subtotal</span> <span>${{ \Cart::get($item->id)->getPriceSum() }}</span></li>
                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span><strong>Total</strong></span><span><strong>${{ \Cart::getTotal() }}</strong></span></li>
                            </ul>
                            <a href="{{route('cartTocheckout')}}" class="btn karl-checkout-btn">Proceed to checkout</a>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Cart Area End ****** -->
@endsection

@section('js_content')

@endsection
@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Checkout</title>
@endsection

@section('css_content')

@endsection

@section('main_content')
	<!-- ****** Checkout Area Start ****** -->
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading">
                            <h5>Billing Address</h5>
                            <p>Enter your cupone code</p>
                        </div>
                        @if ($errors->any())
                  
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger" role="alert">{{$error}}</p>
                            @endforeach
                                               
                        @endif
                        @if(session()->has('success_msg'))
                            <p class="alert alert-success" role="alert">{{session ('success_msg')}}</p>
                        @endif
                        <form action="{{route('delivary.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="first_name">Name <span>*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"  required>
                                </div>
                                <input type="hidden" name="user_slug" value="{{$user}}">
                                <div class="col-12 mb-3">
                                    <label for="country">Country <span>*</span></label>
                                    <select class="custom-select d-block w-100" id="country" name="country">
                                    <option value="usa">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="ger">Germany</option>
                                    <option value="fra">France</option>
                                    <option value="ind">India</option>
                                    <option value="aus">Australia</option>
                                    <option value="bra">Brazil</option>
                                    <option value="cana">Canada</option>
                                    <option value="bng" active>Bangladesh</option>
                                </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="street_address" name="address">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="postcode">Postcode <span>*</span></label>
                                    <input type="text" class="form-control" id="postcode" name="postcode">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" id="phone_number" min="0" name="phoneNo">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" name="email">
                                </div>
                                @foreach($td as $item)
                                <input type="hidden" name="slug[]" value="{{$item->slug}}">
                                <input type="hidden" name="pname[]" value="{{$item->name}}">
                                <input type="hidden" name="pquantity[]" value="{{$item->quantity}}">
                                <input type="hidden" name="image[]" value="{{$item->attributes->image}}">
                                @endforeach
                                <input type="hidden" name="total" value="{{ \Cart::getTotal() }}">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox d-block mb-2">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="customCheck1" required>
                                        <label class="custom-control-label" for="customCheck1">Terms and conitions</label>
                                    </div>
                                    <div class="custom-control custom-checkbox d-block">
                                        <input type="checkbox" name="customCheck3" class="custom-control-input" id="customCheck3">
                                        <label class="custom-control-label" for="customCheck3">Subscribe to our newsletter</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>

                        <ul class="order-details-form mb-4">
                           
                                <li><span>Product</span> <span>Total</span></li>
                            @foreach($td as $item)
                                <li><span>{{$item->name}}</span> <span>${{ \Cart::get($item->id)->getPriceSum() }}</span></li>
                            @endforeach
                                <li><span>Subtotal</span> <span>${{ \Cart::getTotal() }}</span></li>
                                <li><span>Shipping</span> <span>Free</span></li>
                                <li><span>Total</span> <span>${{ \Cart::getTotal() }}</span></li>
                        </ul>


                        <div id="accordion" role="tablist" class="mb-4">
                            {{-- <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-circle-o mr-3"></i>cash on delievery</a>
                                    </h6>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quis in veritatis officia inventore, tempore provident dignissimos.</p>
                                    </div>
                                </div>
                            </div>{{-- 
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-circle-o mr-3"></i>credit card</a>
                                    </h6>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse quo sint repudiandae suscipit ab soluta delectus voluptate, vero vitae</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><i class="fa fa-circle-o mr-3"></i>direct bank transfer</a>
                                    </h6>
                                </div>
                                <div id="collapseFour" class="collapse show" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est cum autem eveniet saepe fugit, impedit magni.</p>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <button type="submit" href="#" class="btn karl-checkout-btn">Place Order</button t>
                    </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ****** Checkout Area End ****** -->
@endsection

@section('js_content')

@endsection
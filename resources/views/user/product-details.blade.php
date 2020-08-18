@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Product Details</title>
@endsection

@section('css_content')

@endsection

@section('main_content')
	<!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area Start <<<<<<<<<<<<<<<<<<<< -->
    <div class="breadcumb_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
                        <li class="breadcrumb-item active">{{$product->title}}</li>
                    </ol>
                    <!-- btn -->
                    <a href="{{route('shop')}}" class="backToHome d-block"><i class="fa fa-angle-double-left"></i> Back to Shop</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area End <<<<<<<<<<<<<<<<<<<< -->

    <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area Start >>>>>>>>>>>>>>>>>>>>>>>>> -->
    <section class="single_product_details_area section_padding_0_100">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                             <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{Storage::disk('local')->url($product->displayimage)}});">
                                </li>
                                @foreach(json_decode($product->images, true) as $images)
                                    <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{asset('/image/'.$images) }});">
                                    </li>
                                @endforeach
                            </ol>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{Storage::disk('local')->url($product->displayimage)}}">
                                    <img class="d-block w-100" src="{{Storage::disk('local')->url($product->displayimage)}}" alt="First slide">
                                </a>
                                </div>
                                @foreach(json_decode($product->images, true) as $images)
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{asset('/image/'.$images) }}">
                                        <img class="d-block w-100" src="{{asset('/image/'.$images) }}" alt="Second slide">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="single_product_desc">

                        <h4 class="title"><a href="#">{{$product->title}}</a></h4>
                        @if($product->newprice == null)
                            <h4 class="price">${{$product->price}}</h4>
                        @else
                            <h4><span class="regular-price">${{$product->price}}</span></h4>
                            <h4 class="price">{{$product->newprice}}</h4>
                        @endif

                        <p class="available">Available:
                        @if($product->stock != 0) 
                            <span class="text-muted">In Stock</span>
                        @else
                            <span class="text-muted">Stock Out</span>
                        @endif
                        </p>

                        <div class="widget size mb-50">
                            <h6 class="widget-title">Size</h6>
                            <div class="widget-desc">
                                <ul>
                                    @foreach(json_decode($product->size) as $sizes)
                                        <li><a href="#">{{$sizes}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="widget size mb-50">
                            <h6 class="widget-title">Color</h6>
                            <div class="widget-desc">
                                <ul>
                                    @foreach(json_decode($product->color) as $color)
                                        <li><a href="#">{{$color}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                         @if ($errors->any())
                  
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger" role="alert">{{$error}}</p>
                            @endforeach
                                               
                        @endif

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix mb-50 d-flex" method="post" action="{{route('cart.store')}}">
                            <div class="quantity">
                                {{ csrf_field() }}
                                    <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                    <input type="hidden" value="{{ $product->title }}" id="name" name="name">
                                    @if($product->newprice == null)
                                            <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                            <input type="hidden" value="1" id="price" name="newprice">
                                    @else
                                            <input type="hidden" value="{{$product->price}}" id="price" name="price">
                                            <input type="hidden" value="{{ $product->newprice }}" id="price" name="newprice">
                                    @endif
                                    <input type="hidden" value="{{ $product->displayimage }}" id="img" name="img">
                                    <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                                    <input type="hidden" value="{{ $product->details }}" id="details" name="details">
                                    <input type="hidden" class="qty-text" id="qty2" value="1" id="quantity" name="quantity">
                                    <input style="font-size: 12px;" class="qty-text" id="qty2" type="number" id="size" name="size" placeholder="Enter Your size">
                                    <input style="font-size: 12px;" class="qty-text" id="qty2" type="text" id="color" name="color" placeholder="choice your color">
                            </div>
                            <button type="submit" name="addtocart" value="5" class="btn cart-submit d-block">Add to cart</button>
                        </form>


                        <div id="accordion" role="tablist">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Product Information</a>
                                    </h6>
                                </div>

                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{$product->details}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h6 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">shipping &amp; Returns</a>
                                    </h6>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>If you want to return or don't want to buy this product then call us or when delivary boy come that's moment you tell him that you don't want to buy this product and also cheack the product. After delivary man come from your house then we can't accept your request for return product or anything.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area End >>>>>>>>>>>>>>>>>>>>>>>>> -->

    <!-- ****** Quick View Modal Area Start ****** -->
   {{--  <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">
                                        <img src="{{asset('user/img/product-img/product-1.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">Boutique Silk Dress</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="price">$120.99 <span>$130</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
                                        <a href="#">View Full Product Details</a>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <form class="cart" method="post">
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                            <input type="number" class="qty-text" id="qty2" step="1" min="1" max="12" name="quantity" value="1">

                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit">Add to cart</button>
                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                        </div>
                                        <!-- Compare -->
                                        <div class="modal_pro_compare">
                                            <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
                                        </div>
                                    </form>

                                    <div class="share_wf mt-30">
                                        <p>Share With Friend</p>
                                        <div class="_icon">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ****** Quick View Modal Area End ****** -->

    <section class="you_may_like_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading text-center">
                        <h2>related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="you_make_like_slider owl-carousel">
                    @foreach($products as $product)
                        <!-- Single gallery Item -->
                        <div class="single_gallery_item">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{Storage::disk('local')->url($product->displayimage)}}" alt="">
                                <div class="product-quicview">
                                    <a href="{{route('product-details',$product->slug)}}"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                @if($product->newprice == null)
                                    <h4 class="product-price">${{$product->price}}</h4>
                                @else
                                    <h4><span class="regular-price">${{$product->price}}</span></h4>
                                    <h4 class="product-price">{{$product->newprice}}</h4>
                                @endif
                                 <p>{{$product->title}}</p>
                                <!-- Add to Cart -->
                                <div class="row">
                                        <div class="col-sm-6 pull-left">
                                            <div class="share_wf mt-30">
                                                <p>Available Size:</p>
                                                <div class="_icon">
                                                    @foreach(json_decode($product->size) as $sizes)
                                                    <a href="#">{{$sizes}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 pull-right">
                                            <div class="share_wf mt-30">
                                                <p>Available Color:</p>
                                                <div class="_icon">
                                                    @foreach(json_decode($product->color) as $color)
                                                    <a href="#">{{$color}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->any())
                  
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger" role="alert">{{$error}}</p>
                                        @endforeach
                                                           
                                    @endif
                                    <!-- Add to Cart -->
                                    <form class="cart" method="post" action="{{route('cart.store')}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $product->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $product->title }}" id="name" name="name">
                                        @if($product->newprice == null)
                                        <input type="hidden" value="{{ $product->price }}" id="price" name="price">
                                        <input type="hidden" value="1" id="price" name="newprice">
                                        @else
                                        <input type="hidden" value="{{$product->price}}" id="price" name="price">
                                        <input type="hidden" value="{{ $product->newprice }}" id="price" name="newprice">
                                        @endif
                                        <input type="hidden" value="{{ $product->displayimage }}" id="img" name="img">
                                        <input type="hidden" value="{{ $product->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="{{ $product->details }}" id="slug" name="details">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <input style="height: 20px; width: 100px; font-size: 10px" type="number" id="size" name="size" placeholder="Enter Your size">
                                        <input style="height: 20px; width: 100px; font-size: 10px" type="text" id="color" name="color" placeholder="choice your color">
                                        <button type="submit" name="addtocart" class="btn cart-submit d-block" style="margin-top: 20px;"> Add to cart</button>
                                    </form>
                            </div>
                        </div>

                    @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_content')

@endsection
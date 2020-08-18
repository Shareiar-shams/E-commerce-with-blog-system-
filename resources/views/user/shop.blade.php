@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Shop</title>
@endsection

@section('css_content')

@endsection

@section('main_content')

	{{-- <!-- ****** Quick View Modal Area Start ****** -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
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

                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">

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
    </div>
    <!-- ****** Quick View Modal Area End ****** --> --}}

    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">
                       
                        <div class="widget catagory mb-50">
                            <!--  Side Nav  -->
                            <div class="nav-side-menu">
                                <h6 class="mb-0">Catagories</h6>
                                <div class="menu-list">
                                    <ul id="menu-content2" class="menu-content collapse out">
                                        <!-- Single Item -->
                                        @foreach($subcategories as $subcategory)
                                        <li><a href="{{route('subcategories',$subcategory->slug)    }}">{{$subcategory->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget recommended">
                            <h6 class="widget-title mb-30">Recommended</h6>

                            <div class="widget-desc">
                            @foreach($product as $product)
                                <!-- Single Recommended Product -->
                                <div class="single-recommended-product d-flex mb-30">
                                    <div class="single-recommended-thumb mr-3">
                                        <img src="{{Storage::disk('local')->url($product->displayimage)}}" alt="">
                                    </div>
                                    <div class="single-recommended-desc">
                                        <h6>{{$product->title}}</h6>
                                        @if($product->newprice == null)
                                            <p>${{$product->price}}</p>
                                        @else
                                            <h5 class="price">{{$product->newprice}} <span>{{$product->price}}</</span></h5>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                        @foreach($products as $product)
                            <!-- Single gallery Item -->
                            <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.3s">
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

                    <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm">
                                <li class="page-item"> {{$products->links()}}</li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_content')
@endsection
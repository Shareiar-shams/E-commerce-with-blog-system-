@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Home</title>
@endsection

@section('css_content')

@endsection

@section('main_content')
    <!-- ****** Welcome Slides Area Start ****** -->
    <section class="welcome_area">
        <div class="welcome_slides owl-carousel">
            <!-- Single Slide Start -->
            @foreach($sliders as $slider)
                @if($slider->status == 0 && $slider->price == null)
                    <div class="single_slide height-800 bg-img background-overlay" style="background-image: url({{Storage::disk('local')->url($slider->filename)}});">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-12">
                                    <div class="welcome_slide_text">
                                        <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">{{$slider->subtitle}}</h6>
                                        <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">{{$slider->title}}</h2>
                                        <a href="#" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <!-- ****** Welcome Slides Area End ****** -->

    <!-- ****** Top Catagory Area Start ****** -->
    <section class="top_catagory_area d-md-flex clearfix">
        <!-- Single Catagory -->
        @foreach($sliders as $slider)
            @if($slider->status != 0 && $slider->price == null)
                <div class="single_catagory_area d-flex align-items-center bg-img" style="background-image: url({{Storage::disk('local')->url($slider->filename)}});">
                    <div class="catagory-content">
                        <h6>{{$slider->subtitle}}</h6>
                        <h2>{{$slider->title}}</h2>
                        <a href="#" class="btn karl-btn">SHOP NOW</a>
                    </div>
                </div>
            @endif
        @endforeach
        <!-- Single Catagory -->
    </section>
    <!-- ****** Top Catagory Area End ****** -->


    <!-- ****** New Arrivals Area Start ****** -->
    <section class="new_arrivals_area section_padding_100_0 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading text-center">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="karl-projects-menu mb-100">
            <div class="text-center portfolio-menu">
                <button class="btn active" data-filter="*">ALL</button>
                @foreach($categories as $category)
                    <button class="btn" data-filter=".{{$category->slug}}">{{$category->categoryName}}</button>
                @endforeach            
            </div>
        </div>

        <div class="container">
            <div class="row karl-new-arrivals">
            @foreach($arrivals as $arrival)
                <!-- Single gallery Item Start -->
                <div class="col-12 col-sm-6 col-md-4 single_gallery_item @foreach($arrival->categories as $category) {{$category->slug}} @endforeach wow fadeInUpBig" data-wow-delay="0.2s">
                    <!-- Product Image -->
                    <div class="product-img">
                        <img src="{{Storage::disk('local')->url($arrival->image)}}" alt="">
                        <div class="product-quicview">
                            <a href="{{route('product-details',$arrival->slug)}}"><i class="ti-plus"></i></a>
                        </div>
                    </div>
                    <!-- Product Description -->
                    <div class="product-description">
                        <h4 class="product-price">{{$arrival->price}}</h4>
                        <p>{{$arrival->text}}</p>
                        <a href="#" data-toggle="modal" data-target="#quickview" class="add-to-cart-btn">ADD TO CART</a>
                    </div>
                </div>

                <!-- ****** Quick View Modal Area Start ****** -->
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
                                            <div class="col-12 col-lg-7">
                                                <!-- Add to Cart Form -->
                                                @if ($errors->any())
                              
                                                    @foreach ($errors->all() as $error)
                                                        <p class="alert alert-danger" role="alert">{{$error}}</p>
                                                    @endforeach
                                                                       
                                                @endif
                                                <!-- Add to Cart -->
                                                <form class="cart" method="post" action="{{route('cart.store')}}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $arrival->id }}" id="id" name="id">
                                                    <input type="hidden" value="{{ $arrival->title }}" id="name" name="name">
                                                    @if($arrival->newprice == null)
                                                    <input type="hidden" value="{{ $arrival->price }}" id="price" name="price">
                                                    <input type="hidden" value="1" id="price" name="newprice">
                                                    @else
                                                    <input type="hidden" value="{{$arrival->price}}" id="price" name="price">
                                                    <input type="hidden" value="{{ $arrival->newprice }}" id="price" name="newprice">
                                                    @endif
                                                    <input type="hidden" value="{{ $arrival->displayimage }}" id="img" name="img">
                                                    <input type="hidden" value="{{ $arrival->slug }}" id="slug" name="slug">
                                                    <input type="hidden" value="{{ $arrival->details }}" id="slug" name="details">
                                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                                    <select>
                                                        <option value="books">Books</option>
                                                        <option value="html">HTML</option>
                                                        <option value="css">CSS</option>
                                                        <option value="php">PHP</option>
                                                        <option value="js">JavaScript</option>
                                                    </select>
                                                    <input style="height: 20px; width: 100px; font-size: 10px" type="text" id="color" name="color" placeholder="choice your color">
                                                    <button type="submit" name="addtocart" value="5" class="cart-submit">Add to cart</button>
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
                <!-- ****** Quick View Modal Area End ****** -->
            @endforeach
            </div>
        </div>
    </section>
    <!-- ****** New Arrivals Area End ****** -->

    <!-- ****** Offer Area Start ****** -->
    @foreach($sliders as $slider)
        @if($slider->price != null)
            <section class="offer_area height-700 section_padding_100 bg-img" style="background-image: url({{Storage::disk('local')->url($slider->filename)}});">
                <div class="container h-100">
                    <div class="row h-100 align-items-end justify-content-end">
                        <div class="col-12 col-md-8 col-lg-6">
                            <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
                                <h2>{{$slider->title}} <span class="karl-level">Hot</span></h2>
                                <p>{{$slider->subtitle}}</p>
                                <div class="offer-product-price">
                                    <h3><span class="regular-price">${{$slider->price}}</span> ${{$slider->newprice}}</h3>
                                </div>
                                <a href="#" class="btn karl-btn mt-30">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach
    <!-- ****** Offer Area End ****** -->

    <!-- ****** Popular Brands Area Start ****** -->
    <section class="karl-testimonials-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading text-center">
                        <h2>Testimonials</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="karl-testimonials-slides owl-carousel">
                    @foreach($testimonials as $testimonial)
                        <!-- Single Testimonial Area -->
                        <div class="single-testimonial-area text-center">
                            <span class="quote">"</span>
                            <h6>{{$testimonial->text}}</h6>
                            <div class="testimonial-info d-flex align-items-center justify-content-center">
                                <div class="tes-thumbnail">
                                    <img src="{{Storage::disk('local')->url($testimonial->image)}}" alt="">
                                </div>
                                <div class="testi-data">
                                    <p>{{$testimonial->Critic_Name}}</p>
                                    <span>Client, {{$testimonial->Critic_location}}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ****** Popular Brands Area End ****** -->
@endsection
@section('js_content')
@endsection
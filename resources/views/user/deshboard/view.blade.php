@extends('user.deshboard.layout')
@section('title_content_user')
    <title>Karim - Fashion Ecommerce Template | UserDashboard</title>
@endsection

@section('css_content_user')
 
  
@endsection

@section('main_content_user')
	<div class="row">
		<div class="box box-solid">
	    <div class="box-header with-border">
	      <h3 class="box-title">Product</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body">
	      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	        <ol class="carousel-indicators">
	          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	          <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
	          <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
	        </ol>
	        <div class="carousel-inner">
	        	<div class="item active">
                    <img src="{{Storage::disk('local')->url($products->displayimage)}}" >
                </div>
		        @foreach(json_decode($products->images, true) as $images)
		        	<div class="item">
		            	<img src="{{asset('/image/'.$images) }}" alt="First slide">
		            </div>
		          
		        @endforeach
		    </div>
	        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	          <span class="fa fa-angle-left"></span>
	        </a>
	        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	          <span class="fa fa-angle-right"></span>
	        </a>
	      </div>
	    </div>
	    <!-- /.box-body -->
	</div>
	<div class="container">
		<div class="row">
			<div class="widget size mb-10 col-lg-6 pull-left">
			    <h4 class="widget-title">Available Size</h4>
			    <div class="widget-desc">
			        <ul>
			        	@foreach(json_decode($products->size) as $sizes)
			            	<li>{{$sizes}}</li>
			           	@endforeach
			        </ul>
			    </div>
			    <h2 class="title">{{$products->title}}</h2>

			    <h4><strong> Price</strong></h4>
		        <p class="price">${{$products->price}}</p>


		        <h4><strong>Discount Price</strong></h4>
		        <p class="price">${{$products->newprice}}</p>

		        @if($products->stock != 0)
		        	<p class="available">Available: <span class="text-muted">In Stock</span></p>
		        @else
		        	<p class="available">Available: <span class="text-muted">Stock Out</span></p>
		        @endif
		        <h4 class="widget-title">Available Color</h4>
			    <div class="widget-desc">
			        <ul>
			            @foreach(json_decode($products->color) as $colors)
			            	<li>{{$colors}}</li>
			           	@endforeach
			        </ul>
			    </div>
			</div>

			<div class="timeline-item col-lg-6 pu;; right" style="margin-left: 10px;">

		        <h3 class="timeline-header">Description</h3>

		        <div class="timeline-body">
		         {{$products->details}}
		        </div>
		    </div>
		</div>
	</div>
	</div>
@endsection


@section('js_content_user')
@endsection
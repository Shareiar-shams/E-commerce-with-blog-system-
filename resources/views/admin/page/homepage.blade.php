@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	<style type="text/css">
		* {box-sizing:border-box}
		/* Slideshow container */
		.slideshow-container {
		  max-width: 1000px;
		  max-height: 500px;
		  width: 100%;
		  position: relative;
		  margin: auto;
		}

		/* Hide the images by default */
		.mySlides {
		  display: none;
		}

		/* Next & previous buttons */
		.prev, .next {
		  cursor: pointer;
		  position: absolute;
		  top: 50%;
		  width: auto;
		  margin-top: -22px;
		  padding: 16px;
		  color: white;
		  font-weight: bold;
		  font-size: 18px;
		  transition: 0.6s ease;
		  border-radius: 0 3px 3px 0;
		  user-select: none;
		}

		/* Position the "next button" to the right */
		.next {
		  right: 0;
		  border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover, .next:hover {
		  background-color: rgba(0,0,0,0.8);
		}

		/* Caption text */
		.text {
		  color: #f2f2f2;
		  font-size: 15px;
		  padding: 8px 12px;
		  position: absolute;
		  bottom: 8px;
		  width: 100%;
		  text-align: center;
		}

		/* Number text (1/3 etc) */
		.numbertext {
		  color: #f2f2f2;
		  font-size: 12px;
		  padding: 8px 12px;
		  position: absolute;
		  top: 0;
		}

		/* The dots/bullets/indicators */
		.dot {
		  cursor: pointer;
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: #bbb;
		  border-radius: 50%;
		  display: inline-block;
		  transition: background-color 0.9s ease;
		}

		.active, .dot:hover {
		  background-color: #717171;
		}

		/* Fading animation */
		.fade {   
		}

		@-webkit-keyframes fade {
		  from {opacity: .4}
		  to {opacity: 1}
		}

		@keyframes fade {
		  from {opacity: .4}
		  to {opacity: 1}
		}
		.catalog{
			max-width: 1200px;
		  	max-height: 600px;
		  	width: 100%;
		  	overflow: hidden;
		}
		.catalog h2 {
		    font-size: 92px;
		    letter-spacing: 0;
		    margin-left: 5px;
		    text-transform: uppercase;
		    color: #fff;
		    margin-bottom: 20px;
		}
		.catalog h6 {
		    color: #fff;
		    font-size: 20px;
		    margin-bottom: 5px;
		    margin-top: 200px;
		    font-weight: bold;
		}

		.img_backgraund:hover{
			background-color: #de4192;
			color: #f3e3eb;
		}
		.img_btn:hover{
			background-color: #de4192;
			color: #f3e3eb;
		}

		/* -------------------
		:: 12.0 Offer Area CSS
		------------------- */

		.offer_area {
		    position: relative;
		    max-width: 1200px;
		    height: 650px;
		    margin-left: auto;
		}

		.offer-content-area {
		    background-color: rgba(58, 58, 58, 0.7);
		    padding: 100px 50px 50px;
		    position: relative;
		    z-index: 1;
		}

		.offer-content-area h2 {
		    position: relative;
		    z-index: 1;
		    color: #fff;
		    font-size: 48px;
		    text-transform: uppercase;
		    margin-bottom: 0;
		}

		.karl-level {
		    position: absolute;
		    z-index: 2;
		    color: #fff;
		    font-size: 11px;
		    text-transform: uppercase;
		    font-weight: 700;
		    background-color: #ff084e;
		    padding: 3px 10px;
		    top: -30px;
		    left: 10px;
		}

		.karl-level:after {
		    position: absolute;
		    z-index: 2;
		    content: "";
		    width: 0;
		    height: 0;
		    border-style: solid;
		    border-width: 0 9px 9px 9px;
		    border-color: transparent transparent #ff084e transparent;
		    bottom: -2px;
		    left: -6px;
		    -webkit-transform: rotate(-45deg);
		    transform: rotate(-45deg);
		}

		.offer-content-area p {
		    color: #fff;
		    font-weight: 600;
		    font-size: 14px;
		}

		.offer-product-price h3 {
		    color: #ff084e;
		}

		.offer-product-price h3 span {
		    margin-right: 15px;
		    font-weight: 400;
		    text-decoration: line-through;
		    color: #fff;
		}
	</style>
@endsection

@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home </a></li>
	    <li><a href="#">Page</a></li>
	</ol>
@endsection

@section('main_content')
<div class="col-lg-12">
	<section style="background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
	    <script src="{{asset('admin/css/js/jssor.slider-28.0.0.min.js')}}" type="text/javascript"></script>
	    <script type="text/javascript">
	        window.jssor_1_slider_init = function() {

	            var jssor_1_SlideoTransitions = [
	              [{b:500,d:1000,x:0,e:{x:6}}],
	              [{b:-1,d:1,x:100,p:{x:{d:1,dO:9}}},{b:0,d:2000,x:0,e:{x:6},p:{x:{dl:0.1}}}],
	              [{b:-1,d:1,x:200,p:{x:{d:1,dO:9}}},{b:0,d:2000,x:0,e:{x:6},p:{x:{dl:0.1}}}],
	              [{b:-1,d:1,rX:20,rY:90},{b:0,d:4000,rX:0,e:{rX:1}}],
	              [{b:-1,d:1,rY:-20},{b:0,d:4000,rY:-90,e:{rY:7}}],
	              [{b:-1,d:1,sX:2,sY:2},{b:1000,d:3000,sX:1,sY:1,e:{sX:1,sY:1}}],
	              [{b:-1,d:1,sX:2,sY:2},{b:1000,d:5000,sX:1,sY:1,e:{sX:3,sY:3}}],
	              [{b:-1,d:1,tZ:300},{b:0,d:2000,o:1},{b:3500,d:3500,tZ:0,e:{tZ:1}}],
	              [{b:-1,d:1,x:20,p:{x:{o:33,r:0.5}}},{b:0,d:1000,x:0,o:0.5,e:{x:3,o:1},p:{x:{dl:0.05,o:33},o:{dl:0.02,o:68,rd:2}}},{b:1000,d:1000,o:1,e:{o:1},p:{o:{dl:0.05,o:68,rd:2}}}],
	              [{b:-1,d:1,da:[0,700]},{b:0,d:600,da:[700,700],e:{da:1}}],
	              [{b:600,d:1000,o:0.4}],
	              [{b:-1,d:1,da:[0,400]},{b:200,d:600,da:[400,400],e:{da:1}}],
	              [{b:800,d:1000,o:0.4}],
	              [{b:-1,d:1,sX:1.1,sY:1.1},{b:0,d:1600,o:1},{b:1600,d:5000,sX:0.9,sY:0.9,e:{sX:1,sY:1}}],
	              [{b:0,d:1000,o:1,p:{o:{o:4}}}],
	              [{b:1000,d:1000,o:1,p:{o:{o:4}}}]
	            ];

	            var jssor_1_options = {
	              $AutoPlay: 1,
	              $CaptionSliderOptions: {
	                $Class: $JssorCaptionSlideo$,
	                $Transitions: jssor_1_SlideoTransitions
	              },
	              $ArrowNavigatorOptions: {
	                $Class: $JssorArrowNavigator$
	              },
	              $BulletNavigatorOptions: {
	                $Class: $JssorBulletNavigator$,
	                $SpacingX: 16,
	                $SpacingY: 16
	              }
	            };

	            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

	            /*#region responsive code begin*/

	            var MAX_WIDTH = 1150;

	            function ScaleSlider() {
	                var containerElement = jssor_1_slider.$Elmt.parentNode;
	                var containerWidth = containerElement.clientWidth;

	                if (containerWidth) {

	                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

	                    jssor_1_slider.$ScaleWidth(expectedWidth);
	                }
	                else {
	                    window.setTimeout(ScaleSlider, 30);
	                }
	            }

	            ScaleSlider();

	            $Jssor$.$AddEvent(window, "load", ScaleSlider);
	            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
	            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
	            /*#endregion responsive code end*/
	        };
	    </script>
	    <style>
	        /*jssor slider loading skin double-tail-spin css*/
	        .jssorl-004-double-tail-spin img {
	            animation-name: jssorl-004-double-tail-spin;
	            animation-duration: 1.6s;
	            animation-iteration-count: infinite;
	            animation-timing-function: linear;
	        }

	        @keyframes jssorl-004-double-tail-spin {
	            from { transform: rotate(0deg); }
	            to { transform: rotate(360deg); }
	        }

	        /*jssor slider bullet skin 031 css*/
	        .jssorb031 {position:absolute;}
	        .jssorb031 .i {position:absolute;cursor:pointer;}
	        .jssorb031 .i .b {fill:#000;fill-opacity:0.6;stroke:#fff;stroke-width:1600;stroke-miterlimit:10;stroke-opacity:0.8;}
	        .jssorb031 .i:hover .b {fill:#fff;fill-opacity:1;stroke:#000;stroke-opacity:1;}
	        .jssorb031 .iav .b {fill:#fff;stroke:#000;stroke-width:1600;fill-opacity:.6;}
	        .jssorb031 .i.idn {opacity:.3;}

	        /*jssor slider arrow skin 051 css*/
	        .jssora051 {display:block;position:absolute;cursor:pointer;}
	        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
	        .jssora051:hover {opacity:.8;}
	        .jssora051.jssora051dn {opacity:.5;}
	        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
	    </style>
	    <div id="jssor_1" style="position:relative;top:0px;left:0px;right: 0px; width:980px;height:400px;overflow:hidden;visibility:hidden;">
	        <div data-u="slides" style="position:relative;top:0px;left:0px; width:980px;height:400px;overflow:hidden;">
	        	@foreach($sliders as $slider)
	        		@if($slider->status == 0 && $slider->price == null)
			            <div style="background-color:#000000;">
			                <img data-u="image" style="opacity:0.5;" src="{{Storage::disk('local')->url($slider->filename)}}" />	
			                <div data-ts="flat" data-p="320" style="left:100px;top:80px;width:550px;height:200px;position:absolute;overflow:hidden;">
			                    <div  style="left:0px;top:0px;width:550px;height:180px;position:absolute;overflow:hidden;">
			                        <div  style="top:18px;width:500px;height:20px;position:absolute;color:#edf1f2;font-size:16px;font-weight:200;line-height:1.2;letter-spacing:0.1em;">{{$slider->subtitle}}</div>
			                        <div  style="top:36px;width:700px;height:100%;position:absolute;color:#edf1f2;font-size:60px;line-height:1.0;letter-spacing:0.05em; font-weight: 600px;">{{$slider->title}}</div>
			                        <div style="top: 120px; position: absolute; "><a href="#" class="btn img_btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms" style="width: 130px; height:100%; border: 2px solid #fff; color:#edf1f2; font-size:20px;">Shop Now</a>
			                        </div>
			                    </div>
			                </div>
			            </div>
			        @endif
	            @endforeach

	        </div>

	        <!-- Bullet Navigator -->
	        <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:16px;right:16px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
	            <div data-u="prototype" class="i" style="width:13px;height:13px;">
	                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
	                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
	                </svg>
	            </div>
	        </div>
	        <!-- Arrow Navigator -->
	        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
	            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
	                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
	            </svg>
	        </div>
	        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
	            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
	                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
	            </svg>
	        </div>
	    </div>
	    <script type="text/javascript">jssor_1_slider_init();</script>
	</section>

	<section class="image-table">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title pull-left">Fixed Image List</h3>
              	<a class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal">Add Image</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
			                <th>Arrival No</th>
			                <th>Title</th>
			                <th>Image</th>
			                <th>Subtitle</th>		                
			                <th>Edit</th>
			                <th>Delete</th>
		                </tr>
	                </thead>
	                <tbody>
	                	@foreach($sliders as $slider)
	                		@if( $slider->status == 0 && $slider->price == null)
				                <tr>
				                  	<td>{{$loop->index + 1}}</td>
				                  	<td>{{$slider->title}}</td>
				                  	<td>
	                 					<img src="{{Storage::disk('local')->url($slider->filename)}}" style="height:120px; width:100px"/>
				                  	</td>
				                  	<td>{{$slider->subtitle}}</td>      
				                  	<td>
			                            <a href="{{route('HomePage.edit',$slider->id)}}" style="font-size: 18px;"><i class="fa fa-edit"></i></a>
			                        </td>
			                        <td>
			                            <form action="{{route('HomePage.destroy',$slider->id)}}" method="post" id="delete-form-{{$slider->id}}" style="display: none;">
			                              {{csrf_field()}}
			                              {{method_field('DELETE')}}
			                            </form>
			                            <a href="" style=" font-size: 18px;" onclick="
			                            if(confirm('Are you Want to Uproot this!'))
			                            {
			                                event.preventDefault();
			                                document.getElementById('delete-form-{{$slider->id}}').submit();
			                            }
			                            else
			                            {
			                                event.preventDefault();
			                            }
			                            "><i class="fa fa-trash-o"></i></a>
			                        </td>
				                </tr>
				            @endif
			            @endforeach
	                </tbody>
	            </table>
            </div>
            <!-- /.box-body -->
		</div>
		<!-- /.box -->
	</section>
	<!-- ******--Top Catagory Area Start--****** -->
    <section class="row">
        <!-- Single Catagory -->
        @foreach($sliders as $slider)
        	@if($slider->status != 0 && $slider->price == null)
		        <div class="col-lg-6 " style="background-image: url({{Storage::disk('local')->url($slider->filename)}}); background-size: 1000px; background-position: center;">
		            <div class="catagory-content">
		                <h6>{{$slider->subtitle}}</h6>
		                <h2>{{$slider->title}}</h2>
		                <a href="#" class="btn img_btn" style="width: 130px; height:100%; border: 2px solid #fff; color:#edf1f2; font-size:20px;">Shop Now</a>
		            </div>
		        </div>
		    @endif
        @endforeach
    </section>

    <section class="image-table">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title pull-left">Fixed Image List</h3>
              	<a class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal1">Add Image</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
			                <th>Arrival No</th>
			                <th>Title</th>
			                <th>Image</th>
			                <th>Subtitle</th>		                
			                <th>Edit</th>
			                <th>Delete</th>
		                </tr>
	                </thead>
	                <tbody>
	                	@foreach($sliders as $slider)
	                		@if($slider->status == 1 && $slider->price == null)
				                <tr>
				                  	<td>{{$loop->index + 1}}</td>
				                  	<td>{{$slider->title}}</td>
				                  	<td>
	                 					<img src="{{Storage::disk('local')->url($slider->filename)}}" style="height:120px; width:100px"/>
				                  	</td>
				                  	<td>{{$slider->subtitle}}</td>			                  	
				                  	<td>
			                            <a href="{{route('fiexdImage',$slider->id)}}" style="font-size: 18px;"><i class="fa fa-edit"></i></a>
			                        </td>
			                        <td>
			                            <form action="{{route('HomePage.destroy',$slider->id)}}" method="post" id="delete-form-{{$slider->id}}" style="display: none;">
			                              {{csrf_field()}}
			                              {{method_field('DELETE')}}
			                            </form>
			                            <a href="" style=" font-size: 18px;" onclick="
			                            if(confirm('Are you Want to Uproot this!'))
			                            {
			                                event.preventDefault();
			                                document.getElementById('delete-form-{{$slider->id}}').submit();
			                            }
			                            else
			                            {
			                                event.preventDefault();
			                            }
			                            "><i class="fa fa-trash-o"></i></a>
			                        </td>
				                </tr>
				            @endif
			            @endforeach
	                </tbody>
	            </table>
            </div>
            <!-- /.box-body -->
	      	</div>
	      	<!-- /.box -->
		</div>
	</section>

   <!-- ****** Offer Area Start ****** -->
   	@foreach($sliders as $slider)
   		@if($slider->price != null)
		   	<section class="offer_area" style="margin-top: -20px; background-image: url({{Storage::disk('local')->url($slider->filename)}})">
		        <div class="container">
		            <div class="row align-items-end justify-content-end" style="margin-left: 100px; margin-top: 150px;">
		                <div class="col-12 col-md-8 col-lg-6">
		                    <div class="offer-content-area wow fadeInUp" data-wow-delay="1s">
		                        <h2>{{$slider->title}} <span class="karl-level">Hot</span></h2>
		                        <p>{{$slider->subtitle}}</p>
		                        <div class="offer-product-price">
		                        <h3><span class="regular-price">${{$slider->price}}</span> {{$slider->newprice}}</h3>
		                        </div>
		                        <a href="#" class="btn img_btn" style="width: 130px; height:100%; border: 2px solid #fff; color:#edf1f2; font-size:20px;">Shop Now</a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
		@endif
	@endforeach
    <!-- ****** Offer Area End ****** -->

    <section class="image-table" style="margin:15px;">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title pull-left">Offer Image List</h3>
              	<a class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal2" onclick="updateState(this)">Add Image</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
			                <th>Arrival No</th>
			                <th>Title</th>
			                <th>Image</th>
			                <th>Price</th>
			                <th>Updated Price</th>		                
			                <th>Edit</th>
			                <th>Delete</th>
		                </tr>
	                </thead>
	                <tbody>
	                	@foreach($sliders as $slider)
	                		@if($slider->price != null)
				                <tr>
				                  	<td>{{$loop->index + 1}}</td>
				                  	<td>{{$slider->title}}</td>
				                  	<td>
	                 					<img src="{{Storage::disk('local')->url($slider->filename)}}" style="height:120px; width:100px"/>
				                  	</td>
				                  	<td>{{$slider->price}}</td>
				                  	<td>{{$slider->newprice}}</td>			                  	
				                  	<td>
			                            <a href="{{route('offerarea',$slider->id)}}" style="font-size: 18px;"><i class="fa fa-edit"></i></a>
			                        </td>
			                        <td>
			                            <form action="{{route('HomePage.destroy',$slider->id)}}" method="post" id="delete-form-{{$slider->id}}" style="display: none;">
			                              {{csrf_field()}}
			                              {{method_field('DELETE')}}
			                            </form>
			                            <a href="" style=" font-size: 18px;" onclick="
			                            if(confirm('Are you Want to Uproot this!'))
			                            {
			                                event.preventDefault();
			                                document.getElementById('delete-form-{{$slider->id}}').submit();
			                            }
			                            else
			                            {
			                                event.preventDefault();
			                            }
			                            "><i class="fa fa-trash-o"></i></a>
			                        </td>
				                </tr>
				            @endif
			            @endforeach
	                </tbody>
	            </table>
            </div>
            <!-- /.box-body -->
	      	</div>
	      	<!-- /.box -->
		</div>
	</section>
</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Add Slider Image</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	@if ($errors->any())                 
				@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-block">
				        <a type="button" class="close" data-dismiss="alert"></a> 
				        <strong>{{ $error }}</strong>
				    </div>
				@endforeach						                   
			@endif
	        <form action="{{route('HomePage.store')}}" method="post" enctype="multipart/form-data">
	          	{{csrf_field()}}

	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">Title:</label>
	            	<input type="text" class="form-control" name="title" id="recipient-name" placeholder="Type Title">
	          	</div>

	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">Subtitle:</label>
	            	<input type="text" class="form-control" name="subtitle" id="recipient-name" placeholder="Type Subtitle">
	          	</div>

	          	<div class="input-group control-group" >
	          		<label for="message-text" class="col-form-label">Image:</label>
		          	<input type="file" name="filename" class="form-control">
		          </div>
		        </div>

	          	
	          	
		        <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Add</button>
			    </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Add Slider Image</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	@if ($errors->any())                 
				@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-block">
				        <a type="button" class="close" data-dismiss="alert"></a> 
				        <strong>{{ $error }}</strong>
				    </div>
				@endforeach						                   
			@endif
	        <form action="{{route('HomePage.store')}}" method="post" enctype="multipart/form-data">
	          	{{csrf_field()}}

	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">Title:</label>
	            	<input type="text" class="form-control" name="title" id="recipient-name" placeholder="Type Title">
	          	</div>
	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">SubTitle:</label>
	            	<input type="text" class="form-control" name="subtitle" id="recipient-name" placeholder="Type SubTitle">
	          	</div>
	          	<div class="input-group control-group" >
	          		<label for="message-text" class="col-form-label">Image:</label>
		          	<input type="file" name="filename" class="form-control">
		          </div>
		        </div>

	          	<div class="form-check" style="margin-left: 20px;">
                    <label class="form-check-label">
                      	<input value="1" type="checkbox" name="status" class="form-check-input">
                      	Want Publis It?
                    </label>
              	</div>
	          	
		        <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Add</button>
			    </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Add Slider Image</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	@if ($errors->any())                 
				@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-block">
				        <a type="button" class="close" data-dismiss="alert"></a> 
				        <strong>{{ $error }}</strong>
				    </div>
				@endforeach						                   
			@endif
	        <form action="{{route('HomePage.store')}}" method="post" enctype="multipart/form-data">
	          	{{csrf_field()}}

	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">Title:</label>
	            	<input type="text" class="form-control" name="title" id="recipient-name" placeholder="Type Title">
	          	</div>
	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">SubTitle:</label>
	            	<input type="text" class="form-control" name="subtitle" id="recipient-name" placeholder="Type SubTitle">
	          	</div>

	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">Pirce:</label>
	            	<input type="number" class="form-control" name="price" id="recipient-name" placeholder="Type SubTitle">
	          	</div>

	          	<div class="form-group">
	            	<label for="message-text" class="col-form-label">Updated Price:</label>
	            	<input type="number" class="form-control" name="newprice" id="recipient-name" placeholder="Type SubTitle">
	          	</div>

	          	<div class="input-group control-group" >
	          		<label for="message-text" class="col-form-label">Image:</label>
		          	<input type="file" name="filename" class="form-control">
		          </div>
		        </div>
	          	
		        <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Add</button>
			    </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
			
@endsection
@section('js_content')
	<script type="text/javascript">
		function updateState(context){
		 	context.setAttribute('disabled',true)
		}
	</script>
@endsection
@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Contact</title>
@endsection

@section('css_content')
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('user/contact/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/css/util.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('user/contact/css/main.css')}}">
	<!--===============================================================================================-->
@endsection

@section('main_content')
	<!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area Start <<<<<<<<<<<<<<<<<<<< -->
    <div class="breadcumb_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area End <<<<<<<<<<<<<<<<<<<< -->

    <div class="container-contact100">
		<div class="wrap-contact100">
			@if ($errors->any())                 
				@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-block">
				        <a type="button" class="close" data-dismiss="alert"></a> 
				        <strong>{{ $error }}</strong>
				    </div>
				@endforeach						                   
			@endif
			<form class="contact100-form validate-form" method="post" action="{{route('admincontact.store')}}">
				{{csrf_field()}}
				<span class="contact100-form-title">
					Send Us A Message
				</span>

				<label class="label-input100" for="first-name">Tell us your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="fname" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="lname" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="phoneNo" placeholder="Eg. +1 800 000000">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" type="submit" data-toggle="modal" data-target="#modalDiscount">
						Send Message
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('user/contact/images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							{{$contact->address}}
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							{{$contact->phoneNo}}
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
							{{$contact->email}}
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

@endsection

@section('js_content')
	<!--===============================================================================================-->
	<script src="{{asset('user/contact/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{asset('user/contact/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{asset('user/contact/vendor/bootstrap/js/popper.js')}}"></script>
		<script src="{{asset('user/contact/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{asset('user/contact/vendor/select2/select2.min.js')}}"></script>
		<script>
			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
		</script>
	<!--===============================================================================================-->
		<script src="{{asset('user/contact/vendor/daterangepicker/moment.min.js')}}"></script>
		<script src="{{asset('user/contact/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{asset('user/contact/vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
		<script src="{{asset('user/contact/js/main.js')}}"></script>



	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
@endsection
	<!--Modal: modalDiscount-->
    <div class="modal fade right" id="modalDiscount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" data-backdrop="true">
      <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <p class="heading">Confirmation Message
            </p>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="white-text">&times;</span>
            </button>
          </div>

          <!--Body-->
          <div class="modal-body">

            <div class="row">

              <div class="col-9">
                <p>
                  <strong>Thanks for Message Us. We will Connect with very soon.</strong>
                </p>

              </div>
            </div>
          </div>

          <!--Footer-->
          <div class="modal-footer flex-center">
            <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Brack</a>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!--Modal: modalDiscount-->
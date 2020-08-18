@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Testimonial</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-lg-12">
		<!-- general form elements -->
        <div class="box box-primary">
        	<div class="box-header with-border" style="margin-bottom: 20px;">
          		<h3 class="box-title"><b>Edit Testimonial</b></h3>
        	</div>
        	@if ($errors->any())                 
				@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-block">
				        <a type="button" class="close" data-dismiss="alert"></a> 
				        <strong>{{ $error }}</strong>
				    </div>
				@endforeach						                   
			@endif
            <!-- /.box-header -->
	        <!-- form start -->
            <form role="form" class="forms-sample" method="post" action="{{route('Testimonial.update',$testimonials->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                  	<div class="form-group">
						<div class="custom-file">
							<img class="profile-user-img img-responsive img-circle" src="{{Storage::disk('local')->url($testimonials->image)}}" alt="User profile picture">
						    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
						    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
						</div>
					</div>
                  	<div class="form-group row">
                      	<label for="publisher" class="col-sm-4 col-form-label">Slug</label>
                      	<div class="col-sm-8">
                        	<input type="text" class="form-control p-input" id="publisher" name="Critic_Name" value="{{$testimonials->Critic_Name}}">
                      	</div>
                  	</div>
                  	<div class="form-group row">
                      	<label for="author" class="col-sm-4 col-form-label">Price</label>
                      	<div class="col-sm-8">
                        	<input type="text" class="form-control p-input" id="author" name="Critic_location" value="{{$testimonials->Critic_location}}">
                      	</div>
                  	</div>
                  	<div class="form-group row">
                      	<label for="author" class="col-sm-4 col-form-label">Price</label>
                      	<div class="col-sm-8">
                        	<input type="text" class="form-control p-input" id="author" name="Company_name" value="{{$testimonials->Company_name}}">
                      	</div>
                  	</div>
                    <div class="form-group row">
                      	<label for="subject" class="col-sm-4 col-form-label">Text</label>
                      	<div class="col-lg-8">
                        	<textarea class="form-control p-input" id="subject" name="text" maxlength="250">{{$testimonials->text}}</textarea>
                      	</div>
                  	</div>  
					<button type="submit" class="btn btn-success mt-4">Submit</button>
                	<a href="{{route('Testimonial.index')}}" class="btn btn-danger mt-4">Go Back</a>
            </form>
        </div>

	</div>
@endsection

@section('js_content')
@endsection

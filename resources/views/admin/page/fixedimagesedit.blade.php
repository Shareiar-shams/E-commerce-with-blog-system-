@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Page</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-lg-3">
	</div>
	<div class="col-lg-6" style="margin-left: auto;">
		<!-- general form elements -->
        <div class="box box-primary container">
        	<div class="box-header with-border" style="margin-bottom: 20px;">
          		<h3 class="box-title"><b>Edit Fixed Area</b></h3>
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
            <form role="form" class="forms-sample" method="post" action="{{route('HomePage.update',$sliders->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
              	<div class="form-group">
					<div class="custom-file">
						<img class="profile-user-img img-responsive img-circle" src="{{Storage::disk('local')->url($sliders->filename)}}" alt="User profile picture">
					    <input style="margin-left: auto; margin-right: auto;" type="file" class="custom-file-input" name="filename" id="inputGroupFile01">
					    <label style="margin-left: 200px;" class="custom-file-label" for="inputGroupFile01">Choose file</label>
					</div>
				</div>
              	<div class="form-group row">
                  	<label for="publisher" class="col-sm-4 col-form-label">Title</label>
                  	<div class="col-sm-8">
                    	<input type="text" class="form-control p-input" id="publisher" name="title" value="{{$sliders->title}}">
                  	</div>
              	</div>
              	<div class="form-group row">
                  	<label for="author" class="col-sm-4 col-form-label">Subtitle</label>
                  	<div class="col-sm-8">
                    	<input type="text" class="form-control p-input" id="author" name="subtitle" value="{{$sliders->subtitle}}">
                  	</div>
              	</div> 
              	<div class="form-check">
                    <label class="form-check-label">
                      	<input value="1" type="checkbox" name="status" class="form-check-input"
                      	@if($sliders->status == 1)
                      		{{'checked'}} 
                      	@endif
                     	>
                      Want Publis It?
                    </label>
              	</div>
				<button type="submit" class="btn btn-success mt-4">Submit</button>
            	<a href="{{route('HomePage.index')}}" class="btn btn-danger mt-4">Go Back</a>
            </form>
        </div>

	</div>
@endsection

@section('js_content')
	
@endsection

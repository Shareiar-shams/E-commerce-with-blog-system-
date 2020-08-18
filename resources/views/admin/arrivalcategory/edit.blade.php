@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	<style type="text/css">
		.col-lg-6{
			left: 30%;
			margin-top: 8%;
			width: 500px;
		}
	</style>
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Arrival Category</li>
	</ol>
@endsection

@section('main_content')
	<!-- left column -->
    <div class="col-lg-6" style="margin-left: -70px;">
		<!-- Horizontal Form -->
     	<div class="box box-info">
        	<div class="box-header with-border" style="text-align: center;">
          		<h3 class="box-title"><b>Add Category</b></h3>
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
        	<form class="form-horizontal" method="post" action="{{route('Arrivalscategory.update',$categories->id)}}">
        		{{csrf_field()}}
        		{{method_field('PUT')}}
          		<div class="box-body">
	                <div class="form-group">
	                  	<label for="categoryTitle" class="col-sm-2 control-label">Title</label>

	                  	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="inputEmail3" name="categoryName" value="{{$categories->categoryName}}" required="required">
	                  	</div>
	                </div>
	                <div class="form-group">
	                  	<label for="slug" class="col-sm-2 control-label">slug</label>

	                  	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="inputPassword3" name="slug" value="{{$categories->slug}}" required="required">
	                  	</div>
	                </div>
          		</div>
          		<!-- /.box-body -->
          		<div class="box-footer">	                		
            		<button type="submit" class="btn btn-info">Update</button>
            		<a href="{{route('Arrivalscategory.index')}}" type="submit" class="btn btn-danger pull-right">Go Back</a>
          		</div>
          		<!-- /.box-footer -->
        	</form>
      	</div>
  		<!-- /.box -->
  	</div>
@endsection

@section('js_content')
@endsection
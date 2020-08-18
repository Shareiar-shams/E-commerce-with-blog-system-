@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Dashboard</li>
	</ol>
@endsection

@section('main_content')
    <div class="row">
    	<div class="col-lg-3">			
		</div>
		<div class="col-lg-6">
         	<div class="box box-info">
            	<div class="box-header with-border" style="text-align: center;">
              		<h3 class="box-title"><b>Change FontAwsome Icon</b></h3>
            	</div>
            	@if ($errors->any())                 
					@foreach ($errors->all() as $error)
						<div class="alert alert-danger alert-block">
					        <a type="button" class="close" data-dismiss="alert"></a> 
					        <strong>{{ $error }}</strong>
					    </div>
					@endforeach						                   
				@endif
            	<!-- form start -->
            	<form class="form-horizontal" method="post" action="{{route('icon_update',$specificmedia->id)}}">
            		{{csrf_field()}}
            		{{method_field('POST')}}
              		<div class="box-body">
		                <div class="form-group">
		                  	<label for="categoryTitle" class="col-sm-2 control-label">Title</label>

		                  	<div class="col-sm-10">
		                    	<input type="text" class="form-control" id="inputEmail3" name="title" value="{{$specificmedia->title}}" required="required">
		                  	</div>
		                </div>
		                <div class="form-group">
		                  	<label for="slug" class="col-sm-2 control-label">FontAwsome Icon</label>

		                  	<div class="col-sm-10">
		                    	<input type="text" class="form-control" id="inputPassword3" name="fontawsomeicon" value="{{$specificmedia->fontawsomeicon}}" required="required">
		                  	</div>
		                </div>
		                <div class="form-group">
		                  	<label for="categoryTitle" class="col-sm-2 control-label">Link</label>

		                  	<div class="col-sm-10">
		                    	<input type="text" class="form-control" id="inputEmail3" name="title" value="{{$specificmedia->link}}" required="required">
		                  	</div>
		                </div>
              		</div>
              		<!-- /.box-body -->
              		<div class="box-footer">	                		
                		<button type="submit" class="btn btn-info">Update</button>
                		<a href="{{route('social_media')}}" type="submit" class="btn btn-danger pull-right">Go Back</a>
              		</div>
              		<!-- /.box-footer -->
            	</form>
          	</div>
      		<!-- /.box -->
		</div>
    </div>
@endsection

@section('js_content')
@endsection
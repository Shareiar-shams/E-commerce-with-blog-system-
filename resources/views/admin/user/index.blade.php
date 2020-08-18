@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">User Information</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-lg-12">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title pull-left">User Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
			                <th>User Id</th>
			                <th>User Name</th>
			                <th>User Email</th>
			                <th>Picture</th>
			                <th>Phone Number</th>
			                <th>Take Action</th>
		                </tr>
	                </thead>
	                <tbody>
	                	@foreach($users as $user)
		                <tr>
		                  	<td>{{$user->id}}</td>
		                  	<td>{{$user->name}}</td>
		                  	<td>{{$user->email}}</td>
		                  	@if($user->image != 'noimage.jpg')
		                  		<td>{{Storage::disk('local')->url($user->image)}}</td>
		                  	@else
		                  		<td><p>No Image</p></td>
		                  	@endif
		                  	<td>{{$user->phoneNo}}</td>
		                  	<td>
	                            <a class="btn btn-danger" href="#" style=" font-size: 18px;">Diasabled Id</a>
	                        </td>
		                </tr>
		                @endforeach
	                </tbody>
	            </table>
            </div>
            <!-- /.box-body -->
      	</div>
      	<!-- /.box -->
	</div>
@endsection

@section('js_content')
@endsection
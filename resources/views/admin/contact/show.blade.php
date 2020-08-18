@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Contact</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-lg-12">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title pull-left">Website Contact Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
			                <th>Address</th>
			                <th>Phone No</th>
			                <th>Email</th>
			                <th>Edit</th>
		                </tr>
	                </thead>
	                <tbody>
		                <tr>
		                  	<td>{{$contact->address}}</td>
		                  	<td>{{$contact->phoneNo}}</td>
		                  	<td>{{$contact->email}}</td>
		                  	<td>
	                            <a href="{{route('contact.edit',$contact->id)}}" style=" font-size: 18px;"><i class="fa fa-edit"></i></a>
	                        </td>
		                </tr>
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
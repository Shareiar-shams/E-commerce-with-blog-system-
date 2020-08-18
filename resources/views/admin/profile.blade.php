@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Profile</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-md-3">
		<!-- Profile Image -->
      	<div class="box box-primary">
        	<div class="box-body box-profile">
        		@if($admin->image != 'noimage.jpg')
          			<img class="profile-user-img img-responsive img-circle" src="{{Storage::disk('local')->url($admin->image)}}" alt="User profile picture">
          		@else
          			<img class="profile-user-img img-responsive img-circle" src="{{asset('admin/dist/img/avatar04.png')}}" alt="User profile picture">
          		@endif
				<h3 class="profile-username text-center">{{$admin->name}}</h3>
				<p class="text-muted text-center">{{$admin->postiton}}</p>
        	</div>
        	<!-- /.box-body -->
      	</div>
      	<!-- /.box -->

      	<!-- About Me Box -->
      	<div class="box box-primary">
        	<div class="box-header with-border">
          		<h3 class="box-title">About Me</h3>
        	</div>
        	<!-- /.box-header -->
        	<div class="box-body">
          		<strong><i class="fa fa-pencil margin-r-5"></i> Experience</strong>
				<p class="text-muted">{{$admin->experience}}</p>

				<hr>

				<strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
				<p class="text-muted">{{$admin->location}}</p>
	        </div>
        	<!-- /.box-body -->
    	</div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      	<div class="nav-tabs-custom">
	        <ul class="nav nav-tabs">
	          <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
	          <li><a href="#cngpass" data-toggle="tab">Change Password</a></li>
	        </ul>
	        <div class="tab-content">
				<div class="active tab-pane" id="settings">
					@if ($errors->any())                 
						@foreach ($errors->all() as $error)
							<div class="alert alert-danger alert-block">
						        <a type="button" class="close" data-dismiss="alert"></a> 
						        <strong>{{ $error }}</strong>
						    </div>
						@endforeach						                   
					@endif
					
		            <form class="form-horizontal" name="profile" method="post" action="{{route('profile.update',$admin->id)}}" enctype="multipart/form-data">
		            {{csrf_field()}}
		            {{method_field('PUT')}}
		            	<div class="form-group">
                          	<div class="col-sm-12" style="text-align: center;">
                          		@if($admin->image != 'noimage.jpg')

                          			<img src="{{Storage::disk('local')->url($admin->image)}}" style="height: 100px; width: 100px; border: 3px dotted #d331ee; border-radius: 100px;" alt="">
                          		
                          		@else

                          			<img src="{{asset('admin/dist/img/avatar04.png')}}" style="height: 100px; width: 100px; border: 3px dotted #d331ee; border-radius: 100px;" alt="">
                          		
                          		@endif
                          		<div class="row">
	                            	<label for="inputimage" style="margin-top:-50px;" class="btn btn-outline-primary btn-sm"><img src="{{'admin/lgin/images/icons/icon.png'}}"></label>
	                            	<input style="margin:auto;" type="file" class="form-control-file" id="image" name="image">
                            	</div>
                          	</div>                                  
                      	</div>
		              	<div class="form-group">
		                	<label for="inputName" class="col-sm-2 control-label">Your Name</label>
							<div class="col-sm-10">
		                  		<input type="name" class="form-control" id="inputName" name="name" value="{{$admin->name}}" placeholder="Name">
		                	</div>
		              	</div>
		              	<div class="form-group">
		                	<label for="inputPositon" class="col-sm-2 control-label">Your Postiton</label>
							<div class="col-sm-10">
		                  		<input type="name" class="form-control" id="inputPositon" name="position" value="{{$admin->position}}" placeholder="Name">
		                	</div>
		              	</div>
		                <input type="hidden" class="form-control" name="email" id="inputEmail" value="{{$admin->email}}"  placeholder="Email">
			            <div class="form-group">
			                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

			                <div class="col-sm-10">
			                  <textarea class="form-control" id="inputExperience" name="experience" placeholder="Experience" maxlength="200">{{$admin->experience}}</textarea>
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="inputLocation" class="col-sm-2 control-label">Location</label>
			                <div class="col-sm-10">
			                  <input type="text" class="form-control" id="inputLocation" name="location" value="{{$admin->location}}">
			                </div>
			            </div>
			            <div class="form-group">
			                <div class="col-sm-offset-2 col-sm-10">
			                  <button type="submit" class="btn btn-danger">Submit</button>
			                </div>
			            </div>
		            </form>
	          	</div>
	          	<!-- /.tab-pane -->
	          	<div class="tab-pane" id="cngpass">
		            <form class="form-horizontal" name="profile1" method="post" action="{{route('admin.password',$admin->id)}}">
		            {{csrf_field()}}
		            {{ method_field('PUT') }}
		            	<div class="form-group">
							<div class="col-sm-10">
		                  		<input type="hidden" class="form-control" name="name" id="inputEmail" value="{{$admin->name}}"  placeholder="Email">
		                	</div>
			            </div>
		              	<div class="form-group">
							<div class="col-sm-10">
		                  		<input type="hidden" class="form-control" name="email" id="inputEmail" value="{{$admin->email}}"  placeholder="Email">
		                	</div>
			            </div>
			            <div class="form-group">
			                <label for="inputPassword" class="col-sm-2 control-label">New Password</label>
			                <div class="col-sm-10">
			                  <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>
			                <div class="col-sm-10">
			                  <input type="password" class="form-control" id="inputConfirmPassword" name="confirm_password" placeholder="Retype Password">
			                </div>
			            </div>
			            <div class="form-group">
			                <label for="inputOldPassword" class="col-sm-2 control-label">Old Password</label>
			                <div class="col-sm-10">
			                  <input type="password" class="form-control" id="inputOldPassword" name="old_password" placeholder="Retype Old Password">
			                </div>
			            </div>
			            <div class="form-group">
			                <div class="col-sm-offset-2 col-sm-10">
			                  <button type="submit" class="btn btn-danger">Submit</button>
			                </div>
			            </div>
		            </form>
	          	</div>
	          	<!-- /.tab-pane -->
	        </div>
        	<!-- /.tab-content -->
      	</div>
      	<!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
@endsection

@section('js_content')
@endsection
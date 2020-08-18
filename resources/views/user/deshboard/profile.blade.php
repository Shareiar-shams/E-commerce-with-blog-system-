@extends('user.deshboard.layout')
@section('title_content_user')
    <title>Karim - Fashion Ecommerce Template | UserDashboard</title>
@endsection

@section('css_content_user')
   
@endsection

@section('main_content_user')
    <div class="bg-white border rounded">
		<div class="row no-gutters">
			<div class="col-lg-4 col-xl-3">
				<div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
					<div class="card text-center widget-profile px-0 border-0">
						<div class="card-img mx-auto rounded-circle">
							@if($user->image != 'noimage.jpg')
								<img src="{{Storage::disk('local')->url($user->image)}}" alt="user image">
							@else
								<img src="{{asset('admin/dist/img/avatar04.png')}}" style="height: 100px; width: 100px;" alt="user image">
							@endif
						</div>
						<div class="card-body">
							<h4 class="py-2 text-dark">{{$user->name}}</h4>
							<p>{{$user->email}}</p>
							<a class="btn btn-primary btn-pill btn-lg my-4" href="#">Follow</a>
						</div>
					</div>
					<hr class="w-100">
					<div class="contact-info pt-4">
						<h5 class="text-dark mb-1">Contact Information</h5>
						<p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
						<p>{{$user->phoneNo}}</p>
						<p class="text-dark font-weight-medium pt-4 mb-2">Location</p>
						<p>{{$user->location}}</p>
						
						
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-xl-9">
				<div class="profile-content-right py-5">
					<ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
						</li>
					</ul>
					<div class="tab-content px-3 px-xl-5" id="myTabContent">
						<div class="tab-pane fade show active " id="settings" role="tabpanel" aria-labelledby="settings-tab">
							@if ($errors->any())                 
								@foreach ($errors->all() as $error)
									<div class="alert alert-danger alert-block">
								        <a type="button" class="close" data-dismiss="alert"></a> 
								        <strong>{{ $error }}</strong>
								    </div>
								@endforeach						                   
							@endif
							
				            <form class="form-horizontal" name="profile" method="post" action="{{route('User-Dashboard.update',$user->id)}}" enctype="multipart/form-data">
				            {{csrf_field()}}
				            {{method_field('PUT')}}
				            	<div class="form-group">
		                          	<div class="col-sm-12" style="text-align: center;">
		                          		@if($user->image != 'noimage.jpg')

		                          			<img src="{{Storage::disk('local')->url($user->image)}}" style="height: 100px; width: 100px; border: 3px dotted #d331ee; border-radius: 100px;" alt="">
		                          		
		                          		@else

		                          			<img src="{{asset('admin/dist/img/avatar04.png')}}" style="height: 100px; width: 100px; border: 3px dotted #d331ee; border-radius: 100px;" alt="">
		                          		
		                          		@endif
		                          		<div class="row">
			                            	<input style="margin:auto;" type="file" class="form-control-file" id="image" name="image">
		                            	</div>
		                          	</div>                                  
		                      	</div>
				              	<div class="form-group">
				                	<label for="inputName" class="col-sm-2 control-label">Your Name</label>
									<div class="col-sm-10">
				                  		<input type="name" class="form-control" id="inputName" name="name" value="{{$user->name}}" placeholder="Name">
				                	</div>
				              	</div>

				              	<div class="form-group">
				                	<label for="inputName" class="col-sm-2 control-label">Your Name</label>
									<div class="col-sm-10">
				                  		<input type="text" class="form-control" id="inputName" name="phoneNo" value="{{$user->phoneNo}}" placeholder="+880........">
				                	</div>
				              	</div>

				                <input type="hidden" class="form-control" name="email" id="inputEmail" value="{{$user->email}}"  placeholder="Email">
					            <div class="form-group">
					                <label for="inputLocation" class="col-sm-2 control-label">Location</label>
					                <div class="col-sm-10">
					                  <input type="text" class="form-control" id="inputLocation" name="location" value="{{$user->location}}">
					                </div>
					            </div>
					            <div class="form-group">
					                <div class="col-sm-offset-2 col-sm-10">
					                  <button type="submit" class="btn btn-danger">Submit</button>
					                </div>
					            </div>
				            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('js_content_user')
  
@endsection
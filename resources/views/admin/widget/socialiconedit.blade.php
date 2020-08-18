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
	<div class="container-fluid">
		<!-- /.box -->
        <div class="row">
            <div class="col-md-4">
            </div>
            <!-- /.col -->

            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-success">
                <div class="box-body text-center">
                    @if($logos->logo != 'noimage.jpg')

                        <img src="{{Storage::disk('local')->url($logos->logo)}}" alt="">
                    
                    @else

                        <img src="{{asset('user/img/core-img/logo.png')}}">
                    
                    @endif                            
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
        	<div class="col-md-3">
        		<div class="box box-success">
        			<div class="box-bodytext-center">
        				<a href="#"><span class="karl-level" style="margin-right: 20px; ">Share</span>
        				@foreach($media as $mediass)
			                <i class="{{$mediass->fontawsomeicon}}"></i>
			            @endforeach
			            </a>
		            </div>
            	</div>
            </div>
            <!-- /.col -->

            <div class="col-md-6">
        		<div class="box box-success">
        			<div class="box-body text-center">
		                <button type="button" class="btn btn-default">HOME</button>
		                <div class="btn-group">
			                <button type="button" class="btn btn-default">MORE	</button>
			                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			                    <span class="caret"></span>
			                    <span class="sr-only">Toggle Dropdown</span>
			                </button>
			                <ul class="dropdown-menu" role="menu">
			                    <li><a href="#">SHOP</a></li>
			                    <li><a href="#">PRODUCT DETAILS</a></li>
			                    <li><a href="#">CART</a></li>
			                    <li><a href="#">CHECKOUT</a></li>
			                </ul>
		                </div>
		                <button type="button" class="btn btn-default">DRESSES</button>
		                <button type="button" class="btn btn-default">CONTACT</button>
		                <button type="button" class="btn btn-default">LOGIN</button>
		            </div>
            	</div>
            </div>
            <!-- /.col -->

            <div class="col-md-3">
        		<div class="box box-success">
        			<div class="box-body">
        				<button type="button" class="btn btn-danger text-center"><i class="fa fa-fw fa-headphones"></i>+880{{$logos->phoneNo}}
                        </button>
		            </div>
            	</div>
            </div>
            <!-- /.col -->

        </div>

        <hr>
        <div class="box">
            <div class="box-header">
              	<h2 class="box-title" style="float: left;"><b>Social Icon List</b></h2>
              	<a style="float: right;" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Add Icon</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table id="example1" class="table table-bordered table-striped">
                	<thead>
                		<tr>
                			<th>No</th>
		                  	<th>Title</th>
		                  	<th>Font Awsome Icon</th>
		                  	<th>Link</th>
		                  	<th>Edit</th>
		                  	<th>Delete</th>
                		</tr>
                	</thead>
	                <tbody>
	                	@foreach($media as $media)
			                <tr>
			                	<td>{{$loop->index + 1}}</td>
			                  	<td>{{$media->title}}</td>
			                  	<td><a href="#"><i class="{{$media->fontawsomeicon}}"></i></a></td>
			                  	<td>{{$media->link}}</td>
			                  	<td>
		                            <a href="{{route('icon_editing',$media->id)}}" style="font-size: 18px;"><i class="fa fa-edit"></i></a>
		                        </td>
		                        <td>
		                            <form action="{{route('deshboard.destroy',$media->id)}}" method="post" id="delete-form-{{$media->id}}" style="display: none;">
		                              {{csrf_field()}}
		                              {{method_field('DELETE')}}
		                            </form>
		                            <a href="" style=" font-size: 18px;" onclick="
		                            if(confirm('Are you Want to Uproot this!'))
		                            {
		                                event.preventDefault();
		                                document.getElementById('delete-form-{{$media->id}}').submit();
		                            }
		                            else
		                            {
		                                event.preventDefault();
		                            }
		                            "><i class="fa fa-trash-o"></i></a>
		                        </td>
			                </tr>
			            @endforeach
	                </tbody>
              	</table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <hr>

       {{--  <div class="text-center">
        	@foreach($media as $me)
	            <a class="btn btn-social-icon btn-pinterest" style="margin-right: 40px;"><i class="{{$me->fontawsomeicon}}"></i></a>
            @endforeach
        </div> --}}
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" style="font-weight: bold;" id="exampleModalLabel">Add Task</h4>
	        <hr>
	      </div>
	      <form method="post" action="{{route('deshboard.store')}}">
		      <div class="modal-body">
		      	@if ($errors->any())                 
					@foreach ($errors->all() as $error)
						<div class="alert alert-danger alert-block">
					        <a type="button" class="close" data-dismiss="alert"></a> 
					        <strong>{{ $error }}</strong>
					    </div>
					@endforeach						                   
				@endif
		        
		          {{csrf_field()}}	
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Title:</label>
		            <input type="text" class="form-control" name="title">
		          </div>
		          <div class="form-group">
		            <label for="message-text" class="col-form-label">FontAwsome Icon:</label>
		            <input type="text" name="fontawsomeicon" class="form-control" id="message-text">
		          </div>
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">Link:</label>
		            <input type="text" class="form-control" name="link">
		          </div>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" name="submit" class="btn btn-primary">Add</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
@endsection
@section('js_content')
@endsection
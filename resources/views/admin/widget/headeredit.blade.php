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
                <div class="box-body">
                    @if ($errors->any())                 
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-block">
                                <a type="button" class="close" data-dismiss="alert"></a> 
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach                                        
                    @endif
                    <form class="form-horizontal" method="post" action="{{route('logo.change',$logos->id)}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <div class="col-sm-12" style="text-align: center;">
                                @if($logos->logo != 'noimage.jpg')

                                    <img src="{{Storage::disk('local')->url($logos->logo)}}" alt="">
                                
                                @else

                                    <img src="{{asset('user/img/core-img/logo.png')}}">
                                
                                @endif
                                    <input style="margin-top: 20px; margin-left: 10px;" type="file" class="form-control-file" id="logo" name="logo">
                                    <button style="margin-top: 20px;" type="submit" class="btn btn-info">Save</button>
                            </div>                                  
                        </div>
                    </form>
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
        			<div class="box-body" style="margin-left: 40px">
                        @foreach($medias as $media)
		                    <a href="{{$media->link}}"><span class="karl-level" style="margin-right: 20px; ">Share</span><i class="{{$media->fontawsomeicon}}"></i></a>
                        @endforeach
		            </div>
            	</div>
            </div>
            <!-- /.col -->

            <div class="col-md-6">
        		<div class="box box-success">
        			<div class="box-body" style="margin-left: 60px">
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
        			    <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"><i class="fa fa-fw fa-headphones"></i>+880{{$logos->phoneNo}}
                        </button>
		            </div>
            	</div>
            </div>
            <!-- /.col -->

        </div>
	</div>
    <div class="modal modal-danger fade" id="modal-danger">
        <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Number</h4>
                  </div>
                  <div class="modal-body">
                    @if ($errors->any())                 
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-block">
                                <a type="button" class="close" data-dismiss="alert"></a> 
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach                                        
                    @endif
                    <form action="{{route('number.change',$logos->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <input style="background: #e63811; color: white;" class="form-control" type="number" name="phoneNo" value="{{$logos->phoneNo}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline">Save changes</button>
                          </div>
                        </div>
                    </form>
                  </div>
        <!-- /.modal-content -->
        </div>
      <!-- /.modal-dialog -->
    </div>
@endsection
@section('js_content')
@endsection
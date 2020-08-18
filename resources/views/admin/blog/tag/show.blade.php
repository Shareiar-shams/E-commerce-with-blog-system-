@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Post Tag</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-lg-12">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title pull-left">Tags List</h3>
              	<a class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal">Add Tag</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
			                <th>Tag No</th>
			                <th>Tag Title</th>
			                <th>Slug</th>
			                <th>Edit</th>
			                <th>Delete</th>
		                </tr>
	                </thead>
	                <tbody>
	                	@foreach($tags as $tag)
			                <tr>
			                  	<td>{{$loop->index + 1}}</td>
			                  	<td>{{$tag->name}}</td>
			                  	<td>{{$tag->slug}}</td>
			                  	<td>
		                            <a href="{{route('post-tag.edit',$tag->id)}}" style=" font-size: 18px;"><i class="fa fa-edit"></i></a>
		                        </td>
		                        <td>
		                            <form action="{{route('post-tag.destroy',$tag->id)}}" method="post" id="delete-form-{{$tag->id}}" style="display: none;">
		                              {{csrf_field()}}
		                              {{method_field('DELETE')}}
		                            </form>
		                            <a href="" style=" font-size: 18px;" onclick="
		                            if(confirm('Are you Want to Uproot this!'))
		                            {
		                                event.preventDefault();
		                                document.getElementById('delete-form-{{$tag->id}}').submit();
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
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Add Tag</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
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
	        <form action="{{route('post-tag.store')}}" method="post">
	          {{csrf_field()}}
	          <div class="form-group">
	            <label for="recipient-name" class="col-form-label">Title:</label>
	            <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Type Tag Title">
	          </div>
	          <div class="form-group">
	            <label for="message-text" class="col-form-label">Slug:</label>
	            <input type="text" class="form-control" name="slug" id="recipient-name" placeholder="Type Slug">
	          </div>
	          <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Add</button>
		      </div>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('js_content')
@endsection
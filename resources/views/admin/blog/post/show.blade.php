@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Post</li>
	</ol>
@endsection
@section('main_content')
	<div class="row container">
        <div class="col-md-8">
          	<!-- Box Comment -->
          	<div class="box box-widget">
	            <div class="box-header with-border">
		            <div class="user-block">
		                <span class="username"><a href="#">{{$post->posted_by}}</a></span>
		                <span class="description">{{$post->created_at->diffForHumans()}}</span>
		            </div>
		            <!-- /.user-block -->
		            <div class="box-tools">
		                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		                </button>
		            </div>
	              	<!-- /.box-tools -->
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              	<img class="img-responsive pad" src="{{Storage::disk('local')->url($post->image)}}" alt="Photo">
	              	<h4>{{$post->title}}</h4>
	              	<p>{!!htmlspecialchars_decode($post->body)!!}</p>
	              	<span class="pull-right text-muted">3 comments</span>
	              	<h6>Tag Clouds:</h6>
                         
                    @foreach($post->tags as $tag)
                        <a href="#">
                            <small class="btn btn-info" style="color: #741852; border: 1px solid gray; border-radius: 5px;">
                                {{$tag->name}}
                            </small>
                        </a>
                    @endforeach
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer box-comments">
	            	@foreach($post->comments as $comment)
			            <div class="box-comment">
			                <!-- User image -->
			                <img class="img-circle img-sm" src="../dist/img/user3-128x128.jpg" alt="User Image">

			                <div class="comment-text">
			                    <span class="username">
			                    <span class="text-muted pull-right">{{$comment->created_at->diffForHumans()}}</span>
			                      </span><!-- /.username -->
			                  	<p>{{ $comment->body }}</p>
			                </div>
			                <!-- /.comment-text -->
			            </div>
		            @endforeach
	            </div>
	            <!-- /.box-footer -->
	            <div class="box-footer">
		            <form action="#" method="post">
		                <!-- .img-push is used to add margin to elements next to floating images -->
		                <div class="img-push">
		                  <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
		                </div>
		            </form>
	            </div>
            	<!-- /.box-footer -->
          	</div>
          <!-- /.box -->
        </div>
    </div>
@endsection

@section('js_content')
@endsection
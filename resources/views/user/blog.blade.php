@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Blog</title>
@endsection

@section('css_content')

@endsection

@section('main_content')
<!-- Page Content -->
<div class="container">

	<div class="row">

	  	<!-- Blog Entries Column -->
	  	<div class="col-md-8">

	    	<h1 class="my-4">Blog Post
	      		<small>For help customer</small>
	    	</h1>
	    	@if($posts->count() != 0)
	    	@foreach($posts as $post)
	    		<!-- Blog Post -->
		    	<div class="card mb-4">
		      		<img class="card-img-top" src="{{Storage::disk('local')->url($post->image)}}" alt="Card image cap" style="height: 400px;">
		      		<div class="card-body contain">
		        		<h2 class="card-title">{{$post->title}}</h2>
		        		<span class="limited-text"><p class="card-text">{!!htmlspecialchars_decode($post->body)!!}</p></span>
		        		<a href="{{route('blog_details',$post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
		      		</div>
		      		<div class="card-footer text-muted">
		        		Posted on {{$post->created_at->diffForHumans()}} by
		        		<a href="#">{{$post->posted_by}}</a>
		      		</div>
		    	</div>
		    @endforeach
		    @else
		    	<div class="card mb-4">
		    		<h4 class="card-title">No Data Matching</h4>
		    	</div>
		    @endif
	        <!-- Pagination -->
	        <ul class="pagination justify-content-center mb-4">
	          	<li class="page-item">
	            	{{$posts->links()}}
	          	</li>
	        </ul>

		</div>

	    <!-- Sidebar Widgets Column -->
	    <div class="col-md-4">

	        <!-- Search Widget -->
	        <div class="card my-4">
	          <h5 class="card-header">Search</h5>
	          <div class="card-body">
	          	<form method="post" action="{{route('search1')}}">
                {{csrf_field()}}
		            <div class="input-group">
		              <input type="text" name="search" class="form-control" placeholder="Search for...">
		              <span class="input-group-append">
		                <button class="btn btn-secondary" type="submit">Go!</button>
		              </span>
		            </div>
		        </form>
	          </div>
	        </div>

	        <!-- Categories Widget -->
	        <div class="card my-4">
	          	<h5 class="card-header">Popular Posts</h5>
	          	<div class="card-body">
            		@foreach($limitedpost as $posts)
                        <div class="media post_item">
                            <img style="height: 60px; width: 80px;" src="{{Storage::disk('local')->url($posts->image)}}" alt="post">
                            <div class="media-body" style="margin: 5px;">
                                <a href="{{route('blog_details',$posts->slug)}}"><h4>{{$posts->title}}</h4></a>
                                <p>{{$posts->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    	<div class="br"></div>
                    @endforeach
          		</div>
	        </div>

	        <!-- Categories Widget -->
	        <div class="card my-4">
	          	<h5 class="card-header">Categories</h5>
	          	<div class="card-body">
            		<ul class="list-unstyled mb-0">
              			@foreach($categories as $category)
                            <li>
                                <a href="{{route('categories',$category->slug)}}" class="d-flex justify-content-between">
                                    <p>{{$category->name}}</p>
                                    <p>{{ $category->post_count }}</p>
                                </a>
                            </li>
                        @endforeach 
            		</ul>
          		</div>
	        </div>

	        <!-- Side Widget -->
	        <div class="card my-4">
	          	<h5 class="card-header">Tag Clouds</h5>
	          	<div class="card-body">
                    <ul class="list">
                        @foreach($tags as $tag)
                        <li><a href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a></li>
                        @endforeach
                    </ul>
	          	</div>
	        </div>

		</div>

	</div>
	<!-- /.row -->

</div>
<!-- /.container -->
@endsection

@section('js_content')
@endsection
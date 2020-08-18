@extends('user.layout')
@section('title_content')
    <title>Karim - Fashion Ecommerce Template | Blog-Details</title>
@endsection

@section('css_content')

@endsection

@section('main_content')
<!-- Page Content -->
<div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{$slug->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$slug->posted_by}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>{{$slug->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{Storage::disk('local')->url($slug->image)}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{!!htmlspecialchars_decode($slug->body)!!}</p>
        <h5 style="color: black; width: 100%; margin-top: 10px; margin-bottom: 10px;">Tag Clouds:</h5>
                                         
        @foreach($slug->tags as $tag)
            <a href="{{route('tag',$tag->slug)}}">
                <small class="btn btn-primary" style="color: #741852; border: 1px solid gray; border-radius: 5px;">
                    {{$tag->name}}
                </small>
            </a>
        @endforeach

        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form method="post" action="{{route('comments.store')}}">
              @csrf              
              <div class="form-group">
                <textarea class="form-control" rows="3" name="body"></textarea>
                <input type="hidden" name="post_id" value="{{ $slug->id }}" />
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>


        @include('user.commentsDisplay', ['comments' => $slug->comments, 'post_id' => $slug->id])

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
@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) @endif>

		<!-- Single Comment -->
	    <div class="media mb-4">
	      	<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
	      	<div class="media-body">
	        	<h5 class="mt-0">{{ $comment->user->name }}</h5>
	        	<p>{{ $comment->body }}</p>

	        	<a href="" id="reply"></a>
		        <form method="post" action="{{ route('comments.store') }}">
		            @csrf
		            <div class="form-group">
		                <input type="text" rows="3" name="body" class="form-control" />
		                <input type="hidden" name="post_id" value="{{ $post_id }}" />
		                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
		            </div>
		            <div class="form-group">
		                <input type="submit" class="btn btn-warning" value="Reply" />
		            </div>
		        </form>
		        @include('user.commentsDisplay', ['comments' => $comment->replies])
	      	</div>
	    </div>
	</div>
@endforeach
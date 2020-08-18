@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">

@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Post</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-lg-12">
		<!-- general form elements -->
        <div class="box box-primary">
        	<div class="box-header with-border" style="margin-bottom: 20px;">
          		<h3 class="box-title"><b>Edit Post</b></h3>
        	</div>
        	@if ($errors->any())                 
				@foreach ($errors->all() as $error)
					<div class="alert alert-danger alert-block">
				        <a type="button" class="close" data-dismiss="alert"></a> 
				        <strong>{{ $error }}</strong>
				    </div>
				@endforeach						                   
			@endif
            <!-- /.box-header -->
	        <!-- form start -->
            <form role="form" class="forms-sample" method="post" action="{{route('post.update',$posts->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                  	
                  	<div class="form-group row">
                      	<label for="author" class="col-sm-4 col-form-label">Title</label>
                      	<div class="col-sm-8">
                        	<input type="text" class="form-control p-input" id="author" name="title" value="{{$posts->title}}">
                      	</div>
                  	</div>

                  	<div class="form-group row">
                      	<label for="publisher" class="col-sm-4 col-form-label">Slug</label>
                      	<div class="col-sm-8">
                        	<input type="text" class="form-control p-input" id="publisher" name="slug" value="{{$posts->slug}}">
                      	</div>
                  	</div>
                  	
                  	<div class="form-group">
						<div class="custom-file">
							@if($posts->image != 'noimage.jpg')
							<img class="profile-user-img img-responsive img-circle" src="{{Storage::disk('local')->url($posts->image)}}" alt="User profile picture">
							@endif
						    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
						    <label class="custom-file-label" for="inputGroupFile01">Choose file for post</label>
						</div>
					</div>

					<div class="form-group">
		                <label class="col-form-label">Select Tag:</label>
		                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Category"style="width: 100%;">
			                	@foreach($tags as $tag)
				                	<option value="{{$tag->id}}"
				                		@foreach($posts->tags as $postTag)
				                		@if($postTag->id == $tag->id)
				                		selected
				                		@endif
				                		@endforeach 
				                		>{{$tag->name}}
				                	</option>
				                @endforeach
			              	</select>
		              	</div>
		          	</div>
		          	<div class="form-group">
		                <label class="col-form-label">Select Category:</label>
		                <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Category"style="width: 100%;">
				                @foreach($categories as $category)
				                	<option value="{{$category->id}}"
				                		@foreach($posts->categories as $postCategories)
				                		@if($postCategories->id == $category->id)
				                		selected
				                		@endif
				                		@endforeach 
				                		>{{$category->name}}</option>
				                @endforeach
			              	</select>
		              	</div>
		          	</div> 

		          	<div class="form-group">
		                <div class="box-header"><h3 class="box-title">Text</h3></div>
					    <textarea id="editor1" placeholder="Place write Here Anything" name="body" rows="10" cols="80">
					    	{{$posts->body}}
					    </textarea>
					</div>  
                	  
				  	<div class="form-check">
	                    <label class="form-check-label">
	                      	<input value="1" type="checkbox" name="status" class="form-check-input"
	                      	@if($posts->status == 1)
	                      		{{'checked'}} 
	                      	@endif
	                     	>
	                      Want Publis It?
	                    </label>
	              	</div>  
					<button type="submit" class="btn btn-success mt-4">Submit</button>
                	<a href="{{route('post.index')}}" class="btn btn-danger mt-4">Go Back</a>
            </form>
        </div>

	</div>
@endsection

@section('js_content')
	<!-- Select2 -->
	<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	
	<!-- CK Editor -->
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    </script>

    <!-- Page script -->
	<script>
	  $(function () {
	    //Initialize Select2 Elements
	    $('.select2').select2()

	    //Datemask dd/mm/yyyy
	    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
	    //Datemask2 mm/dd/yyyy
	    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
	    //Money Euro
	    $('[data-mask]').inputmask()

	    //Date range picker
	    $('#reservation').daterangepicker()
	    //Date range picker with time picker
	    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
	    //Date range as a button
	    $('#daterange-btn').daterangepicker(
	      {
	        ranges   : {
	          'Today'       : [moment(), moment()],
	          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
	          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
	          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        },
	        startDate: moment().subtract(29, 'days'),
	        endDate  : moment()
	      },
	      function (start, end) {
	        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
	      }
	    )

	    //Date picker
	    $('#datepicker').datepicker({
	      autoclose: true
	    })

	    //iCheck for checkbox and radio inputs
	    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	      checkboxClass: 'icheckbox_minimal-blue',
	      radioClass   : 'iradio_minimal-blue'
	    })
	    //Red color scheme for iCheck
	    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
	      checkboxClass: 'icheckbox_minimal-red',
	      radioClass   : 'iradio_minimal-red'
	    })
	    //Flat red color scheme for iCheck
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	      radioClass   : 'iradio_flat-green'
	    })

	    //Colorpicker
	    $('.my-colorpicker1').colorpicker()
	    //color picker with addon
	    $('.my-colorpicker2').colorpicker()

	    //Timepicker
	    $('.timepicker').timepicker({
	      showInputs: false
	    })
	  })
	</script>
@endsection

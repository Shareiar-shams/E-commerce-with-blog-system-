@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')

	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
	<!-- DataTables -->
  	<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  	
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Posts</li>
	</ol>
@endsection

@section('main_content')
	<div class="col-lg-12">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title">Posts List</h3>
              	<a class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success">Add Post</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	            <table id="example1" class="table table-bordered table-striped">
	                <thead>
		                <tr>
			                <th>Post No</th>
			                <th>Image</th>
			                <th>Title</th>
			                <th>Slug</th>
			                <th>Status</th>		                
			                <th>Show</th>		                
			                <th>Edit</th>
			                <th>Delete</th>
		                </tr>
	                </thead>
	                <tbody>
	                	@foreach($posts as $post)
			                <tr>
			                  	<td>{{$loop->index + 1}}</td>
			                  	<td><img class="profile-user-img img-responsive img-circle" src="{{Storage::disk('local')->url($post->image)}}" alt="User profile picture"></td>
			                  	<td>{{$post->title}}</td>
			                  	<td>{{$post->slug}}</td>
			                  	<td>
		                            @if($post->status == 1)
		                            	<label class="badge badge-success">Publis</label>
		                            @else
		                            	<label class="badge badge-warning">On Hold</label>
		                            @endif
		                        </td>
		                        <td>
		                            <a href="{{route('post.show',$post->id)}}" style="font-size: 18px;"><i class="fa fa-eye" aria-hidden="true"></i></a>
		                        </td>
			                  	<td>
		                            <a href="{{route('post.edit',$post->id)}}" style="font-size: 18px;"><i class="fa fa-edit"></i></a>
		                        </td>
		                        <td>
		                            <form action="{{route('post.destroy',$post->id)}}" method="post" id="delete-form-{{$post->id}}" style="display: none;">
		                              {{csrf_field()}}
		                              {{method_field('DELETE')}}
		                            </form>
		                            <a href="" style=" font-size: 18px;" onclick="
		                            if(confirm('Are you Want to Uproot this!'))
		                            {
		                                event.preventDefault();
		                                document.getElementById('delete-form-{{$post->id}}').submit();
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
	<div class="modal modal-success fade" id="modal-success">
	  <div class="modal-dialog">
            <div class="modal-content">
	      		<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Add Post</h5>
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
			        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
			          	{{csrf_field()}}
			          	
			          	<div class="form-group">
			            	<label for="message-text" class="col-form-label">Title:</label>
			            	<input type="text" class="form-control" name="title" id="recipient-name" placeholder="Type Title">
			          	</div>

			          	<div class="form-group">
			            	<label for="message-text" class="col-form-label">Slug:</label>
			            	<input type="text" class="form-control" name="slug" id="recipient-name" placeholder="Type Slug">
			          	</div>

			          	<div class="form-group">
							<div class="custom-file">
							    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
							    <label class="custom-file-label" for="inputGroupFile01">Choose file for post</label>
							</div>
						</div>

			          	<div class="form-group">
			                <label class="col-form-label">Select Categories:</label>
			                <div class="">
				                <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="Select Categories" style="width: 100%;">
					                @foreach($categories as $category)
					                	<option value="{{$category->id}}">
					                		{{$category->name}}
					                	</option>
					                @endforeach
				              	</select>
			              	</div>
			          	</div>

			          	<div class="form-group">
			                <label class="col-form-label">Select Tags:</label>
			                <div class="">
				                <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Tag" style="width: 100%;">
					                @foreach($tags as $tag)
					                	<option value="{{$tag->id}}">
					                		{{$tag->name}}
					                	</option>
					                @endforeach
				              	</select>
			              	</div>
			          	</div>

			          	<div class="form-group rowrd">
			                <div class="box-header"><h3 class="box-title">Text</h3></div>
						    <textarea id="editor1" placeholder="Place write Here Anything" name="body" rows="10" cols="80">
						    </textarea>
						</div>

			          	<div class="form-check" style="margin-left: 15px;">
		                    <label class="form-check-label">
		                      	<input value="1" type="checkbox" name="status" class="form-check-input">
		                      	Want Publis It?
		                    </label>
		              	</div>
				        <div class="modal-footer">
		                	<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
		                	<button type="submit" class="btn btn-outline">Save</button>
		              	</div>
			        </form>
		      	</div>
	    	</div>
	  	</div>
	</div>
@endsection

@section('js_content')
	
	<!-- Select2 -->
	<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<!-- DataTables -->
	<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

	<script>
	  $(function () {
	    $('#example1').DataTable()
	    $('#example2').DataTable({
	      'paging'      : true,
	      'lengthChange': false,
	      'searching'   : false,
	      'ordering'    : true,
	      'info'        : true,
	      'autoWidth'   : false
	    })
	  })
	</script>

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
@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	<style type="text/css">
		.col-lg-6{
			left: 30%;
			margin-top: 8%;
			width: 500px;
		}
	</style>
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="{{asset('admin/plugins/timepicker/bootstrap-timepicker.min.css')}}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Product Category</li>
	</ol>
@endsection

@section('main_content')
	<!-- left column -->
    <div class="col-lg-6" style="margin-left: -70px;">
		<!-- Horizontal Form -->
     	<div class="box box-info">
        	<div class="box-header with-border" style="text-align: center;">
          		<h3 class="box-title"><b>Add Category</b></h3>
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
        	<form class="form-horizontal" method="post" action="{{route('subcategory.update',$categories->id)}}">
        		{{csrf_field()}}
        		{{method_field('PUT')}}
          		<div class="box-body">
	                <div class="form-group">
	                  	<label for="categoryTitle" class="col-sm-2 control-label">Title</label>

	                  	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="inputEmail3" name="title" value="{{$categories->title}}" required="required">
	                  	</div>
	                </div>
	                <div class="form-group">
	                  	<label for="slug" class="col-sm-2 control-label">slug</label>

	                  	<div class="col-sm-10">
	                    	<input type="text" class="form-control" id="inputPassword3" name="slug" value="{{$categories->slug}}" required="required">
	                  	</div>
	                </div>
	                <div class="form-group row">
		                <label class="col-sm-4 col-form-label">Select Arrival Categories:</label>
		                <div class="col-sm-8">
			                <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
				                @foreach($product_categories as $product_category)
				                	<option value="{{$product_category->id}}"
				                		@foreach($categories->categories as $pro_category)
				                			@if($pro_category->id == $product_category->id)
				                				selected
				                			@endif
				                		@endforeach 
				                		>
				                			{{$product_category->title}}
				                	</option>
				                @endforeach
			              	</select>
		              	</div>
		          	</div> 
          		</div>
          		<!-- /.box-body -->
          		<div class="box-footer">	                		
            		<button type="submit" class="btn btn-info">Update</button>
            		<a href="{{route('subcategory.index')}}" type="submit" class="btn btn-danger pull-right">Go Back</a>
          		</div>
          		<!-- /.box-footer -->
        	</form>
      	</div>
  		<!-- /.box -->
  	</div>
@endsection

@section('js_content')
	<!-- Select2 -->
<script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- bootstrap time picker -->
<script src="{{asset('admin/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

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
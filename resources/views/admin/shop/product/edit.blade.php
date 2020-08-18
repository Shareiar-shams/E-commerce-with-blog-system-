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
	    <li class="active">Product Category</li>
	</ol>
@endsection

@section('main_content')
	<!-- left column -->
    <div class="col-lg-12">
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
        	<form class="form-horizontal" method="post" action="{{route('product.update',$products->id)}}">
        		{{csrf_field()}}
        		{{method_field('PUT')}}
          		<div class="box-body">
	                <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Title:</label>
			            <input type="text" class="form-control" name="title" id="recipient-name" value="{{$products->title}}">
			        </div>

			        <div class="form-group">
			            <label for="message-text" class="col-form-label">Slug:</label>
			            <input type="text" class="form-control" name="slug" id="recipient-name" value="{{$products->slug}}">
			        </div>

			        <div class="form-group">
						<div class="custom-file">
							<label for="message-text" class="col-form-label">Display Image:</label>
						    <input type="file" class="custom-file-input" name="displayimage" id="inputGroupFile01" value="{{$products->displayimage}}">
						</div>
					</div>


		          	<div class="input-group control-group increment" >
			          <input type="file" name="images[]" class="form-control" value="{{$products->image}}">
			          <div class="input-group-btn"> 
			            <button class="btn btn-success" id="btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
			          </div>
			      	</div>
			     	<div class="clone hide">
			          <div class="control-group input-group" style="margin-top:10px">
			            <input type="file" name="images[]" class="form-control">
			            <div class="input-group-btn"> 
			              <button class="btn btn-danger" id="btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
			            </div>
			          </div>
			    	</div>

				    <div class="form-group">
			            <label for="message-text" class="col-form-label">Details:</label>
			            <textarea type="text" class="form-control" name="details" id="recipient-name">{{$products->details}}</textarea>
			        </div>

			        <div class="input-group control-group increment2" >
			        	@foreach(json_decode($products->size) as $size)
				        	<input type="number" name="size[]" class="form-control" value="{{$size}}">
				        @endforeach
				          <div class="input-group-btn"> 
				            <button class="btn btn-success" id="btn-success2" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
				        </div>
				    </div>
				    <div class="clone2 hide">
				        <div class="control-group input-group" style="margin-top:10px">
				            <input type="number" name="size[]" class="form-control">
				            <div class="input-group-btn"> 
				              <button class="btn btn-danger" id="btn-danger2" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
				            </div>
				        </div>
				    </div>

				    <div class="form-group">
			            <label for="message-text" class="col-form-label">Price:</label>
			            <input type="number" class="form-control" name="price" id="recipient-name" value="{{$products->price}}">
			        </div>

			        <div class="form-group">
			            <label for="message-text" class="col-form-label">New Price:</label>
			            <input type="number" class="form-control" name="newprice" id="recipient-name" value="{{$products->newprice}}">
			        </div>

				    <div class="input-group control-group increment3" >
				    	@foreach(json_decode($products->color) as $color)
				          <input type="text" name="color[]" class="form-control"  value="{{$color}}">
				        @endforeach
				          <div class="input-group-btn"> 
				            <button class="btn btn-success" id="btn-success3" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
				          </div>
				    </div>
				    <div class="clone3 hide">
				          <div class="control-group input-group" style="margin-top:10px">
				            <input type="text" name="color[]" class="form-control">
				            <div class="input-group-btn"> 
				              <button class="btn btn-danger" id="btn-danger3" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
				            </div>
				          </div>
				    </div>

				    <div class="form-group">
		                <label class="col-form-label">Select Category:</label>
		                <select name="subcategories[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Category"style="width: 100%;">
		                  	@foreach($subcategories as $category)
			                	<option value="{{$category->id}}"
			                		@foreach($products->subcategories as $subcategory)
			                			@if($subcategory->id == $category->id)
			                				selected
			                			@endif
			                		@endforeach 
			                		>
			                			{{$category->title}}
			                	</option>
			                @endforeach
		                </select>
		            </div>

				    <div class="row">
				    	<div class="[pull-left col-lg-6">
					      	<div class="form-check">
			                    <label class="form-check-label">
			                      	<input value="1" type="checkbox" name="status" class="form-check-input"
			                      	@if($products->status == 1)
			                      		{{'checked'}} 
			                      	@endif
			                     	>
			                      Want Publis It?
			                    </label>
			              	</div>
			            </div>  
		              	<div class="pull-right col-lg-6">
		              		<div class="form-check">
			                    <label class="form-check-label">
			                      	<input value="1" type="checkbox" name="stock" class="form-check-input"
			                      	@if($products->stock == 1)
			                      		{{'checked'}} 
			                      	@endif
			                     	>
			                      	Product Available?
			                    </label>
		              		</div>
		              	</div>
				    </div>
          		</div>
          		<!-- /.box-body -->
          		<div class="box-footer">	                		
            		<button type="submit" class="btn btn-info">Update</button>
            		<a href="{{route('category.index')}}" type="submit" class="btn btn-danger pull-right">Go Back</a>
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

	<script type="text/javascript">

	    $(document).ready(function() {

	      $("#btn-success").click(function(){ 
	          var html = $(".clone").html();
	          $(".increment").after(html);
	      });

	      $("body").on("click","#btn-danger",function(){ 
	          $(this).parents(".control-group").remove();
	      });

	    });

	</script>

	<script type="text/javascript">

	    $(document).ready(function() {

	      $("#btn-success2").click(function(){ 
	          var html = $(".clone2").html();
	          $(".increment2").after(html);
	      });

	      $("body").on("click","#btn-danger2",function(){ 
	          $(this).parents(".control-group").remove();
	      });

	    });

	</script>

	<script type="text/javascript">

	    $(document).ready(function() {

	      $("#btn-success3").click(function(){ 
	          var html = $(".clone3").html();
	          $(".increment3").after(html);
	      });

	      $("body").on("click","#btn-danger3",function(){ 
	          $(this).parents(".control-group").remove();
	      });

	    });

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
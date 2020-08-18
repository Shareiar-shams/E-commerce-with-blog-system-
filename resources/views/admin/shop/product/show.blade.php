@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	<!-- DataTables -->
  	<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Product</li>
	</ol>
@endsection

@section('main_content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
            <div class="box-header">
              	<h3 class="box-title">Product List</h3>
              	<a class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success">Add Product</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                	<tr>
                  	  <th>Serial No</th>
	                  <th>Title</th>
	                  <th>Price</th>
	                  <th>Available</th>
	                  <th>Status</th>
	                  <th>Show</th>
	                  <th>Edit</th>
	                  <th>Delete</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($products as $product)
		                <tr>
		                  	<td>{{$loop->index + 1}}</td>
		                  	<td>{{$product->title}}</td>
		                  	<td>{{$product->price}}</td>
		                  	<td>
			                  	@if($product->stock == 1)
	                            	<label class="badge badge-success">In Stock</label>
	                            @else
	                            	<label class="badge badge-danger">Out Stock</label>
	                            @endif
		                  	</td>
		                  	<td>
			                  	@if($product->status == 1)
	                            	<label class="badge badge-success">Publis</label>
	                            @else
	                            	<label class="badge badge-warning">On Hold</label>
	                            @endif
		                  	</td>
		                  	<td>
	                            <a href="{{route('product.show',$product->id)}}" style="font-size: 18px;"><i class="fa fa-eye" aria-hidden="true"></i></a>
	                        </td>
		                  	<td>
	                            <a href="{{route('product.edit',$product->id)}}" style="font-size: 18px;"><i class="fa fa-edit"></i></a>
	                        </td>
	                        <td>
	                            <form action="{{route('product.destroy',$product->id)}}" method="post" id="delete-form-{{$product->id}}" style="display: none;">
	                              {{csrf_field()}}
	                              {{method_field('DELETE')}}
	                            </form>
	                            <a href="" style=" font-size: 18px;" onclick="
	                            if(confirm('Are you Want to Uproot this!'))
	                            {
	                                event.preventDefault();
	                                document.getElementById('delete-form-{{$product->id}}').submit();
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
                <tfoot>
	                <tr>
                  	  <th>Serial No</th>
	                  <th>Title</th>
	                  <th>Price</th>
	                  <th>Available</th>
	                  <th>Status</th>
	                  <th>Show</th>
	                  <th>Edit</th>
	                  <th>Delete</th>
	                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
	</div>
</div>

	<div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
	      		<div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Add Product</h5>
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
			        <form action="{{route('product.store')}}" method="post"  enctype="multipart/form-data">
			          {{csrf_field()}}

			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Title:</label>
			            <input type="text" class="form-control" name="title" id="recipient-name" placeholder="Type Tag Title">
			          </div>

			          <div class="form-group">
			            <label for="message-text" class="col-form-label">Slug:</label>
			            <input type="text" class="form-control" name="slug" id="recipient-name" placeholder="Type Slug">
			          </div>

			          <div class="form-group">
						<div class="custom-file">
							<label for="message-text" class="col-form-label">Display Image:</label>
						    <input type="file" class="custom-file-input" name="displayimage" id="inputGroupFile01">
						</div>
					  </div>

			          <div class="input-group control-group increment" >
				          <input type="file" name="images[]" class="form-control">
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
			            <textarea type="text" class="form-control" name="details" id="recipient-name" placeholder="Type Slug"> </textarea>
			          </div>

			          <div class="input-group control-group increment2" >
				          <input type="number" name="size[]" class="form-control" placeholder="Type Product Available Size">
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
			            <input type="number" class="form-control" name="price" id="recipient-name" placeholder="Type Price">
			          </div>

			          <div class="form-group">
			            <label for="message-text" class="col-form-label">New Price:</label>
			            <input type="number" class="form-control" name="newprice" id="recipient-name" placeholder="Type Discount Price if product have discount">
			          </div>

				      <div class="input-group control-group increment3" >
				          <input type="text" name="color[]" class="form-control" placeholder="Type Product Available Color Name">
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
			                	<option value="{{$category->id}}">
			                		{{$category->title}}
			                	</option>
			                @endforeach
		                </select>
		              </div>

				      <div class="row">
				      	<div class="pull-left col-lg-6">
				      		<div class="form-check">
			                    <label class="form-check-label">
			                      	<input value="1" type="checkbox" name="status" class="form-check-input">
			                      	Want Publis It?
			                    </label>
		              		</div>
		              	</div>
		              	<div class="pull-right col-lg-6">
		              		<div class="form-check">
			                    <label class="form-check-label">
			                      	<input value="1" type="checkbox" name="stock" class="form-check-input">
			                      	Product Available?
			                    </label>
		              		</div>
		              	</div>
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
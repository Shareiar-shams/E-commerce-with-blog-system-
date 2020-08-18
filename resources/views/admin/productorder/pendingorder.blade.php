@extends('admin.layout')
@section('header')
	@include('admin.include.header')
@stop
@section('css_content')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('content_header')
	<ol class="breadcrumb">
	    <li><a href="{{route('admin.panel')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Product Order</li>
	</ol>
@endsection

@section('main_content')
	<div class="row">
        <div class="col-xs-12">
        	<div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Order List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
	                <tr>
	                  	<th>Order No</th>
	                  	<th>Customar Name</th>
	                  	<th>Customar Phone No</th>
	                  	<th>Customar Address</th>
	                  	<th>Product ID</th>
	                  	<th>Quantity</th>
	                  	<th>Total Price</th>
	                  	<th>Status</th>
	                  	<th>Order Details</th>
	                  	<th>Complete Order</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($pandingorder as $order)
		                <tr>
		                	<td>{{$loop->index + 1}}</td>
		                  	<td>{{$order->name}}</td>
		                  	<td>{{$order->phoneNo}}</td>
		                  	<td>{{$order->address}}</td>
		                  	<td> @foreach(json_decode($order->slug) as $slug)
		                  		<p>{{$slug}},</p>
		                  		@endforeach
		                  	</td>
		                  	<td> 
		                  		@foreach(json_decode($order->pquantity) as $quantity)
		                  		<p>{{$quantity}},</p>
		                  		@endforeach
		                  	</td>
		                  	<td>${{$order->total}}</td>
		                  	<td>
		                  		@if($order->status == 1)
	                            	<label class="badge badge-success">Complete</label>
	                            @else
	                            	<label class="badge badge-warning">On Hold</label>
	                            @endif
	                        </td>
		                  	<td>
	                            <a href="{{route('delivary.show',$order->id)}}" style="font-size: 18px;"><i class="fa fa-eye" aria-hidden="true"></i></a>
	                        </td>
	                        <td>
	                        	<form action="{{route('delivary.update',$order->id)}}" method="post" id="update-form-{{$order->id}}">
	                        		{{csrf_field()}}
	                        		{{method_field('PUT')}}
	                        		<input type="hidden" name="status" value="1">
	                        		<input type="hidden" name="name" value="{{$order->name}}">
	                        		<input type="hidden" name="phoneNo" value="{{$order->phoneNo}}">
	                        		@foreach(json_decode($order->pname) as $productname)
		                  		
		                  		
	                        		<input type="hidden" name="productname" value="{{$productname}},">
	                        		
	                        		@endforeach
	                        		@foreach(json_decode($order->pquantity) as $productquantity)
	                        		<input type="hidden" name="productquantity" value="{{$productquantity}},">
	                        		@endforeach
									<input type="hidden" name="totalbil" value="{{$order->total}}">
									<input type="hidden" name="orderdate" value="{{$order->created_at}}">

	                        		<button type="submit" onclick="
		                            if(confirm('Order Conplete!'))
		                            {
		                                event.preventDefault();
		                                document.getElementById('update-form-{{$order->id}}').submit();
		                            }
		                            else
		                            {
		                                event.preventDefault();
		                            }
		                            "><i class="fas fa-check" aria-hidden="true"></i></button> 

	                        	</form>
	                        </td>
		                </tr>
	                @endforeach
                </tbody>
                <tfoot>
                	<tr>
                  		<th>Product No</th>
	                 	<th>Customar Name</th>
	                  	<th>Customar Phone No</th>
	                  	<th>Customar Address</th>
	                  	<th>Product ID</th>
	                  	<th>Quantity</th>
	                  	<th>Total Price</th>
	                  	<th>Status</th>
	                  	<th>Order Details</th>
	                  	<th>Complete Order</th>
                	</tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
@endsection
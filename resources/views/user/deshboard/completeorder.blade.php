@extends('user.deshboard.layout')
@section('title_content_user')
    <title>Karim - Fashion Ecommerce Template | UserDashboard</title>
@endsection

@section('css_content_user')
  
  
@endsection

@section('main_content_user')
    <div class="row">
    		<div class="col-12">
          <!-- Recent Order Table -->
          <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
              <h2>Recent Panding Orders</h2>
              <div class="date-range-report ">
                <span></span>
              </div>
            </div>
            <div class="card-body pt-0 pb-5">
              <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th class="d-none d-md-table-cell">Quantity</th>
                    <th class="d-none d-md-table-cell">Order Date</th>
                    <th class="d-none d-md-table-cell">Order Cost</th>
                    <th>Status</th>
                    <th>View</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($completeorder as $order)
                  @if($order->status == 1)
                  <tr>
                    <td >@foreach(json_decode($order->slug) as $slug)
                          <p>{{$slug}},</p>
                          @endforeach
                    </td>
                    <td >
                      @foreach(json_decode($order->pname) as $productname)
                        <a class="text-dark" href="">{{$productname}},</a>
                        @endforeach
                      
                    </td>
                    <td class="d-none d-md-table-cell">
                      @foreach(json_decode($order->pquantity) as $quantity)
                        <p>{{$quantity}},</p>
                      @endforeach
                    </td>
                    <td class="d-none d-md-table-cell">{{$order->created_at->diffForHumans()}}</td>
                    <td class="d-none d-md-table-cell">${{$order->total}}</td>
                    <td>
                      
                        <span class="badge badge-success">Completed</span>
                    </td>
                    </td>
                    <td class="text-right">
                        <a class="btn btn-info" href="{{route('User-Dashboard.show',$order->id)}}">View</i></a>
                    </td>
                  </tr>
                  @else
                  <tr> <td colspan="10"><p class="text-center">No Data Available</p></td></tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('js_content_user')
@endsection
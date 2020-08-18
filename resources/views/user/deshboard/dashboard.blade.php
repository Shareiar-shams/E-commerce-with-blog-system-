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
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pandingorder as $order)
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
                      @if($order->status == 1)
                        <span class="badge badge-success">Completed</span>
                      @else
                        <span class="badge badge-success">On Hold</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('js_content_user')
  <script src="{{asset('user/assets/plugins/toaster/toastr.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/slimscrollbar/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/charts/Chart.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/ladda/spin.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/ladda/ladda.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/jquery-mask-input/jquery.mask.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/select2/js/select2.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
  <script src="{{asset('user/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
  <script src="{{asset('userassets/plugins/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('userassets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('userassets/plugins/jekyll-search.min.js')}}"></script>
  <script src="{{asset('user/assets/js/sleek.js')}}"></script>
  <script src="{{asset('userassets/js/chart.js')}}"></script>
  <script src="{{asset('userassets/js/date-range.js')}}"></script>
  <script src="{{asset('userassets/js/map.js')}}"></script>
  <script src="{{asset('user/assets/js/custom.js')}}"></script>
@endsection
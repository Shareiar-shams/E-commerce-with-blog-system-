
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<!-- jquery
    ============================================ -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
	============================================ -->
<script src="js/bootstrap.min.js"></script>

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
<!-- Page specific script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
@section('js_content_user')
@show
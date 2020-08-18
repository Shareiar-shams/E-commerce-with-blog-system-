<!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{asset('user/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('user/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('user/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('user/js/active.js')}}"></script>
    <script>
        // $(document).ready(function(){
                //      $('div#loading').removeAttr('id');
        // });
        var preloader = document.getElementById("loa");
        // window.addEventListener('load', function(){
        //      preloader.style.display = 'none';
        //      })

        function myFunction(){
                preloader.style.display = 'none';
        };
</script>
	@section('js_content')
	@show
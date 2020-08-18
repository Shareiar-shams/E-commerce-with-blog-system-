<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Title  -->
    @section('title_content_user')
              @show
    <!-- favicon
		============================================ -->
    <link rel="icon" href="{{asset('user/img/core-img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
    

     <!-- PLUGINS CSS STYLE -->
  <link href="{{asset('user/assets/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />
  <link href="{{asset('user/assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  <link href="{{asset('user/assets/plugins/flag-icons/css/flag-icon.min.css')}}" rel="stylesheet"/>
  <link href="{{asset('user/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  <link href="{{asset('user/assets/plugins/ladda/ladda.min.css')}}" rel="stylesheet" />
  <link href="{{asset('user/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
  <link href="{{asset('user/assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{asset('user/assets/css/sleek.css')}}" />

  <script src="{{asset('user/assets/plugins/nprogress/nprogress.js')}}"></script>

    @section('css_content_user')
        @show
</head>
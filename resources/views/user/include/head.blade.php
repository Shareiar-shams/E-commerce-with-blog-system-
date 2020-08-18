<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    @section('title_content')
              @show
    

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('user/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('user/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('user/style.css')}}">

    <!-- Responsive CSS -->
    <link href="{{asset('user/css/responsive.css')}}" rel="stylesheet">
    @section('css_content')
        @show

    <style type="text/css">
         /* Loading page Area css
  ========================================================================================== */
          #loa
          {
              position: fixed;
              width: 100%;
              height: 100vh;
              background: #fff url('https://static-steelkiwi-dev.s3.amazonaws.com/media/filer_public/2b/3b/2b3b2d3a-437b-4e0a-99cc-d837b5177baf/7d707b62-bb0c-4828-8376-59c624b2937b.gif') no-repeat center center;   
              z-index: 99999;
              margin-bottom: 300px;
          }
          @media (max-width: 968px)
          {
            #loa{
              position: fixed;
              width: 100%;
              height: 100vh;
              background: #fff url('https://static-steelkiwi-dev.s3.amazonaws.com/media/filer_public/2b/3b/2b3b2d3a-437b-4e0a-99cc-d837b5177baf/7d707b62-bb0c-4828-8376-59c624b2937b.gif') no-repeat center center;
              margin-bottom: 400px;
              z-index: 99999;
            }
          }
          @media (max-width: 468px) and (max-height: 300px)
          {
            #loa{
              position: fixed;
              width: 100%;
              height: 100vh;
              background: #fff url('https://static-steelkiwi-dev.s3.amazonaws.com/media/filer_public/2b/3b/2b3b2d3a-437b-4e0a-99cc-d837b5177baf/7d707b62-bb0c-4828-8376-59c624b2937b.gif') no-repeat center center;
              margin-bottom: 250px;
              z-index: 99999;
            }
          }

    </style>
</head>
<!DOCTYPE html>
<html>
<head>
	@include('admin.include.head')
	<style type="text/css">
      /* Loading page Area css
        ========================================================================================== */
        #loader
        {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #fff url('https://facetofaceuae.com/assets/newimages/pre-loader.gif') no-repeat center center;   
            z-index: 99999;
        }
    </style>
<head>
<body class="hold-transition skin-blue sidebar-mini" onload="myFunction()">
<div class="wrapper">

	<header class="main-header">
        @include('admin.include.header')
    </header> 
  	<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        @include('admin.include.sidebar')
    </aside>
  	<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    	<section class="content-header">
      		<h1>
        		Dashboard
        		<small>Control panel</small>
     		</h1>
      		@section('content_header')
            	@show
    	</section>

	    <!-- Main content -->
        <section class="content">
            <!-- Main row -->
                @section('main_content')
                      @show
            <!-- /.row (main row) -->
        </section>
    	<!-- /.content -->
  	</div>
  	<!-- /.content-wrapper -->
  	<footer class="main-footer">
    	<div class="pull-right hidden-xs">
      		<b>Version</b> 2.4.13
    	</div>
    	<strong>Copyright &copy; 2020-2021 <a href="#">KarimEcommerce</a>.</strong> All rights
    reserved.
  	</footer>

 	@include('admin.include.controlside')
</div>
<!-- ./wrapper -->

@include('admin.include.js')
</body>
</html>

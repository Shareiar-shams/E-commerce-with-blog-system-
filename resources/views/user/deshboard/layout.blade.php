<!doctype html>
<html class="no-js" lang="en">
@include('user.deshboard.include.head')

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
	<script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>
    <div class="mobile-sticky-body-overlay"></div>
    <div class="wrapper">
    	@include('user.deshboard.include.sidebar')
    	<div class="page-wrapper">
    		@include('user.deshboard.include.header')

    		<div class="content-wrapper">
    			<div class="content">
    				@section('main_content_user')
            			@show
    			</div>
    		</div>
    		@include('user.deshboard.include.footer')

    	</div>
    </div>

    @include('user.deshboard.include.js')

</body>

</html>
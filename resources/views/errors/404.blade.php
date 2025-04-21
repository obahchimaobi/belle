<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/404.html   11 Nov 2019 12:45:12 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>404 Page Not Found &ndash; Belle Multipurpose Bootstrap 4 Template</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body class="page-template lookbook-template error-page belle">
<div class="pageWrapper">
	<!--Search Form Drawer-->
	@include('layouts._search-form')
    <!--End Search Form Drawer-->
    <!--Top Header-->
    @include('layouts._top-header')
    <!--End Top Header-->
    <!--Header-->
    @include('layouts._header')
    <!--End Header-->
    @include('layouts._mobile-menu')

    <!--Body Content-->
    <div id="page-content">
        <!-- Lookbook Start -->
        <div class="container">
        	<div class="row">
            	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
        			<div class="empty-page-content text-center">
                        <h1>404 Page Not Found</h1>
                        <p>The page you requested does not exist.</p>
                        <p><a href="{{ asset('http://annimexweb.com/') }}" class="btn btn--has-icon-after">Continue shopping <i class="fa fa-caret-right" aria-hidden="true"></i></a></p>
                      </div>
        		</div>
        	</div>
        </div>
        <!-- Lookbook Start -->
    </div>
    <!--End Body Content-->

    @include('layouts._footer')

     <!-- Including Jquery -->
     <script src="{{ asset('assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/jquery.cookie.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/wow.min.js') }}"></script>
     <script src="{{ asset('assets/js/vendor/masonry.js') }}" type="text/javascript"></script>
     <!-- Including Javascript -->
     <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('assets/js/plugins.js') }}"></script>
     <script src="{{ asset('assets/js/popper.min.js') }}"></script>
     <script src="{{ asset('assets/js/lazysizes.js') }}"></script>
     <script src="{{ asset('assets/js/main.js') }}"></script>
</div>
</body>

<!-- belle/404.html   11 Nov 2019 12:45:12 GMT -->
</html>

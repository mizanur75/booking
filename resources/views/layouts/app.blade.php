<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('back/images/favicon.ico')}}">

    <title>@yield('title')</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('back/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('back/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('back/css/skin_color.css')}}">
     @stack('css')
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
  @include('layouts.partials.header')
  
  @include('layouts.partials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		@yield('admin-content')
	  </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
		  <li class="nav-item">
			<a class="nav-link" href="javascript:void(0)">FAQ</a>
		  </li>
		</ul>
    </div>
	  &copy; 2022 - <script>document.write(new Date().getFullYear())</script> <a href="https://www.devmizanur.com/" target="_blank">devmizanur.com</a>. All Rights Reserved.
  </footer>
  
</div>
<!-- ./wrapper -->

	
	<!-- Page Content overlay -->
	
	
	<!-- Vendor JS -->
	<script src="{{asset('back/js/vendors.min.js')}}"></script>
	<script src="{{asset('back/js/pages/chat-popup.js')}}"></script>
    <script src="{{asset('back/assets/icons/feather-icons/feather.min.js')}}"></script>
	@if(Request::is('admin/dashboard'))
	<script src="{{asset('back/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>
	<!-- Law Firm App -->
	<script src="{{asset('back/js/pages/dashboard.js')}}"></script>
	@endif
	<script src="{{asset('back/assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
	<script src="{{asset('back/assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
	<script src="{{asset('back/js/sweetalert.min.js')}}"></script>
	<script src="{{asset('back/js/template.js')}}"></script>
	<script src="{{asset('back/js/flasher.min.js')}}"></script>
	
    @stack('js')
	
</body>
</html>
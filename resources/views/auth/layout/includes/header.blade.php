<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>@yield('title')</title>
		<meta name="description" content="Projeto Web: Agência L.A.* Web" />
		<meta name="keywords" content="laweb, admin, app" />
		<meta name="author" content="Agência L.A.* Web"/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}">
		<link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">

		<!-- select2 CSS -->
		<link href="{{ asset('admin_theme/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
		
		<!-- vector map CSS -->
		<link href="{{ asset('admin_theme/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
		<link href="{{ asset('admin_theme/theme/dist/css/style.css') }}" rel="stylesheet" type="text/css">
		
		<!-- Toast CSS -->
		<link href="{{ asset('admin_theme/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">
        
        <!-- My CSS -->
        <link href="{{ asset('css/my-css.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>
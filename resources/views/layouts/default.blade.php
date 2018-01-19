<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>@yield('title', '图书资源管理后台')</title>
	<meta name="_token" content="{{ csrf_token() }}"/>
	<link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('/css/toastr.min.css') }}">
	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
</head>
<body>
@include('layouts.nav')
@yield('content')
<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/js/toastr.min.js') }}"></script>
<script src="{{ URL::asset('/js/index.js') }}"></script>
@include('layouts.messages')
</body>
</html>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>@yield('title', '图书资源管理后台')</title>
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/toastr.min.css">
	<script src="/js/jquery.min.js"></script>
</head>
<body>
@include('layouts.nav')
@yield('content')
<script src="/js/bootstrap.min.js"></script>
<script src="/js/toastr.min.js"></script>
<script src="/js/default.js"></script>
@include('layouts.messages')
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>登录</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="/css/toastr.min.css">
</head>
<body>
	<div id="login">
		<div class="app-title">
			<h1>登录</h1>
		</div>
		<form class="login-form" action="{{ route('login') }}" method="post">
			{{ csrf_field() }}
			<div class="control-group">
				<input type="email" class="login-field" placeholder="邮箱" name="email" value="{{ old('email') }}">
			</div>
			<div class="control-group">
				<input type="password" class="login-field" placeholder="密码" name="password" value="{{ old('password') }}">
			</div>
			<input type="submit" class="btn" value="登录">
		</form>
	</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/toastr.min.js"></script>
@include('layouts.messages')
</body>
</html>
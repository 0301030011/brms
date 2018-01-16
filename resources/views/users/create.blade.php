<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册帐号</title>
	<link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('/css/toastr.min.css') }}">
</head>
<body>
	<div id="login">
		<div class="app-title">
			<h1>注册帐号</h1>
		</div>
		<form class="login-form" action="{{ route('users.store') }}" method="post">
			{{ csrf_field() }}
			<div class="control-group">
				<input type="text" placeholder="用户名称" value="{{ old('name') }}" name="name">
			</div>
			<div class="control-group">
				<input type="email" placeholder="输入邮箱" value="{{ old('email') }}" name="email">
			</div>
			<div class="control-group">
				<input type="password" placeholder="输入密码" value="{{ old('password') }}" name="password">
			</div>
			<div class="control-group">
				<input type="password" placeholder="确认密码" value="{{ old('password_confirmation') }}" name="password_confirmation">
			</div>
			<input type="submit" class="btn" value="注册">
		</form>
	</div>
<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('js/toastr.min.js') }}"></script>
@include('layouts.messages')
</body>
</html>
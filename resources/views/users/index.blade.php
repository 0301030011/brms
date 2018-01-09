@extends('layouts.default')

@section('title','帐号管理')

@section('content')
	<div class="main">
		@include('users.list')
		<div class="pages">
			{!! $users->render() !!}
		</div>
	</div>
@stop
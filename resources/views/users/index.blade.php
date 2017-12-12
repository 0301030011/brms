@extends('layouts.default')

@section('title','帐号管理')

@section('content')
	<div class="col-md-offset-3 col-md-6">
		@include('users.list')
		<div class="pages">
			{!! $users->render() !!}
		</div>
	</div>
@stop
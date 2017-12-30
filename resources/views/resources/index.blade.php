@extends('layouts.default')
@section('title','资源列表')
@section('content')
@include('layouts.search')
@include('resources.upload')
<div class="main">
	<ul class="list-unstyled">
		<li class="userlist text-center" style="font-size: 25px;cursor: pointer;" id="upload">
			<div>
				<span class="glyphicon glyphicon-plus"></span>
			</div>
		</li>
		@include('resources.list')
	</ul>
	<div class="pages">
		{!! $resources->render() !!}
	</div>
</div>
@stop
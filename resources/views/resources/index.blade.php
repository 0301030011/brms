@extends('layouts.default')
@section('title','资源列表')
@section('content')
@include('layouts.search')
@include('resources.upload')
<div class="col-md-offset-3 col-md-6 main">
	<ul class="list-unstyled">
		<li class="userlist text-center" style="font-size: 28px;cursor: pointer;" data-toggle="modal" data-target="#upload-modal">
			<div>
				<span class="glyphicon glyphicon-plus"></span>
			</div>
		</li>
		@include('resources.list')
	</ul>
	<div class="pages">
		<ul class="pagination">
			<li><a href="#">«</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li><a href="#">»</a></li>
		</ul>
	</div>
</div>
@stop
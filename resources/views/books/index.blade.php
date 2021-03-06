@extends('layouts.default')
@section('title','图书列表')

@section('content')
@include('layouts.search')
@include('books.download')
@include('books.upload')
	<div id="main">
		<div class="books" style="font-size: 25px;cursor: pointer;text-align: center;line-height: 220px;" id="upload">
			<span class="glyphicon glyphicon-plus"></span>
		</div>
		@include('books.list')
		<div class="clearfix"></div>
		<div class="pages">
			{!! $books->render() !!}
		</div>
	</div>
	<script src="{{ URL::asset('/js/download.js') }}"></script>
@stop
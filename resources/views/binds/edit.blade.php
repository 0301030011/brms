@extends('layouts.default')
@section('title','图书编辑')

@section('content')
@include('binds.chapter_name')
@include('binds.section_name')
@include('binds.resources')
	<menu style="display: none;">{{ $book->menu }}</menu>
	<div id="main">
		<div class="pull-left">
			<div class="books" style="clear: both;margin-bottom: 10px;background-image:url({{ $book->cover_path }});">
{{-- 				<form action="{{ route('books.destroy',$book->id) }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<a href="{{ route('bind.edit', $book->id) }}"><button type="button" class="btn btn-primary center-block">编辑</button></a>
					<a href=""><button type="button" class="btn btn-success center-block">查看</button></a>
					<button class="btn btn-danger center-block">删除</button>
				</form> --}}
			</div>
			<button class="add-item btn-primary" style="width: 150px; display: block; margin-left: 18px;border: none;" id="submit">保存</button>
		</div>
		<div id="add-box">
			<!-- Add space -->
		</div>
		<div class="panel">
			<button class="add-item trash" id="trash"><span class="glyphicon glyphicon-trash disabled"></span></button>
			<div class="add pull-right" id="add-panel">
				<div class="add-item add-chapter"></div>
				<div class="add-item add-section"></div>
				<div class="clearfix disabled"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<script src="{{ URL::asset('/js/jquery-ui.min.js') }}"></script>
	<script src="{{ URL::asset('/js/session.js') }}"></script>
	<script src="{{ URL::asset('/js/bind.js') }}"></script>
@stop
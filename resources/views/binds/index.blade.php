@extends('layouts.default')
@section('title','图书编辑')

@section('content')
@include('binds.chapter_name')
@include('binds.section_name')
@include('binds.resources')
	<div class="main">
		<div class="pull-left">
			<div class="books" style="clear: both;margin-bottom: 10px;"></div>
			<button class="add-item btn-primary" style="width: 150px; display: block; margin-left: 18px;border: none;" id="submit">提交</button>
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
	<link rel="stylesheet" href="/css/jquery-confirm.min.css">
	<script src="/js/jquery-ui.min.js"></script>
	<script src="/js/jquery-confirm.min.js"></script>
	<script src="/js/bind.js"></script>
@stop
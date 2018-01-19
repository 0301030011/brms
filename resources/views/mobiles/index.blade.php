<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $book->name }}</title>
	<link rel="stylesheet" href="{{ URL::asset('/css/mui.min.css') }}">
</head>
<body>
	<menu style="display: none;">{{ $book->menu }}</menu>
	<!-- 侧滑导航根容器 -->
	<div class="mui-off-canvas-wrap mui-draggable">
		<!-- 菜单容器 -->
		<aside class="mui-off-canvas-left">
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
				<!-- 菜单具体展示内容 -->
				<header class="mui-bar mui-bar-nav" style="position: static !important;">
					<h1 class="mui-title">目录</h1>
				</header>
					<ul class="mui-table-view" id="menu">
					</ul>
				</div>
			</div>
		</aside>
		<!-- 主页面容器 -->
		<div class="mui-inner-wrap">
			<!-- 主页面标题 -->
			<header class="mui-bar mui-bar-nav">
				<a class="mui-icon mui-action-menu mui-icon-bars mui-pull-left"></a>
				<h1 class="mui-title">{{ $book->name }}</h1>
			</header>
			<div class="mui-content mui-scroll-wrapper">
				<div class="mui-scroll">
					<iframe id="screen" src="https://view.officeapps.live.com/op/embed.aspx?src={{ $src }}" style="width:100%; height:660px; border: none;"></iframe>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('/js/mui.min.js') }}"></script>
	<script src="{{ URL::asset('/js/mobile.js') }}"></script>
</body>
</html>
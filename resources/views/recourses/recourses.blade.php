<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>图书资源管理后台</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">图书资源管理后台</a>
		</div>
		<div class="collapse navbar-collapse" id="example-navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a><span class="glyphicon glyphicon-book"></span> 图书列表</a></li>
				<li><a><span class="glyphicon glyphicon-th"></span> 资源列表</a></li>
				<li><a><span class="glyphicon glyphicon-comment"></span> 反馈中心</a></li>
				<li><a><span class="glyphicon glyphicon-user"></span> 管理员帐号管理</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="col-md-offset-3 col-md-6 main">
	<div class="input-group">
	  <input type="text" class="form-control" placeholder="Search for...">
	  <span class="input-group-btn">
		<button class="btn btn-default" type="button">Go!</button>
	  </span>
	</div>
	<ul class="list-unstyled">
		<li class="userlist text-center" style="font-size: 28px;">
			<div>
				<span class="glyphicon glyphicon-plus"></span>
			</div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
		<li class="userlist">
			<div class="username pull-left">xerus</div>
			<div class="useremail pull-left">xerus@qq.com</div>
			<div class="pull-right">
				<button class="btn btn-m btn-success per-btn">已审核</button>
				<button class="btn btn-m btn-danger delete-btn">删除</button>
			</div>
			<div class="clearfix"></div>
		</li>
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

</body>
</html>
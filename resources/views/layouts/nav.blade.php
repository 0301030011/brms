<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">图书资源管理后台</a>
		</div>
		<div class="collapse navbar-collapse" id="example-navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li data-toggle="modal" data-target="#search-modal" style="cursor: pointer;"><a><span class="glyphicon glyphicon-search"></span> 查找</a></li>
				<li><a href="{{ route('books.index') }}"><span class="glyphicon glyphicon-book"></span> 图书列表</a></li>
				<li><a href="{{ route('resources.index') }}"><span class="glyphicon glyphicon-th"></span> 资源列表</a></li>
				<li><a ><span class="glyphicon glyphicon-comment"></span> 反馈中心</a></li>
				<li><a href="{{ route('users.index') }}"><span class="glyphicon glyphicon-user"></span> 管理员帐号管理</a></li>
				<li><a>XERUS</a></li>
			</ul>
		</div>
	</div>
</nav>
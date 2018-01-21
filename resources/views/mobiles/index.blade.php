<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $book->name }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ URL::asset('/css/drawer.min.css') }}">
</head>
<body class="drawer drawer--left drawer--sidebar">
	<menu style="display: none;">{{ $book->menu }}</menu>
	<header role="banner">
	  <button type="button" class="drawer-toggle drawer-hamburger">
	    <span class="drawer-hamburger-icon"></span>
	  </button>

	  <nav class="drawer-nav" role="navigation">
	    <ul class="drawer-menu">
	      <li><a class="drawer-brand">目录</a></li>
	    </ul>
	  </nav>
	</header>

	<!-- content -->
	<main role="main" class="drawer-contents">
	  <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ $src }}" style="width:100%; height:660px; border: none;"></iframe>
	</main>
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('/js/iscroll.js') }}"></script>
	<script src="{{ URL::asset('/js/drawer.min.js') }}"></script>
	<script src="{{ URL::asset('/js/mobile.js') }}"></script>
	<script>
	  $(document).ready(function() {
	    $('.drawer').drawer();
	  });
	</script>
</body>
</html>
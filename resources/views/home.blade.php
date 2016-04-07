<!DOCTYPE html>
<html>
<head>
	<title>大表哥有限公司</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="/css/common.css">
	<link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body>
<div class="container-fluid">
	<!-- top -->
	<div id="header">@include('top')</div>
	
	<div class="container">
		<div class="row">
			<!-- left -->
			<div class="col-md-3 col-sm-3 hidden-xs" id="left">@include('left')</div>
			@yield('content')
		</div>
	</div>
	
	<!-- bottom -->
	<div id="bottom">@include('bottom')</div>
</div>
</body>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Hellgate</title>

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<link rel="stylesheet" href="//cdn.jsdelivr.net/pure/0.5.0/pure-min.css">
		<link rel="stylesheet" href="/css/marketing.css">
	</head>
	<body>

		<div class="header">
			<div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
				<a class="pure-menu-heading" href="">Hellgate</a>

				<ul>
					<li class="pure-menu-selected"><a href="#">Info</a></li>
				</ul>
			</div>
		</div>

		<section id="content">
			@yield('content')
		</section>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	</body>
</html>
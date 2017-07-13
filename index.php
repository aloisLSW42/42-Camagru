<?php require_once("./controller/index.controller.php"); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Camagru</title>
		<link href="./view/css/stylesheets/screen.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<header>
			<div class="left">
				<a href="./index.php?view=gallery"><div class="link">Gallery</div></a>
			</div>
			<div class="right">
				<a href="./index.php?view=login"><div class="link">Login</div></a>
				<a href="./index.php?view=registration"><div class="link">registration</div></a>
				<a href="./index.php?view=logout"><div class="link">Logout</div></a>
			</div>
		</header>
		<div class="main">
			<?php put_view();?>	
		</div>
		<footer>
			<div class="left">
				<p>Made in 24h by aleclet</p>
			</div>
			<div class="right">
				<p>aleclet@student.42.fr</p>
			</div>
		</footer>
	</body>
</html>

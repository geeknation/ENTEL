<?php
require_once ("../EntelAuth.php");
 $auth=new EntelAuth("EntelUI.php","EntelMain.php");
$auth->checkSession();



?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>EntelUI</title>
		<meta name="description" content="">
		<meta name="author" content="ian">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				<h1>EntelUI</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
			</nav>

			<div class="body">
				<form class="loginFormTest" action="process.php" method="post">
					<label>Username</label>
					<input type="text" class="username" name="username"/>
					
					<p>
						<label>Password</label>
					<input type="password" class="password" name="password"/>
					</p>
					<input type="submit" value="Login"/>
				</form>
				
			</div>

			<footer>
				<p>
					&copy; Copyright  by ian
				</p>
			</footer>
		</div>
	</body>
</html>

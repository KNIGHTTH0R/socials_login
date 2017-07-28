<?php
	session_start();
	include_once "dbconfig.php";
	if($_SESSION["social_id"] !== ""){
		header("Location: cabinet.php");
	}else{
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sociallogin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
	<div class="login_form">
		<div class="socials">
			<div class="social">
				<a href="facebook/fbconfig.php"><i class="fa fa-facebook-official"></i></a>
			</div>
			<div class="social">
				<a href="#"><i class="fa fa-twitter"></i></a>
			</div>
			<div class="social">
				<a href="#"><i class="fa fa-google"></i></a>
			</div>
			<div class="social">
				<a href="#"><i class="fa fa-github"></i></a>
			</div>	
		</div>		
	</div>
</body>
</html>
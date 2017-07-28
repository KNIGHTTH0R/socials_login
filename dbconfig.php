<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "sociallogin";
	$connection = mysqli_connect($host,$user,$pass,$db);
	mysqli_query($connection,"SET NAMES utf8");
 ?>
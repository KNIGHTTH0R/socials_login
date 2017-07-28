<?php
	session_start();
	include_once "dbconfig.php";
	$GET_ID = $_SESSION["social_id"];
	$select = mysqli_query($connection,"SELECT * FROM facebook WHERE oauth_user_id = '$GET_ID'");
	$row = mysqli_fetch_assoc($select);
?>

<p>Hi, <?php echo $row["fullname"]; ?></p>
<p>Are you from <?php echo ucfirst($row["oauth_provider"]); ?>? Am I wrong?</p>
<p><a href="facebook/fb_logout.php">logout</a></p>
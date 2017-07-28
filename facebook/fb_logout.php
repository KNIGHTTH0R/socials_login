<?php 
session_start();
session_unset();
    $_SESSION['social_id'] = "";
header("Location: ../index.php");        // you can enter home page here ( Eg : header("Location: " ."http://www.krizna.com"); 
?>

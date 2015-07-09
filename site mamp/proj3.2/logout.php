<?php session_start();
$_SESSION = array();
		session_destroy();
		session_start();
		if(empty($_SESSION['user'])) echo "<script type='text/javascript'>document.location.replace('login.php');</script>";
?>
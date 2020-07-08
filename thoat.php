<?php 
	session_start();
	unset($_SESSION['name_user']);
	unset($_SESSION['name_id']);
	unset($_SESSION['cart']);

	$_SESSION['login']=0;
	header("location: index.php");
?>
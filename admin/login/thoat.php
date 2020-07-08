<?php 
	session_start();
	unset($_SESSION['name_user']);
	unset($_SESSION['name_id']);

	$_SESSION['login']=0;
	header("location: /web_ban_giay/admin/login/index.php");
?>
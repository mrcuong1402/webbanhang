<?php  
	require_once __DIR__. "/autoload/autoload.php"; 	
	$key = intval(getInput("key"));
	$qty = intval(getInput("soluong"));
	$_SESSION['cart'][$key]['soluong']=$qty;
	echo 1;


?>
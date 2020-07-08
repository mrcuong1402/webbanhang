<?php 

	require_once __DIR__. "/autoload/autoload.php"; 
	if(!isset($_SESSION['name_id']))
	{
		echo "<script> alert('Bạn phải đăng nhập trước'); location.href='index.php' </script>";
	}

	$id = intval(getInput('id'));

	$product = $db -> fetchID("product",$id);

	if(!isset($_SESSION['cart'][$id]))
	{
		$_SESSION['cart'][$id]['ten'] = $product['ten'];
		$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];		
		$_SESSION['cart'][$id]['soluong'] = 1;
		$_SESSION['cart'][$id]['gia'] = ((100 - $product['giamgia'])*$product['gia'])/100;
	}
	else
	{
		$_SESSION['cart'][$id]['soluong'] += 1;
	}
	echo "<script> alert('Thêm vào giỏ thành công'); location.href='gio-hang.php' </script>";

?>
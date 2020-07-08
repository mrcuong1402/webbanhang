<?php  

	require_once __DIR__. "/../../autoload/autoload.php";
	$id = intval(getInput('id'));
    $editTransaction = $db -> fetchID("transaction",$id);
    if(empty($editTransaction)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("transaction");
    }
    if($editTransaction['trangthai']==1)
    {
    	$_SESSION['error'] = "Đơn hàng đã đc xử lí !";
        redirectAdmin("transaction");
    }
    $status = 1;
    $update = $db -> update("transaction",array("trangthai" => $status), array("id" => $id));
    if($update > 0){

        $_SESSION['success'] = "Cập nhật thành công";  

        $sql = "SELECT id_sp,soluong FROM orders WHERE transaction_id  = $id";
        $order = $db->fetchsql($sql);
        foreach ($order as $value) {
        	$id_pro = intval($value['id_sp']);
        	$product = $db ->fetchID("product",$id_pro);
        	$number = $product['soluong'] - $value['soluong'];
        	$update_pro = $db -> update("product",array("soluong"=>$number,"hot"=>$product['hot']+1),array("id"=>$id_pro));
        }
        redirectAdmin("transaction");                          
    }
    else{
        $_SESSION['error'] = "Dữ liệu không thay đổi";   
        redirectAdmin("transaction");              
    }

?>
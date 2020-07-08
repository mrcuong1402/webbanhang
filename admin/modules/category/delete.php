<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id = intval(getInput('id'));

    $delete = $db -> fetchID("category",$id);

    if(empty($delete)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }  


    $id_product = $db -> fetchOne("product"," id_hang = $id ");

    if($id_product == NULL){
        $num = $db -> delete("category",$id);
        if($num > 0){
            $_SESSION['success'] = "Xóa thành công";   
            redirectAdmin("category");  
        }
        else{
            $_SESSION['error'] = "Xóa thất bại";   
            redirectAdmin("category");
        }
    }
    else{
            $_SESSION['error'] = "Hãng có sản phẩm, Bạn không thể xóa !";   
            redirectAdmin("category");
    }
        
    
?>
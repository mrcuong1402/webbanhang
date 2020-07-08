<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id = intval(getInput('id'));

    $delete = $db -> fetchID("type",$id);

    if(empty($delete)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("type");
    }  


    $id_type = $db -> fetchOne("product"," id_type = $id ");

    if($id_product == NULL){
        $num = $db -> delete("type",$id);
        if($num > 0){
            $_SESSION['success'] = "Xóa thành công";   
            redirectAdmin("type");  
        }
        else{
            $_SESSION['error'] = "Xóa thất bại";   
            redirectAdmin("type");
        }
    }
    else{
            $_SESSION['error'] = "Loại này đã có sản phẩm, Bạn không thể xóa !";   
            redirectAdmin("type");
    }
        
    
?>
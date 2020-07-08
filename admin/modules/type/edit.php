<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id = intval(getInput('id'));
    $editType = $db -> fetchID("type",$id);
    if(empty($editType)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("type");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data = 
        [
            "ten" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];

        $error = [];
        if(postInput('name')==""){
            $error['name'] = "Mời bạn nhập đầy đủ tên Loại sản phẩm";
        }

        if(empty($error)){
            $id_update = $db -> update("type",$data,array('id'=>$id));
            if($id_update > 0){
                $_SESSION['success'] = "Cập nhật thành công";   
                redirectAdmin("type");                          
            }
            else{
                $_SESSION['error'] = "Dữ liệu không thay đổi";   
                redirectAdmin("type");              
            }

        }
    }

?>
<?php require_once __DIR__.  "/../../layouts/header.php"; ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="edit.php">Loại sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item active">Sửa</li>
                </ol>
            </div>           
     <div class="container-fluid">      
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="form-group">

                        <label for="exampleInputEmail1">Tên Loại sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $editType['ten'] ?>" placeholder="Tên Loại sản phẩm" name="name">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?> </p>   
                        <?php endif ?>
                    
                    </div>                  
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php" class="btn btn-success"> Quay lại</a>
                </form>
            </div>         
        </div>
    </div>
 <?php require_once __DIR__.  "/../../layouts/footer.php"; ?>
<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id = intval(getInput('id'));
    $editCategory = $db -> fetchID("category",$id);
    if(empty($editCategory)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data = 
        [
            "Ten" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];

        $error = [];
        if(postInput('name')==""){
            $error['name'] = "Mời bạn nhập đầy đủ tên Danh mục";
        }

        if(empty($error)){
            $id_update = $db -> update("category",$data,array('id'=>$id));
            if($id_update > 0){
                $_SESSION['success'] = "Cập nhật thành công";   
                redirectAdmin("category");                          
            }
            else{
                $_SESSION['error'] = "Dữ liệu không thay đổi";   
                redirectAdmin("category");              
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
                        <a href="edit.php">Danh mục</a>
                    </li>
                    <li class="breadcrumb-item active">Sửa</li>
                </ol>
            </div>           
     <div class="container-fluid">      
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="form-group">

                        <label for="exampleInputEmail1">Tên Danh mục</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $editCategory['Ten'] ?>" placeholder="Tên Danh mục" name="name">
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
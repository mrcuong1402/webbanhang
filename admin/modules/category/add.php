<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data = 
        [
            "Ten" => postInput('name'),
            "slug" => to_slug(postInput('name'))
        ];

        $error = [];
        if(postInput('name')==""){
            $error['name'] = "Mời bạn nhập đầy đủ tên Hãng";
        }

        if(empty($error)){
            $isset = $db -> fetchOne("category","Ten = '".$data['Ten']."' ");
            if(count($isset) > 0){
                $_SESSION['error'] = "Tên Hãng đã tồn tại";     
            }
            else{

                $id_insert = $db -> insert("category",$data);
                if($id_insert > 0){
                    $_SESSION['success'] = "Thêm mới thành công";   
                    redirectAdmin("category");                  
                }
                else{
                    $_SESSION['error'] = "Thêm mới thất bại";               
                }
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
                        <a href="index.php">Hãng</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm mới Hãng</li>
                </ol>
            </div>           
     <div class="container-fluid">      
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">

                             <!-- Thông báo lỗi -->
                             <?php require_once __DIR__.  "/../../../partials/notification.php"; ?>
                             
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Hãng</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên Hãng" name="name">
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
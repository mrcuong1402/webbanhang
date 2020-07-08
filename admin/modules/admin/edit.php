<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $id = intval(getInput('id'));
    $editAdmin = $db -> fetchID("admin",$id);
    if(empty($editAdmin)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("admin");
    }


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $data = 
        [
            "HoTen" => postInput('name'),
            "DiaChi" => postInput('address'),
            "ChucVu" => postInput('level'),
            "Email" => postInput('email'),
            "DienThoai" => postInput('phone'),
            "MatKhau" => MD5(postInput('password'))
            // "TenDangNhap" => postInput('username')
        ];
        $error = [];
        
        if(postInput('name')==""){
            $error['name'] = "Mời bạn nhập đầy đủ Họ và tên";
        }

        if(postInput('email')==""){
            $error['email'] = "Mời bạn nhập Email";
        }
        else{
            if(postInput['email'] != postInput['email']){
                $is_check = $db -> fetchOne("admin"," email = '".$data['email']."' ");
                if($is_check != NULL){
                    $error['email'] = "Email đã tồn tại";
                }
            }
        }

        if(postInput('phone')==""){
            $error['phone'] = "Mời bạn Nhập Số điện thoại";
        }
        if(postInput('address')==""){
            $error['address'] = "Mời bạn Nhập Địa chỉ";
        }

        if(postInput['password'] != NULL &&  postInput['re_pass'] != NULL){
            if(postInput['password'] != postInput['re_pass']){
                $error['password'] = "Mật khẩu nhập laị không khớp";
            }
            else{
                $data['MatKhau'] != MD5(postInput('password'));
            }
        }
        if(empty($error)){           
            if(postInput['password'] != NULL &&  postInput['re_pass'])
            $update = $db -> update("admin",$data,array("id"=>$id));
            if($update > 0){
                $_SESSION['success'] = "Cập nhật thành công";
                redirectAdmin("admin");    
            }
            else
            {
                $_SESSION['error'] = "Dữ liệu không thay đổi";
                redirectAdmin("admin");
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
                        <a href="index.php">Admin</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm mới Admin</li>
                </ol>
            </div>           
     <div class="container-fluid">      
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data">

                             <!-- Thông báo lỗi -->
                             <?php require_once __DIR__.  "/../../../partials/notification.php"; ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ và tên</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Họ và tên" name="name" value="<?php echo $editAdmin['HoTen'] ?>">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?> </p>   
                        <?php endif ?>
                    
                    </div>  
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Tên đăng nhập" name="username" value="<?php echo $editAdmin['TenDangNhap'] ?>">
                        <?php if (isset($error['username'])): ?>
                            <p class="text-danger"> <?php echo $error['username']; ?> </p>   
                        <?php endif ?>
                    
                    </div>  -->   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Địa chỉ" name="address" value="<?php echo $editAdmin['DiaChi'] ?>">
                        <?php if (isset($error['address'])): ?>
                            <p class="text-danger"> <?php echo $error['address']; ?> </p>   
                        <?php endif ?>
                    
                    </div> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">Level</label>
                        <select class="form-control" name="level">
                            <option value="1" name="level">CTV</option>
                            <option value="2" name="level">ADMIN</option>
                        </select>
                        <?php if (isset($error['level'])): ?>
                            <p class="text-danger"> <?php echo $error['level']; ?> </p>   
                        <?php endif ?>
                    
                    </div>      
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="abc@xyz.com" name="email" value="<?php echo $editAdmin['Email'] ?>">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email']; ?> </p>   
                        <?php endif ?>
                    
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Điện thoại</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="0989609907" name="phone" value="<?php echo $editAdmin['DienThoai'] ?>">
                        <?php if (isset($error['phone'])): ?>
                            <p class="text-danger"> <?php echo $error['phone']; ?> </p>   
                        <?php endif ?>
                    
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>                        
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="********" name="password">
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger"> <?php echo $error['password']; ?> </p>   
                        <?php endif ?>
                    </div>   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nhập lại Mật khẩu</label>                        
                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="********" name="re_pass" >
                        <?php if (isset($error['re_pass'])): ?>
                            <p class="text-danger"> <?php echo $error['re_pass']; ?> </p>   
                        <?php endif ?>
                    </div>  

                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php" class="btn btn-success"> Quay lại</a>
                </form>
            </div>         
        </div>
    </div>
 <?php require_once __DIR__.  "/../../layouts/footer.php"; ?>
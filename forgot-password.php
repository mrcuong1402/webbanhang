<?php 

	require_once __DIR__. "/autoload/autoload.php"; 
    $mk = $email ="";
    $data = 
    [        
        "email" => postInput('email'),
        "matkhau" => postInput('pass'),
        "dienthoai" => postInput('phone')       
    ];
    _debug($data);
    $error = [];
    if($_SERVER["REQUEST_METHOD"]=="POST"){ 
        $mk = postInput('pass');
        $email = postInput('email');
        if(postInput('email')==""){
            $error['email'] = "Email không được để trống";
        }

        if(postInput('email')==""){
            $error['email'] = "Mật khẩu không được để trống";
        }
        if(postInput('phone')==""){
            $error['phone'] = "Số điện thoại không được để trống";
        }
        else{
             $error['phone'] = "Số điện thoại không chính xác";
        }

        if(postInput('password')==""){
            $error['password'] = "Mật khẩu không được để trống";
        }

        if(empty($error)){
            $check = $db->fetchOne("user"," email = '".$data['email']."' AND dienthoai = '".$data['dienthoai']."' ");
            _debug($check);
            
            if($check != NULL && $update){
                
                $sql_update = "UPDATE user SET matkhau = '$mk' WHERE user.email = '$email' ";
                $update = $db-> fetchsql($sql_update);                

                $_SESSION['name_email'] = $check['email'];
                $_SESSION['name_phone'] = $check['dienthoai'];
                $_SESSION['name_id'] = $check['id'];
                $_SESSION['login'] = 1;

                echo "<script> alert('Lấy lại mật khẩu thành công'); location.href='dang-nhap.php' </script>";
            }
            else{
                $_SESSION['error'] = "Lấy lại mật khẩu thất bại";
            }

        }       
            
    }
?>
<?php require_once __DIR__.  "/layouts/header.php";
?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main" ><a href="" style="font-family: 'Tahoma'"> Lấy lại mật khẩu</a> </h3>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                </div>                
            <?php endif ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>                
            <?php endif ?>

            <form action="" method="POST" class="form-horizontal formcustom" role="form" style="margin-top: 20px">
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Email</label>
        			<div class="col-md-8">
        				<input type="email" name = "email" placeholder="Nhập Email của bạn !" class="form-control" value="<?php echo $data['email'] ?>">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email']; ?> </p>   
                    <?php endif ?>
        			</div>
        		</div>
                <div class="form-group">
                    <label class="col-md-2 col-md-offset-1 aaa">Số điện thoại</label>
                    <div class="col-md-8">
                        <input type="text" name = "phone" placeholder="0989609907" class="form-control" value="<?php echo $data['dienthoai'] ?>">
                        <?php if (isset($error['phone'])): ?>
                            <p class="text-danger"> <?php echo $error['phone']; ?> </p>   
                    <?php endif ?>
                    </div>
                </div>
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Mật khẩu mới</label>
        			<div class="col-md-8">
        				<input type="password" name = "pass" placeholder="******" class="form-control" value="" >
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger"> <?php echo $error['password']; ?> </p>   
                    <?php endif ?>
        			</div>
        		</div>
  		

        		<button class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px">OK</button>
                
            </form>
            
        </section>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
<?php 

	require_once __DIR__. "/autoload/autoload.php"; 

    $data = 
    [        
        "email" => postInput('email'),
        "matkhau" => postInput('pass')        
    ];
    $error = [];
    if($_SERVER["REQUEST_METHOD"]=="POST"){ 

        if(postInput('email')==""){
            $error['email'] = "Email không được để trống";
        }

        if(postInput('email')==""){
            $error['email'] = "Mật khẩu không được để trống";
        }

        if(empty($error)){
            $check = $db->fetchOne("user"," email = '".$data['email']."' AND matkhau = '".$data['matkhau']."' ");
            if($check != NULL){
                $_SESSION['name_user'] = $check['ten'];
                $_SESSION['name_id'] = $check['id'];
                $_SESSION['login'] = 1;
                echo "<script> alert('Đăng nhập thành công'); location.href='index.php' </script>";

            }
            else{
                $_SESSION['error'] = "Đăng nhập thật bại";
            }

        }       
            
    }
?>
<?php require_once __DIR__.  "/layouts/header.php";
?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main" ><a href="" style="font-family: 'Tahoma'"> Đăng nhập</a> </h3>
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
        				<input type="email" name = "email" placeholder="abc@xyz" class="form-control" value="<?php echo $data['email'] ?> ">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email']; ?> </p>   
                    <?php endif ?>
        			</div>
        		</div>
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Mật khẩu</label>
        			<div class="col-md-8">
        				<input type="password" name = "pass" placeholder="" class="form-control" value="<?php echo $data['matkhau'] ?>" >
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger"> <?php echo $error['password']; ?> </p>   
                    <?php endif ?>
        			</div>
        		</div>
  		

        		<button class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px">Đăng nhập</button>
                <a style="margin-left: 10px" href="forgot-password.php" class="btn btn-primary col-md-2">Quên mật khẩu</a>
            </form>
            
        </section>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
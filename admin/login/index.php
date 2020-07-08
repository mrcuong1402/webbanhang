<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $data = 
    [        
        "Email" => postInput('email'),
        "MatKhau" => postInput('pass')      
    ];
    //_debug($data['Email']);
    $email = $data['Email'];
    //_debug($email);
    $error = [];
    if($_SERVER["REQUEST_METHOD"]=="POST"){ 

     	if(postInput('email')==""){
            $error['email'] = "Email không được để trống";
        }

        if(postInput('email')==""){
            $error['email'] = "Mật khẩu không được để trống";
        }

        if(empty($error)){
            $check = $db->fetchOne("admin"," Email = '".$data['Email']."' AND matkhau = '".$data['MatKhau']."' ");
    		$employees = $db -> fetchEmail("admin",$email);
            
            $_SESSION['ChucVu'] = intval($employees['ChucVu']);
            //_debug($_SESSION['ChucVu']);
            
        	if($check != NULL){
            $_SESSION['name_user'] = $check['HoTen'];
            //_debug($_SESSION['name_user']);
            $_SESSION['name_id'] = $check['id'];
            $_SESSION['login'] = 1;
            echo "<script> alert('Đăng nhập thành công'); location.href='/web_ban_giay/admin/index.php' </script>";
            }
            else{
                $_SESSION['error'] = "Đăng nhập thật bại";
            }
            
        }       
            
    }

?>


<?php require_once __DIR__.  "/header.php"; ?>
	
	<form class="login100-form validate-form" method="POST">
		<span class="login100-form-title" style="font-family: 'utm bell'">
			Đăng nhập
		</span>
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
		<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
			<input class="input100" type="text" name="email" placeholder="Email" value="<?php echo $data['Email'] ?>">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-envelope" aria-hidden="true"></i>
			</span>
		</div>

		<div class="wrap-input100 validate-input" data-validate = "Password is required">
			<input class="input100" type="password" name="pass" placeholder="Password">
			<span class="focus-input100"></span>
			<span class="symbol-input100">
				<i class="fa fa-lock" aria-hidden="true"></i>
			</span>
		</div>
		
		<div class="container-login100-form-btn">
			<button class="login100-form-btn">
				Login
			</button>
		</div>

		<div class="text-center p-t-12">
			<span class="txt1">
				Forgot
			</span>
			<a class="txt2" href="#">
				Username / Password?
			</a>
		</div>
<?php require_once __DIR__.  "/footer.php" ?>
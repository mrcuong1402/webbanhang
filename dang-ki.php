
<?php 

	require_once __DIR__. "/autoload/autoload.php"; 

	$data = 
    [
        "ten" => postInput('name'),
        "email" => postInput('email'),
        "matkhau" => postInput('pass'),
        "dienthoai" => postInput('phone'),
        "diachi" => postInput('address')      
    ];

	if($_SERVER["REQUEST_METHOD"]=="POST"){	    
	    $error = [];
	    if(postInput('name')==""){
	        $error['name'] = "Mời bạn nhập đầy đủ Họ tên";
	    }
	    if(postInput('email')==""){
	        $error['email'] = "Mời bạn nhập Email";
	    }
	    else{
            $is_check = $db -> fetchOne("user"," email = '".$data['email']."' ");
            if($is_check != NULL){
                $error['email'] = "Email đã tồn tại";
            }
        }
	    if(postInput('pass')==""){
	        $error['pass'] = "Mời bạn nhập Mật khẩu";
	    }
	    else	    
	    {
	    	if($data['matkhau'] != postInput('repass')){
            $error['repass'] = "Mật khẩu không khớp";
        }
	    }

	    if(postInput('address')==""){
	        $error['address'] = "Mời bạn nhập Địa chỉ";
	    }
	    if(postInput('phone')==""){
	        $error['phone'] = "Mời bạn nhập Số điện thoại";
	    }

	    if(empty($error)){       
	        $id_insert = $db -> insert("user",$data);
	        if($id_insert){            
	            $_SESSION['success'] = "Đăng kí thành công";
	            //redirect(dang-ki-thanh-cong.php);
	            header("location: "."http://localhost:81/web_ban_giay/dang-ki-thanh-cong.php");exit();
	        }
	        else
	        {
	            $_SESSION['error'] = "Đăng kí thất bại";
	            //redirect(dang-ki-thanh-cong.php);
	            header("location: "."http://localhost:81/web_ban_giay/dang-ki-thanh-cong.php");exit();
	        }
	    }
	}

?>
<?php require_once __DIR__.  "/layouts/header.php";?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href="" style="font-family: 'Tahoma'"> Đăng ký thành viên</a> </h3>
            <form action="" method="POST" class="form-horizontal formcustom" role="form" style="margin-top: 30px">

            	<?php require_once __DIR__.  "/partials/notification.php"; ?>

        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa ">Tên thành viên</label>
        			<div class="col-md-8">
        				<input type="text" name ="name" placeholder="Nguyễn Ngọc Cương" class="form-control" value="<?php echo $data['ten'] ?>">
        			
        			<?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?> </p>   
                    <?php endif ?>
                    </div>
        		</div>        		
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Email</label>
        			<div class="col-md-8">
        				<input type="email" name = "email" placeholder="abc@xyz" class="form-control" value="<?php echo $data['email'] ?>">
        			
        			<?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email']; ?> </p>   
                    <?php endif ?>
                    </div>
        		</div>
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Mật khẩu</label>
        			<div class="col-md-8">
        				<input type="password" name = "pass" placeholder="********" class="form-control" value="<?php echo $data['matkhau'] ?>">
        			
        			<?php if (isset($error['pass'])): ?>
                            <p class="text-danger"> <?php echo $error['pass']; ?> </p>   
                    <?php endif ?>
                    </div>
        		</div>
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Nhập lại mật khẩu</label>
        			<div class="col-md-8">
        				<input type="password" name = "repass" placeholder="" class="form-control">
        			
        			<?php if (isset($error['repass'])): ?>
                            <p class="text-danger"> <?php echo $error['repass']; ?> </p>   
                    <?php endif ?>
                    </div>

        		</div>

        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Điện thoại</label>
        			<div class="col-md-8">
        				<input type="number" name = "phone" placeholder="01645460235" class="form-control" value="<?php echo $data['dienthoai'] ?>">
        			
        			<?php if (isset($error['phone'])): ?>
                            <p class="text-danger"> <?php echo $error['phone']; ?> </p>   
                    <?php endif ?>
                    </div>
        		</div>
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Địa chỉ</label>
        			<div class="col-md-8">
        				<input type="text" name = "address" placeholder="Thanh Hóa, Việt Nam" class="form-control"  
        				value="<?php echo $data['diachi'] ?>">
        			
        			<?php if (isset($error['address'])): ?>
                            <p class="text-danger"> <?php echo $error['address']; ?> </p>   
                    <?php endif ?>
                    </div>
        		</div>       		

        		<button class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px" type="submit">Đăng ký</button>
            </form>
            
        </section>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
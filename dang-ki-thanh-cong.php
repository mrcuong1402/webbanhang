
<?php 

	require_once __DIR__. "/autoload/autoload.php";    

?>
<?php require_once __DIR__.  "/layouts/header.php";?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href="dang-ki.php" style="font-family: 'Tahoma'"> Đăng ký thành viên</a> </h3>
            <form action="" method="POST" class="form-horizontal formcustom" role="form" style="margin-top: 30px">

            	<?php require_once __DIR__.  "/partials/notification.php"; ?>

        		<div class="form-group">        			
        			<label class="col-md-5" style="font-family: 'Tahoma'">
                        Click để quay lại <a href="<?php echo base_url() ?>"> Trang chủ</a> , hoặc vào đây để <a href="dang-nhap.php">Đăng nhập</a>      
                    </label>
        		</div>        		
        		
            </form>
            
        </section>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
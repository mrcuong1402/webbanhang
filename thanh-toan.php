<?php 

	require_once __DIR__. "/autoload/autoload.php"; 
	$user = $db -> fetchID("user",intval($_SESSION['name_id']));
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$data =
		[
			'tongtien' => $_SESSION['total'],
			'user_id' => $_SESSION['name_id'],
			'ghichu' => postInput("note")
		];
		//_debug($data);

		$id_tran = $db -> insert("transaction",$data);
		if($id_tran>0)
		{
			foreach ($_SESSION['cart'] as $key => $value) {
				$data2 =
				[
					'transaction_id' => $id_tran,
					'id_sp' => $key,
					'soluong' => $value['soluong'],
					'gia' => $value['gia']
				];

				$id_insert = $db -> insert("orders",$data2);

			}
			unset($_SESSION['cart']);
			unset($_SESSION['total']);
			$_SESSION['success'] = "Đặt hàng thành công !";
			header("location: thong-bao.php");
		}

	}

	
?>
<?php require_once __DIR__.  "/layouts/header.php";
?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href="" style="font-family: 'Tahoma'"> Thanh toán đơn hàng</a> </h3>
            <form action="" method="POST" class="form-horizontal formcustom" role="form" style="margin-top: 30px">

            	<?php require_once __DIR__.  "/partials/notification.php"; ?>

        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa ">Tên Khách hàng</label>
        			<div class="col-md-8">
        				<input readonly="" type="text" name ="name" placeholder="Nguyễn Ngọc Cương" class="form-control" value="<?php echo $user['ten'] ?>">
                    </div>
        		</div>        		
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Email</label>
        			<div class="col-md-8">
        				<input readonly="" type="email" name = "email" placeholder="abc@xyz" class="form-control" value="<?php echo $user['email'] ?>">
                    </div>
        		</div>

        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Điện thoại</label>
        			<div class="col-md-8">
        				<input readonly="" type="number" name = "phone" placeholder="01645460235" class="form-control" value="<?php echo $user['dienthoai'] ?>">
                    </div>
        		</div>
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Địa chỉ</label>
        			<div class="col-md-8">
        				<input readonly="" type="text" name = "address" placeholder="Thanh Hóa, Việt Nam" class="form-control"  
        				value="<?php echo $user['diachi'] ?>">
                    </div>
        		</div>    
        		<div class="form-group">
        			<label class="col-md-2 col-md-offset-1 aaa">Số tiền</label>
        			<div class="col-md-8">
        				<input readonly="" type="text" name = "address" placeholder="Thanh Hóa, Việt Nam" class="form-control"  
        				value="<?php echo $_SESSION['total'] ?>">
                    </div>
        		</div>       		

        		<button class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px" type="submit">Xác nhận</button>
            </form>
            
        </section>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
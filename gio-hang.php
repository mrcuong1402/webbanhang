<?php 

	require_once __DIR__. "/autoload/autoload.php"; 	

	if(!isset($_SESSION['name_id']))
	{
		echo "<script> alert('Bạn phải đăng nhập trước'); location.href='index.php' </script>";
	}

	if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
	{
		echo "<script> alert('Không có sản phẩm trong giỏ hàng'); location.href='index.php' </script>";
	}

	
	//_debug($_SESSION['cart']);
	
?>	
<?php require_once __DIR__.  "/layouts/header.php";
?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href="" style="font-family: 'Tahoma'"> Giỏ hàng của bạn</a> </h3>
             <?php if (isset($_SESSION['succsess'])): ?>
                <div class="alert alert-succsess">
                    <?php echo $_SESSION['succsess']; unset($_SESSION['succsess']); ?>
                </div>                
            <?php endif ?>
            <table class="table table-hover" id="shoppingcart_info">
            	<thead>
            		<tr>
            			<th class="head_table">STT</th>
            			<th class="head_table">Tên sản phẩm</th>
            			<th class="head_table">Hình ảnh</th>
            			<th class="head_table">Số lượng</th>
            			<th class="head_table">Giá</th>
            			<th class="head_table">Tổng tiền</th>
            			<th class="head_table">Thao tác</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php $stt=1;$total=0; foreach ($_SESSION['cart'] as $key => $value): ?>            			
        				<tr>
	            			<td><?php echo $stt ?></td>
	            			<td><?php echo $value['ten'] ?></td>
							<td>
								<img src="<?php echo uploads() ?>/product/<?php echo $value['thunbar'] ?>" alt="" width="80px" heigth="80px">
							</td>
							<td>
								<input type="number" name="soluong" value="<?php echo $value['soluong'] ?>" class="form-control soluong" min="0">
							</td>
							<td><?php echo formatNumber($value['gia']) ?></td>
							<td><?php echo formatNumber($value['gia'] * $value['soluong']) ?></td>
							<td>
								<a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove" ></i>Xóa</a>
								<a href="#" class="btn btn-xs btn-success updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh"></i>Cập nhật</a>
							</td>
	            		</tr>	     
	            		<?php
	            			$total += $value['gia']* $value['soluong']; 
	            			$_SESSION['total'] = $total;
	            			
	            		?> 			
            		<?php $stt ++; endforeach ?>
            		<?php  //_debug($_SESSION['total']);?>
						<tr>
							<td class="head_table">Thành tiền</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="price"><?php echo formatNumber($_SESSION['total']) ?></td>
							<td></td>
						</tr>
            		<?php  ?>
            			<tr>
            				<td><a href="index.php" class="btn btn-info">Tiếp tục mua hàng</a></td>
            				<td><a href="thanh-toan.php" class="btn btn-success">Thanh toán</a></td>
            			</tr>
            	</tbody>
            </table>
            
        </section>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
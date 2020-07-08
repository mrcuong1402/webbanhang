<?php 

	require_once __DIR__. "/autoload/autoload.php";
	$id = intval(getInput('id'));

	$product = $db -> fetchID("product",$id);

	$cateid = intval($product['id_hang']);
	
	$sql = "SELECT * FROM product WHERE id_hang = $cateid ORDER BY id DESC LIMIT 3";
	$sanphamkemtheo = $db -> fetchsql($sql);
    //_debug($product['thunbar']);

?>
<?php require_once __DIR__.  "/layouts/header.php";
?>
    <div class="col-md-9 bor">
        <section class="box-main1" >
            <div class="col-md-6 text-center">
                <img src="<?php echo base_url() ?>public/uploads/product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" >
                
            </div>
            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
               <ul id="right">
                    <li><h3> <?php echo $product['ten'] ?> </h3></li>
                    <?php if ($product['giamgia']>0): ?>
                    	<li><p><strike class="sale"><?php echo formatNumber($product['gia']) ?></strike> <b class="price"><?php echo formatPriceSale($product['gia'],$product['giamgia']) ?></b</li>	
                    <?php else: ?>
                    	<li><p><b class="price"><?php echo formatNumber($product['gia']) ?></b</li>	
                    <?php endif ?>
                    
                    <li><a href="them-gio-hang.php?id=<?php echo $id ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add To Cart</a></li>
               </ul>
            </div>

        </section>
        <div class="col-md-12" id="tabdetail">
            <div class="row">
                    
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home"><b>Mô tả sản phẩm</b> </a></li>                    
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">                        
                        <p><?php echo $product['noidung'] ?></p>
                    </div>
                    
                </div>
            </div>
        </div>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
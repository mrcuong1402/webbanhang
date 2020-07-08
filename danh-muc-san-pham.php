<?php 

	require_once __DIR__. "/autoload/autoload.php"; 
	$id = intval(getInput('id'));
	$editCategory = $db -> fetchID("category",$id);

    if(isset($_GET['p'])){
        $p = $_GET['p'];
    }
    else
    {
        $p = 1;
    }
	$sql = " SELECT * FROM product WHERE id_hang = $id";
    $total = count($db->fetchsql($sql));
	$product = $db -> fetchJones("product",$sql,$total,$p,4,true);
    $sotrang = $product['page'];
    unset($product['page']);
    $path = $_SERVER['SCRIPT_NAME'];
    //_debug($product);
    

?>
<?php require_once __DIR__.  "/layouts/header.php";
?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href=""><?php echo $editCategory['Ten'] ?></a> </h3>
            <div class="showitem">
            	<?php foreach ($product as $item): ?>            
            		<div class="col-md-3 item-product bor">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                            <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['ten'] ?></a>

                            <!-- <p><strike class="sale"><?php echo formatNumber($item['gia']) ?></strike> <b class="price"><?php echo formatPriceSale($item['gia'],$item['giamgia'])?> </b></p> -->

                            <?php if ($item['giamgia']>0): ?>
                                <p><strike class="sale"><?php echo formatNumber($item['gia']) ?></strike> <b class="price"><?php echo formatPriceSale($item['gia'],$item['giamgia']) ?></b>    
                            <?php else: ?>
                                <p><b class="price"><?php echo formatNumber($item['gia']) ?></b> 
                            <?php endif ?>
                    
                        </div>
                        <div class="hidenitem">
                            <p><a href=""><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href="them-gio-hang.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div> 
                <?php endforeach ?>    
    		</div>
	
    </div>
            <nav class="text-center">
            	<ul class="pagination">
            		<?php for($i=1;$i<=$sotrang;$i++) : ?>                       
                        
                        <li class="<?php echo ($i==$p) ? 'active' : '' ?>">
                            <a href="<?php echo $path ?>?id=<?php echo $id ?>&& p=<?php echo $i ?>" class="page-link"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>			
            	</ul>
            </nav> 
            
        </section>
    <div>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
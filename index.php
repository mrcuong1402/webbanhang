<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    //unset($_SESSION['cart']);
    $sqlHome = "select Ten, id from category where home = 1 order by updated_at";
    $categoryHome =$db -> fetchsql($sqlHome);

    $data =[];
    foreach ($categoryHome as $item) {
        # code...
        $categoryId = intval($item['id']);
        $sql ="select *from product where id_hang = $categoryId";
        $productHome = $db -> fetchsql($sql);
        $data[$item['Ten']] = $productHome;
    }

?>
<?php require_once __DIR__.  "/layouts/header.php";
?>
                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="/web_ban_giay/public/frontend/images/slide/sl3.jpg" class="img-thumbnail">
                        </section>

                        <section class="box-main1">
                            <?php foreach ($data as $key => $value): ?>
                                <h3 class="title-main" ><a href="" style="font-family: 'Arial'"><?php echo $key ?></a> </h3>
                                    <div class="showitem clearfix">
                                        <?php foreach ($value as $item): ?>
                                            <div class="col-md-3 item-product bor">
                                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"  style="font-family: 'Arial'">
                                                    <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                                </a>
                                                <div class="info-item">
                                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"  style="font-family: 'Arial'"><?php echo $item['ten'] ?></a>
                                                    <p><strike class="sale"><?php echo formatNumber($item['gia']) ?></strike> <b class="price"><?php echo formatPriceSale($item['gia'],$item['giamgia'])?> </b></p>
                                                </div>
                                                <div class="hidenitem">
                                                    <p><a href=""><i class="fa fa-search"></i></a></p>
                                                    <p><a href=""><i class="fa fa-heart"></i></a></p>
                                                    <p><a href="them-gio-hang.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                                </div>
                                            </div>         
                                        <?php endforeach ?>    
                                    </div>   
                            <?php endforeach ?>
                            
                            
                            
                        </section>

    
<?php require_once __DIR__. "/layouts/footer.php"; ?>                

                
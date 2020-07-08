<?php 
    $giohang = intval(getInput('giohang'));

    if(!isset($_SESSION['name_id']) && $giohang ==1)
    {
        echo "<script> alert('Bạn phải đăng nhập trước'); location.href='index.php' </script>";
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>D&T Store</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/web_ban_giay/public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/web_ban_giay/public/frontend/css/bootstrap.min.css">
        
        <script  src="/web_ban_giay/public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="/web_ban_giay/public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="/web_ban_giay/public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/web_ban_giay/public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="/web_ban_giay/public/frontend/css/style.css">
        
    </head>
    <body>
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header" style="font-family: 'Tahoma'">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>D & T Store</a><b  style="font-family: 'Arial'">Thế giới giày da D & T </b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>                                            
                                            <li>
                                                <a href="" class="aaa"><i class="fa fa-user"></i> <?php echo $_SESSION['name_user'] ?> <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href=""><i class="fa fa-info ">&nbsp</i>Thông tin cá nhân</a></li>
                                                    <li><a href="gio-hang.php"><i class="fa fa-cart-plus">&nbsp&nbsp</i>Giỏ hàng</a></li>

                                                </ul>
                                            </li>
                                            <li><a href="thoat.php"><i class="fa fa-share-square-o"></i> Đăng xuất</a></li>                                             
                                        <?php else: ?>
                                        
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                            </li>
                                            <li>
                                                <a href="dang-ki.php"><i class="fa fa-unlock"></i> Đăng ký</a>
                                            </li>
                                        <?php endif ?>
                                        

                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control"  style="font-family: 'Arial'">
                                            <option> Tất cả danh mục</option>
                                            <?php foreach($category as $item): ?>
                                                <option> <?php echo $item['Ten'] ?> </option>
                                            <?php endforeach; ?>

                                        </select>
                                    </label>
                                    <input type="text" name="" placeholder=" Nhập từ khóa" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="">
                                <img src="">
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0164 546 0235</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php"  style="font-family: 'Arial'">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="">Shop</a>
                            </li>
                            <li>
                                <a href="">Mobile</a>
                            </li>
                            <li>
                                <a href="">Contac</a>
                            </li>
                            <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li>
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php?giohang=1"><i class="fa fa-shopping-basket"></i> My Cart </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"  style="font-family: 'Arial'"><i class="fa fa-list"></i>  Danh mục</h3>
                            <ul>
                                <?php foreach ($category as $item) :?>                                    
                                    <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['Ten'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>


                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title" style="font-family: 'Arial'"><i class="fa fa-bullseye"></i>  Sản phẩm mới </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($productNew as $item): ?>
                                    <li class="clearfix">
                                        <a href="chi-tiet-san-pham.php?id=$item['id']">
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name" style="font-family: 'Arial'"> <?php echo $item['ten'] ?></p >
                                                <b class="price"  style="font-family: 'Arial'">Giảm giá: <?php echo $item['giamgia'] ?> đ</b><br>
                                                <b class="sale" style="font-family: 'Arial'">Giá gốc: <?php echo $item['gia'] ?> đ</b><br>
                                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                            </div>
                                        </a>
                                    </li>  
                                <?php endforeach ?>
                                

                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title" style="font-family: 'Arial'"><i class="fa fa-star" ></i>  Sản phẩm HOT </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($productHot as $item): ?>
                                    <li class="clearfix">
                                        <a href="chi-tiet-san-pham.php?id=$item['id']">
                                            <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                            <div class="info pull-right">
                                                <p class="name" style="font-family: 'Arial'"> <?php echo $item['ten'] ?></p >
                                                <b class="price"  style="font-family: 'Arial'">Giảm giá: <?php echo $item['giamgia'] ?> đ</b><br>
                                                <b class="sale" style="font-family: 'Arial'">Giá gốc: <?php echo $item['gia'] ?> đ</b><br>
                                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                            </div>
                                        </a>
                                    </li>  
                                <?php endforeach ?>
                                

                            </ul>
                            <!-- </marquee> -->
                        </div>
                    </div>
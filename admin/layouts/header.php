
<?php 
    require_once __DIR__. "/../autoload/autoload.php";
    $type = $db -> fetchAll("type");
    $sql = "SELECT count(trangthai) FROM transaction WHERE trangthai = 1";
    //$status = $db -> fetchStatus("transaction"," trangthai = 1 ");
    $status = $db->fetchAll("transaction");
    $sts = $db -> fetchsql($sql);
    $i=0;
    foreach ($status as $value) {
        if($value['trangthai'] == 0){
            $i++;
        }
    }
    echo $i;
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Trang Admin</title>
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url() ?>/public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url() ?>/public/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url() ?>/public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url() ?>public/admin/css/sb-admin.css" rel="stylesheet">
    </head>
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
        <!-- Navigation-->
        <form action="" method="POST">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="/web_ban_giay/admin/index.php">
                <i class="fa fa-cog"></i>
                <?php echo $_SESSION['name_user'] ?>
                    
             </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                        <i class="fa fa-list"></i>
                        <span class="nav-link-text">Danh mục</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a href="<?php echo base_url() ?>/admin/modules/category/index.php">Hãng</a>
                            </li>
                           <li>
                                <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Sản phẩm</a>
                                <ul class="sidenav-third-level collapse" id="collapseMulti2">
                                    <?php foreach ($type as $item): ?>
                                        <li>
                                            <a href="?loai=<?php echo $item['id']; ?>"><?php echo $item['ten'] ?></a>
                                        </li>
                                    <?php endforeach ?>
                                    <?php 
                                        if(isset($_GET['loai'])){
                                                $loai = $_GET['loai'];
                                        }
                                        else{
                                             $loai = "";
                                        }
                                        if($loai==8){
                                            redirect("/admin/modules/product/shoe/index.php");
                                        }
                                        if($loai==3){
                                            redirect("/admin/modules/product/sandal/index.php");
                                        }
                                    ?>
                                    <li>
                                        <a href="<?php echo base_url() ?>/admin/modules/product/index.php">Tất cả Sản Phẩm</a>
                                    </li>                                 
                                </ul>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>/admin/modules/type/index.php">Loại sản phẩm</a>
                            </li>
                            
                        </ul>
                    </li>
                    <?php if (isset($_SESSION['ChucVu'])): ?>                                       
                        <?php if ($_SESSION['ChucVu'] == 2): ?>
                            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                                <a class="nav-link" href="<?php echo base_url() ?>/admin/modules/admin/index.php">
                                <i class="fa fa-user"></i>
                                <span class="nav-link-text">Admin</span>
                                </a>
                            </li>
                        <?php endif ?>
                    <?php endif ?>
                    
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="<?php echo base_url() ?>/admin/modules/user/index.php">
                        <i class="fa fa-address-book"></i>
                        <span class="nav-link-text">Khách hàng</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                        <a class="nav-link" href="<?php echo base_url() ?>/admin/modules/transaction/index.php">
                        <i class="fa fa-yelp"></i>
                        <span class="nav-link-text">Quản lí đơn hàng</span>
                        </a>
                    </li>
                    
                    
                </ul>
                <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                        <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="d-lg-none">Alerts
                              <span class="badge badge-pill badge-warning">6 New</span>
                            </span>
                            <span class="indicator text-warning d-none d-lg-block">
                              <?php if ($i != 0): ?>
                                  <i class="fa fa-fw fa-circle"></i>
                              <?php endif ?>
                            </span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">Thông báo</h6>
                            <div class="dropdown-divider"></div>
                            <a  class="dropdown-item" href="<?php echo base_url() ?>admin/modules/transaction/index.php">
                              <span class="text-success">
                                <strong>
                                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                              </span>
                              <!-- <span class="small float-right text-muted">11:21 AM</span> -->
                              <div class="dropdown-message small">
                                <?php if ($i != 0): ?>
                                    Bạn có <?php echo $i ?> đơn hàng chưa xử lý !
                                <?php else: ?>
                                    Không có thông báo !
                                <?php endif ?>
                                    
                              </div>
                            </a>                           
                          </div>
                        </li>
                    <li class="nav-item">
                          <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="Search for...">
                              <span class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                  <i class="fa fa-search"></i>
                                </button>
                              </span>
                            </div>
                          </form>
                        </li>
                    
                    <li class="nav-item">

                        <a href="thoat.php" class="nav-link aaa" data-toggle="modal" data-target="#exampleModal">
                            <!-- <a href="thoat.php" class="nav-link"> -->
                        <i class="fa fa-fw fa-sign-out"></i>Thoát</a>
                    </li>
                </ul>
            </div>
        </nav>
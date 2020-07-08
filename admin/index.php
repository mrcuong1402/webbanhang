<?php 
    require_once __DIR__. "/autoload/autoload.php";
    
    $category = $db -> fetchAll("category");
?>
<?php require_once __DIR__.  "/layouts/header.php"; ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Trang chủ</a>
                    </li>
                    <!-- <li class="breadcrumb-item active">My Dashboard</li> -->
                </ol>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-success o-hidden h-35 ">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                          </div>
                          <div class="mr-5"><?php echo $i ?> Đơn hàng mới!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>admin/modules/transaction/index.php">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    <?php if (isset($_SESSION['ChucVu'])): ?>                                       
                        <?php if ($_SESSION['ChucVu'] == 2): ?>
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-danger o-hidden h-35">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fa fa-fw fa-support"></i>
                          </div>
                          <div class="mr-5">Doanh thu </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="doanh-thu.php">
                          <span class="float-left">View Details</span>
                          <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                          </span>
                        </a>
                      </div>
                    </div>
                    <?php endif ?>
                    <?php endif ?>
                  </div>
            </div>           
           
 <?php require_once __DIR__.  "/layouts/footer.php"; ?>
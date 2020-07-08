<?php 
    require_once __DIR__. "/autoload/autoload.php";     

?>
<?php require_once __DIR__.  "/layouts/header.php"; ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Doanh thu</a>
                    </li>
                    
                </ol>
            </div>           
     <div class="container-fluid">      
        <div class="row">
            <div class="col-md-12">
                <form action="chi-tiet-doanh-thu.php" method="GET" enctype="multipart/form-data">
                     
                  <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="" name="quy" placeholder="Năm 2018" >
                    </div> 
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <!-- <a href="chi-tiet-doanh-thu.php?quy=<?php echo $quy ?>" class="btn btn-primary">Xem</a> -->
                      <input type="submit" value="Xem" class="btn btn-info">
                      <a href="index.php" class="btn btn-success"> Quay lại</a>
                    </div> 
                  </div>   
                    
                </form>
            </div>         
        </div>
    </div>
 <?php require_once __DIR__.  "/layouts/footer.php"; ?>
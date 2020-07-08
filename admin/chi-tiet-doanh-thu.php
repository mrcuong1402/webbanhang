<?php 
    require_once __DIR__. "/autoload/autoload.php";
    
      $quy1 = intval(getInput('quy'));
   
      if(empty($error)){
     
           $sql1 = "SELECT SUM(tongtien) as tong FROM transaction WHERE MONTH(created_at) >  0 and MONTH(created_at) < 4 AND YEAR(created_at) = $quy1";
           $tong1 = $db-> fetchsql($sql1);
           //echo $sql1;
             //_debug($tong1);
           $sql2 = "SELECT SUM(tongtien) as tong FROM transaction WHERE MONTH(created_at) >  3 and MONTH(created_at) < 7 AND YEAR(created_at) = $quy1 ";
           $tong2 = $db-> fetchsql($sql2);
        //_debug($tong2);
           $sql3 = "SELECT SUM(tongtien) as tong FROM transaction WHERE MONTH(created_at) >  6 and MONTH(created_at) < 9 AND YEAR(created_at) = $quy1 ";
           $tong3 = $db-> fetchsql($sql3);
        //_debug($tong3);
           $sql4 = "SELECT SUM(tongtien) as tong FROM transaction WHERE MONTH(created_at) >  9 and MONTH(created_at) < 13 AND YEAR(created_at) = $quy1";
           $tong4 = $db-> fetchsql($sql4);
      //_debug($tong4);
        // $sql = "SELECT SUM(tongtien) as tong FROM transaction WHERE MONTH(created_at) =  1 OR MONTH(created_at) =  2 OR MONTH(created_at) =  3 AND YEAR(created_at) = $quy1";
           $sql = "SELECT SUM(tongtien) as tong FROM transaction WHERE YEAR(created_at) = $quy1";
        $quy = $db -> fetchsql($sql);
      }

      
      //_debug($quy1);
    
    

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
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="" name="quy" placeholder="Năm 2018" value="<?php echo $quy1 ?>">
                    </div> 

                    <div class="col-xl-3 col-sm-6 mb-3">
                      <input type="submit" value="Xem" class="btn btn-info">
                      <a href="index.php" class="btn btn-success"> Quay lại</a>
                    </div>
                  
                      <!-- <?php if (isset($error['quy'])): ?>
                          <p class="text-danger"> <?php echo $error['quy']; ?> </p>   
                      <?php endif ?> -->
     
                    <div class="container-fluid">      
                      <!-- <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Hóa đơn</th>
                            <th>Thành tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(empty($error)): ?>
                          <?php $stt=1;$tong = 0; foreach ($quy as $value): ?>
                            <tr>
                              <td><?php echo $stt ?></td>
                              <td>HD <?php echo $value['id'] ?></td>
                              <td><?php echo $value['tongtien'] ?></td>
                            </tr>
                          <?php $stt++; $tong += $value['tongtien']; endforeach ?>

                            <tr style="font-weight: bold; color: red;">
                              <td>Tổng doanh thu</td>
                              <td></td>
                              <td><?php echo $tong ?></td>
                              <?php endif ?>
                            </tr>
                        </tbody>
                      </table> -->
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>Quý I</th>
                            <th>Quý II</th>
                            <th>Quý III</th>
                            <th>Quý IV</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <?php foreach ($tong1 as $value): ?>
                                <?php echo formatNumber($value['tong']) ?>
                              <?php endforeach ?>
                            </td>
                            <td>
                              <?php foreach ($tong2 as $value): ?>
                                <?php echo formatNumber($value['tong']) ?>
                              <?php endforeach ?>
                            </td>
                            <td>
                              <?php foreach ($tong3 as $value): ?>
                                <?php echo formatNumber($value['tong']) ?>
                              <?php endforeach ?>
                            </td>
                            <td>
                              <?php foreach ($tong4 as $value): ?>
                                <?php echo formatNumber($value['tong']) ?>
                              <?php endforeach ?>
                            </td>
                          </tr>
                          <tr style="font-weight: bold; color: red;">
                            <td>Tổng doanh thu</td>
                            <td></td>
                            <td></td>
                            <td>
                              <?php foreach ($quy as $value): ?>
                                <?php echo formatNumber($value['tong']) ?>
                              <?php endforeach ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
            </div>         
        </div>
    </div>
 <?php require_once __DIR__.  "/layouts/footer.php"; ?>
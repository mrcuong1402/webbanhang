<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    $id = intval(getInput('id'));

    $sql = "SELECT p.ten, o.soluong, o.gia FROM product p, orders o WHERE p.id = o.id_sp AND o.transaction_id = $id";
    $orders = $db -> fetchsql($sql);
    //echo $sql;
    //_debug($orders); 


?>


<?php require_once __DIR__.  "/../../layouts/header.php"; ?>
        <div class="content-wrapper">           
            <div class="container-fluid">
                <div class="card mb-2">
                <div class="card-header">
                    <i class=""></i>  <b>Chi tiết đơn hàng <?php echo $id ?></b>                 
                <div class="">
                    <i class=""></i>    
                                             
                    <div>
                                  <!-- Thông báo lỗi -->
                         <?php require_once __DIR__.  "/../../../partials/notification.php"; ?>
                    </div>   


                </div>
                <div class="clearfix"></div>
                
                
                <div class="card-body">                    
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">               
                                <div class="col-sm-14">                                   
									<table class="table table-hover">
										<thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên sản phẩm</th>                                              
                                                <th scope="col">Số lượng</th>
                                                <th scope="col">Giá</th>    
                                                <th scope="col">Thành tiền</th>                                                                                                  
                                            </tr>

                                        </thead>
										<tbody>
											<?php $stt = 1;$tt=0; foreach ($orders as $item): ?> 
                                                 <tr>
                                                     <td><?php echo $stt ?></td>
                                                     <td><?php echo $item['ten'] ?></td>                                     
                                                     <td><?php echo $item['soluong'] ?></td>
                                                     <td><?php echo $item['gia'] ?></td> 
                                                     <td>
                                                         <?php echo $tt = $item['gia']*$item['soluong'] ?>
                                                     </td> 
                                                     
                                                 </tr>

                                            <?php $stt++; endforeach ?>
										</tbody>
									</table>

                                    <a href="index.php" class="btn btn-info pull-right">Back</a>
                                    <div class="pull-right">
                                        <!-- <div class="">
                                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous" id="dataTable_previous"><a tabindex="0" class="page-link" aria-controls="dataTable" href="?page=1" data-dt-idx="0"><<</a></li>

                                                    <?php for($i=1;$i<=$sotrang;$i++) : ?>

                                                        <?php 
                                                            if(isset($_GET['page'])){
                                                                $p = $_GET['page'];
                                                            }
                                                            else{
                                                                $p = 1;
                                                            }
                                                        ?>
                                                        
                                                        <li class="<?php echo ($i==$p) ? 'active' : '' ?>">
                                                            <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                                                        </li>
                                                    <?php endfor; ?>

                                                   
                                                    <li class="paginate_button page-item next" id="dataTable_next"><a tabindex="0" class="page-link" aria-controls="dataTable" href="?page=<?php echo $sotrang; ?>" data-dt-idx="7">>></a></li>
                                                </ul>
                                            </div>
                                        </div> -->
                                     </div>
                                </div>
                            </div>                            
                        </div>


                    </div>
                </div>
            </div>
            
        </div>


 <?php require_once __DIR__.  "/../../layouts/footer.php"; ?>
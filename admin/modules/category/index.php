<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    $category = $db -> fetchAll("category");
     if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p=1;
    }

    $sql = "SELECT * FROM category ";
    $category = $db -> fetchJone('category',$sql,$p,5,true);
    
    if(isset($category['page'])){
        $sotrang = $category['page'];
        unset($category['page']);
    }
?>
<?php require_once __DIR__.  "/../../layouts/header.php"; ?>
        <div class="content-wrapper">           
            <div class="container-fluid">
                <div class="card mb-2">
                <div class="card-header">
                    <i class=""></i>  <b>Hãng</b>   <a href="add.php" class="btn btn-success"> Thêm mới</a>                          
                </div>
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
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Home</th>
                                                <th scope="col">Ngày tạo</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $stt = 1; foreach ($category as $item): ?>
                                                 <tr>
                                                     <td><?php echo $stt ?></td>
                                                     <td><?php echo $item['Ten'] ?></td>
                                                     <td>
                                                        <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['home']==1?'btn-info':'btn-defaul' ?>">
                                                            <?php echo $item['home'] == 1? "Hiển thị" :"Không" ?>                                                          
                                                        </a>
                                                     </td>
                                                     <td><?php echo $item['created_at'] ?></td>
                                                     <td>
                                                         <a class = "btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                                         <a class = "btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>" onClick="return confirm('Bạn có muốn xóa không')"><i class="fa fa-times"></i>Xóa</a>
                                                     </td>
                                                 </tr>
                                            <?php $stt++; endforeach ?>
                                        </tbody>
                                    </table>
                                   <div class="pull-right">
                                        <div class="">
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
                                        </div>
                                     </div>
                                </div>
                            </div>                            
                        </div>


                    </div>
                </div>
            </div>
            
        </div>


 <?php require_once __DIR__.  "/../../layouts/footer.php"; ?>
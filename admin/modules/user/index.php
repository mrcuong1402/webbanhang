<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p=1;
    }

    $sql = "SELECT user.* FROM user ORDER BY ID DESC ";
    $user = $db -> fetchJone('user',$sql,$p,5,true);
    
    if(isset($user['page'])){
        $sotrang = $user['page'];
        unset($user['page']);
    }
?>
<?php require_once __DIR__.  "/../../layouts/header.php"; ?>
        <div class="content-wrapper">           
            <div class="container-fluid">
                <div class="card mb-2">
                <div class="card-header">
                    <i class=""></i>  <b>Khách hàng</b>                    
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
                                                <th scope="col">Họ và tên</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Địa chỉ</th>
                                                <th scope="col">Điện thoại</th>      
                                                <th scope="col">Hành động</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $stt = 1; foreach ($user as $item): ?>
                                                 <tr>
                                                     <td><?php echo $stt ?></td>
                                                     <td><?php echo $item['ten'] ?></td>
                                                     <td><?php echo $item['email'] ?></td>
                                                     <td><?php echo $item['diachi'] ?></td>
                                                     <td><?php echo $item['dienthoai'] ?></td>                   
                                                     <td>
                                                         <a class = "btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                                         <a onClick="return confirm('Bạn có muốn xóa không')" class = "btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
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
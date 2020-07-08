<?php 
    require_once __DIR__. "/../../../autoload/autoload.php";
    $type = $db -> fetchAll("type");
    if(isset($_GET['page'])){
        $p = $_GET['page'];
    }
    else{
        $p=1;
    }

    
    $sql = "SELECT product.*,category.ten as namecate FROM product LEFT JOIN category on category.id=product.id_hang WHERE product.id_loaisp = 8";
    $product__ = $db -> fetchJone('product',$sql,$p,5,true);
    
    if(isset($product__['page'])){
        $sotrang = $product__['page'];
        unset($product__['page']);
    }
?>
<?php require_once __DIR__.  "/../../../layouts/header.php"; ?>
        <div class="content-wrapper">           
            <div class="container-fluid">
                <div class="card mb-2">
                <div class="card-header">
                    <i class=""></i>  <b>Sản phẩm</b>   <a href="<?php echo base_url() ?>/admin/modules/product/add.php" class="btn btn-success"> Thêm mới</a>                 
                <div class="">
                    <i class=""></i>    
                                             
                <div>
                              <!-- Thông báo lỗi -->
                     <?php require_once __DIR__.  "/../../../../partials/notification.php"; ?>
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
                                                <th scope="col">Tên Hãng</th>
                                                <th scope="col">Hình ảnh</th>
                                                <th scope="col">Thông tin</th>
                                                <th scope="col">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $stt = 1; foreach ($product__ as $item): ?>
                                                 <tr>
                                                     <td><?php echo $stt ?></td>
                                                     <td><?php echo $item['ten'] ?></td>
                                                     <td><?php echo $item['namecate'] ?></td>
                                                     <td>
                                                         <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" width="80px" height="80px">
                                                     </td>
                                                     <td>
                                                         <ul>
                                                             <li>Giá: <?php echo $item['gia']; ?></li>
                                                             <li>Số lượng: <?php echo $item['soluong']; ?></li>
                                                         </ul>
                                                     </td>
                                                     <td>
                                                         <a class = "btn btn-xs btn-info" href="/web_ban_giay//admin/modules/product/edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                                         <a onClick="return confirm('Bạn có muốn xóa không')" class = "btn btn-xs btn-danger" href="/web_ban_giay/admin/modules/product/delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
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

                                                    <?php for($i=1;$i<$sotrang;$i++) : ?>

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

                                                   
                                                    <li class="paginate_button page-item next" id="dataTable_next"><a tabindex="0" class="page-link" aria-controls="dataTable" href="?page=<?php echo $sotrang-1; ?>" data-dt-idx="7">>></a></li>
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

 <?php require_once __DIR__.  "/../../../layouts/footer.php"; ?>
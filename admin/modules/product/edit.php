<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    /**
     * danh sách sản phẩm
    **/

    $id = intval(getInput('id'));
    $editProduct = $db -> fetchID("product",$id);
    if(empty($editProduct)){
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");
    }

    $category = $db -> fetchAll("category");



       if($_SERVER["REQUEST_METHOD"]=="POST"){
            $data = 
            [
            "ten" => postInput('name'),
            "slug" => to_slug(postInput('name')),
            "id_hang" => postInput('category_id'),
            "gia" => postInput('price'),
            "noidung" => postInput('content'),
            "soluong" => postInput('number'),
            "giamgia" => postInput('giamgia')
            ];

            $error = [];
            if(postInput('name')==""){
                $error['name'] = "Mời bạn nhập đầy đủ tên Sản phẩm";
            }

            if(postInput('number')==""){
                $error['number'] = "Mời bạn nhập số lượng";
            }

            if(postInput('category_id')==""){
                $error['category_id'] = "Mời bạn chọn tên Hãng";
            }

            if(postInput('price')==""){
                $error['price'] = "Mời bạn nhập giá Sản phẩm";
            }

            if(postInput('content')==""){
                $error['content'] = "Mời bạn nhập nội dung";
            }

            if(empty($error)){
                if(isset($_FILES['thunbar'])){
                    $file_name = $_FILES['thunbar']['name'];
                    $file_tmp = $_FILES['thunbar']['tmp_name'];
                    $file_type = $_FILES['thunbar']['type'];
                    $file_error = $_FILES['thunbar']['error'];

                    if($file_error == 0){
                        $part = ROOT."product/";
                        $data['thunbar'] = $file_name;
                    }
                }

                $update_ = $db -> update("product",$data,array("id"=>$id));
                    if($update_ > 0){
                        move_uploaded_file($file_tmp, $part.$file_name);
                        $_SESSION['success'] = "Cập nhật thành công";
                        redirectAdmin("product");    
                    }
                    else{
                        move_uploaded_file($file_tmp, $part.$file_name);
                        $_SESSION['error'] = "Dữ liệu không thay đổi";
                        redirectAdmin("product");    
                    }
                }
            
        }
    

?>
<?php require_once __DIR__.  "/../../layouts/header.php"; ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm mới Sản phẩm</li>
                </ol>
            </div>           
     <div class="container-fluid">      
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST" enctype="multipart/form-data">

                             <!-- Thông báo lỗi -->
                             <?php require_once __DIR__.  "/../../../partials/notification.php"; ?>
                     
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hãng</label>
                        <select name="category_id" id="" class="form-control">
                            <option value=""> - Mời bạn chọn Hãng</option>
                            <?php foreach ($category as $item): ?>
                                <option value="<?php echo $item['id'] ?>" <?php echo $editProduct['id_hang'] == $item['id'] ? "selected = 'selected' ":'' ?>><?php echo $item['Ten'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?> </p>   
                        <?php endif ?>
                    
                    </div>          
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên Sản phẩm" name="name" value="<?php echo $editProduct['ten']; ?>">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?> </p>   
                        <?php endif ?>
                    
                    </div>       
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Sản phẩm</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="299.000" name="price" value="<?php echo $editProduct['gia']; ?>" >
                        <?php if (isset($error['price'])): ?>
                            <p class="text-danger"> <?php echo $error['price']; ?> </p>   
                        <?php endif ?>
                    
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="0" name="number" value="<?php echo $editProduct['soluong']; ?>">
                        <?php if (isset($error['soluong'])): ?>
                            <p class="text-danger"> <?php echo $error['soluong']; ?> </p>   
                        <?php endif ?>
                    
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giảm giá</label>                        
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="10%" name="giamgia" value="<?php echo $editProduct['giamgia']; ?>">
                    </div>   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh</label>                        
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thunbar" value="0">
                        <?php if (isset($error['thunbar'])): ?>
                            <p class="text-danger"> <?php echo $error['thunbar']; ?> </p>   
                        <?php endif ?>
                        <img src="<?php echo uploads() ?>product/<?php echo $editProduct['thunbar'] ?>" width="50px" height="50px" alt="">

                    </div>  
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung</label>
                        <textarea class="form-control" name="content" rows="5"><?php echo $editProduct['noidung']; ?></textarea>
                        <?php if (isset($error['content'])): ?>
                            <p class="text-danger"> <?php echo $error['content']; ?> </p>   
                        <?php endif ?>
                    
                    </div>    

                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php" class="btn btn-success"> Quay lại</a>
                </form>
            </div>         
        </div>
    </div>
 <?php require_once __DIR__.  "/../../layouts/footer.php"; ?>
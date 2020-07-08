<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
    
    /**
     * danh sách hãng
    **/
    $category = $db -> fetchAll("category");
    $type = $db -> fetchAll("type");




    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $data = 
        [
            "ten" => postInput('name'),
            "slug" => to_slug(postInput('name')),
            "id_hang" => postInput('category_id'),
            "gia" => postInput('price'),
            "noidung" => postInput('content'),
            "soluong" => postInput('number'),
            "id_loaisp" => postInput('id_type')        

        ];

        $error = [];
        if(postInput('name')==""){
            $error['name'] = "Mời bạn nhập đầy đủ tên Sản phẩm";
        }

        if(postInput('number')==""){
            $error['number'] = "Mời bạn nhập số lượng";
        }

        if(postInput('id_type')==""){
            $error['id_type'] = "Mời bạn chọn Loại sản phẩm";
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

        if(!isset($_FILES['thunbar'])){
            $error['thunbar'] = "Mời bạn chọn hình ảnh";
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
                echo "$file_name";
            }

            $id_insert = $db -> insert("product",$data);
            if($id_insert){
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("product");    
            }
            else
            {
                $_SESSION['error'] = "Thêm mới thất bại";
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
                        <label for="exampleInputEmail1">Loại sản phẩm</label>
                        <select name="id_type" id="" class="form-control">
                            <option value=""> - Mời bạn chọn Loại sản phẩm</option>
                            <?php foreach ($type as $value): ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['ten'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($error['id_type'])): ?>
                            <p class="text-danger"> <?php echo $error['id_type']; ?> </p>   
                        <?php endif ?>
                    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hãng</label>
                        <select name="category_id" id="" class="form-control">
                            <option value=""> - Mời bạn chọn Hãng</option>
                            <?php foreach ($category as $value): ?>
                                <option value="<?php echo $value['id'] ?>"><?php echo $value['Ten'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <?php if (isset($error['category_id'])): ?>
                            <p class="text-danger"> <?php echo $error['category_id']; ?> </p>   
                        <?php endif ?>
                    
                    </div>          
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Tên Sản phẩm" name="name">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name']; ?> </p>   
                        <?php endif ?>
                    
                    </div>       
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Sản phẩm</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="299.000" name="price">
                        <?php if (isset($error['price'])): ?>
                            <p class="text-danger"> <?php echo $error['price']; ?> </p>   
                        <?php endif ?>
                    
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" placeholder="0" name="number">
                        <?php if (isset($error['number'])): ?>
                            <p class="text-danger"> <?php echo $error['number']; ?> </p>   
                        <?php endif ?>
                    
                    </div>    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giảm giá</label>                        
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="10%" name="sale" value="0">
                    </div>   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh</label>                        
                        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="thunbar">
                        <?php if (isset($error['thunbar'])): ?>
                            <p class="text-danger"> <?php echo $error['thunbar']; ?> </p>   
                        <?php endif ?>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung</label>
                        <textarea class="form-control" name="content" rows="5"></textarea>
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
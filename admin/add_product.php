<?php
require_once "header.php";  
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = "";
    $type = $_POST['type'];
//đoạn code dùng để upload & xử lý ảnh
//kiểm tra người dùng đã chọn file ảnh có dung lượng khác 0
if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {	
    //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
    $temp_name = $_FILES['image']['tmp_name'];
    //khai báo biến dùng để lưu tên của ảnh
    $img_name = $_FILES['image']['name'];
    //tách tên file ảnh dựa vào dấu chấm
    $parts = explode(".", $img_name);
    //tìm index cuối cùng
    $lastIndex = count($parts) - 1;
    //lấy ra extension (đuôi) file ảnh
    $extension = $parts[$lastIndex];
    //thiết lập tên mới cho ảnh
    $image = $price . "_" . $class . "." . $extension;
    //thiết lập địa chỉ file ảnh cần di chuyển đến
    $image_folder = "images/product/";
    $destination = $image_folder . $image;
    //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
    move_uploaded_file($temp_name, $destination);
}
$sql = "INSERT INTO product (product_name, price, procduct_type, product_image,type)
        VALUES ('$name', '$price', '$category', '$image', '$type')";
$run = querySQL($sql);
if ($run) { ?>
   <script>
       alert("Add product successfully !");
       window.location.href = "manage_product.php";
   </script>
<?php } }  ?>
<style type="text/css">
    body{
        background-image: url(images/background1.png);
        background-repeat: no-repeat;
        background-size: 100%;
    }
    .frm1234{
        background-color: #66ffff;
    }
</style>
<body>
<center>
<form class="frm" action="" method="POST" enctype="multipart/form-data" class="frm1234">
<!-- Lưu ý: bổ sung thuộc tính enctype vào form khi upload file -->
    
    <legend><strong>Add Product</strong></legend>
    <strong>Name</strong> : <input type="text" name="name" required maxlength="50"> <br> <br>
    <strong>Price</strong>  : <input type="number" name="price" required maxlength="10"> <br> <br>
    <strong>Category</strong>: <br> <br>
    <?php
    $sql = "SELECT * FROM category";
    $run = querySQL($sql); ?>
    <select name="category">
    <?php
    while ($row = mysqli_fetch_array($run)) { ?>
        <option value='<?= $row['category_id'] ?>'> <?= $row['category_name'] ?> </option>
    <?php } ?>
    </select> 
    <br> <br>
    <strong>Image</strong>: <input type="file" name="image" required> <br> <br>
    <strong>Type Product</strong>: <input type="text" name="type" required maxlength="30"><br>
    <input type="submit" value="Add" name="add">
</form>
</center>
</body>


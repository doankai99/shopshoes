<?php 
require_once 'header.php';
$id = $_POST['id'];
$qry = "SELECT * FROM product WHERE product_id = '$id'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
$name = $row['product_name'];
$price = $row['price'];
$category = $row['procduct_type'];
$image = $row['product_image'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = "";
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
    $image = $price . "_" . $category . "." . $extension;
    //thiết lập địa chỉ file ảnh cần di chuyển đến
    $image_folder = "images/product/";
    $destination = $image_folder . $image;
    //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
    move_uploaded_file($temp_name, $destination);
} 
else { //người dùng không update ảnh => lấy lại ảnh cũ
    $image =  $row['product_image'];
}
$query12 = "UPDATE product SET product_name = '$name', price = '$price', 
          procduct_type = '$category', product_image = '$image' 
          WHERE product_id = '$id'";
$result12 = querySQL($query12);
if ($result12) { ?>
  <script>
      alert("Update successfully !");
      window.location.href = "manage_product.php";
  </script>
<?php } else { ?>
    <script>
      alert("Update failed !");
      window.location.href = "manage_product.php";
  </script>
<?php } } ?>
<style type="text/css">
    body{
        background-image: url(images/download.jpg);
    }
    .frm123{
        margin-bottom: 250px;
        background-color: green;
    }
</style>

<body>
<center>
<form class="frm12" action="" method="POST" enctype="multipart/form-data">
        <legend><h3 style="color: red">Update Product</h3></legend>
        Name: <input type="text" required maxlength="30" size="35"
               name="name" value="<?= $name ?>"> <br> <br>
        Price: <input type="number" required maxlength="10" size="12"
               name="price" value="<?= $price ?>"> <br> <br>
        Category:  
        <?php
        $sql = "SELECT * FROM category";
        $run = querySQL($sql); 
        ?>
        <select name="category">
        <?php
        while ($row1 = mysqli_fetch_array($run)) { 
            if ($row1['category_id'] == $category) { ?>
                <option value='<?= $category ?>' selected> <?= $row1['category_name'] ?> </option>
            <?php } else { ?>
                <option value='<?= $row1['category_id'] ?>'> <?= $row1['category_name'] ?> </option>
            <?php } } ?>
        </select> 
        <br> <br>
        Image: <img src='images\product\<?= $image ?>' width="150" height="150" ><br>
        <input type="file" name="image" accept="images/*"> <br> <br>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Update" name="update">
</form>
</center>
</body>
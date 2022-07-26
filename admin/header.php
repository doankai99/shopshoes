<?php
require_once 'functions.php';
//require_once 'restricted.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <title>Shoes Shop</title>
  <link rel="stylesheet" type="text/css" href="css\css_admin.css?version=5">
  <meta charset="utf-8">
</head>
  <div id="top">
    <h1>🅽🆇🅳</h1>
  <div id="container">
<ul>
  <li><a href="home.php">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" >Product</a>
    <div class="dropdown-content">
      <a href="manage_product.php">Manage Product</a>
      <a href="add_product.php">Add Product</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Category</a>
    <div class="dropdown-content">
      <a href="manage_category.php">Manage category</a>
      <a href="add_category.php">Add category</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">User</a>
    <div class="dropdown-content">
      <a href="manage_user.php">Manage user</a>
      <a href="add_user.php">Add user</a>
    </div>
  </li>
  <li><a onclick="about();">About</a></li>
  <li><a href="../index.php">Customer Website</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</div>
<script type="text/javascript">
  function about() {
    alert("Chào mừng bạn đến với Đ Shop");
  }
</script>
</div>
</html>
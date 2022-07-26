<!DOCTYPE HTML>
<html>
<head>
  <title>Shose Shop</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/css_home.css?version=2" title="style" />
  <style type="text/css">
    .sidebar{
      float: left;
    }
   .content{
    float: left;
    width: 650px;
    background-color: #b3f0ff;
   }
   .std_info1{
    text-align: center;
   }
  </style>
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1 align="center">🅽🆇🅳</a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="admin/index.php">Admin</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3>Category</h3>
        <ul>
           <?php
           include_once ('admin/functions.php');
           $sql = "SELECT * FROM category";
           $rst = querySQL($sql);
           while ($cls = mysqli_fetch_array($rst)) { ?>
           <li><a href="category_detail.php?CategoryID=<?= $cls['category_id'] ?>"><?= $cls['category_name'] ?></a></li>
           <?php } ?>
        </ul>
      </div>
      <div class="content">
      <?php
      if (isset($_GET['ProductID'])) {
      $ProductID = $_GET['ProductID'];
      $sql1 = "SELECT * FROM product WHERE product_id = '$ProductID'";
      $rst1 = querySQL($sql1);
      while ($std = mysqli_fetch_array($rst1)) { ?>
        <div class="std_detail1">
          <div class="std_info1" align="center">
            <img src='admin\images\product\<?= $std['product_image']?>' width="250" height="250"> 
            <br> <br>
            Name: <?= $std['product_name'] ?> <br> <br>
            Price: <?= $std['price'] ?> <br> <br>
            <a href='order_product.php?ProductID=<?= $std['product_id']?>'>Buy</a>
            <?php
            $scategory = $std['procduct_type'];
            $sql2 = "SELECT category_name FROM category WHERE category_id = '$scategory'";
            $rst2 = querySQL($sql2);
            $Category = mysqli_fetch_array($rst2); ?>
            Category: <?= $Category[0] ?> <br> <br>
          </div>     
        </div>
      <?php } 
      } 
      ?>
      </div>
    </div>
    </div>
    <div id="footer">
      Xuan Doan @171099
    </div>
</body>
</html>

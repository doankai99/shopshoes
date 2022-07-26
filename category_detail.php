<!DOCTYPE HTML>
<html>

<head>
  <title>Shoes Shop</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/css_home.css?version=3" title="style" />
</head>
  <style type="text/css">
    .sidebar{
      float: left;
    }
   .content{
    float: left;
    width: 650px;
    background-color: #b3f0ff;
   }
  </style>
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
      if (isset($_GET['CategoryID'])) {
      $CategoryID = $_GET['CategoryID'];
      $sql1 = "SELECT * FROM product WHERE procduct_type = '$CategoryID'";
      $rst1 = querySQL($sql1);
      $sql2 = "SELECT * FROM category WHERE category_id = '$CategoryID'";
      $rst2 = querySQL($sql2);
      $cln = mysqli_fetch_array($rst2);
      $class_name = $cln[0];
      while ($std = mysqli_fetch_array($rst1)) { ?>
        <div class="std_detail">
          <div class="std_image">
            <a href="product_detail.php?ProductID=<?= $std['product_id'] ?>">
            <img src='admin\images\product\<?= $std['product_image']?>' width="150" height="150"> 
            </a>
          </div> <br>
          <div class="std_info"> 
            <?= $std['product_name'] ?> <br> <br>
          </div>
          <div class="std_price">
            <?= $std['price'] ?>
          </div>
          <div class="std_buy">
            <a href='order_product.php?ProductID=<?= $std['product_id']?>'>Buy</a>
          </div>      
        </div>
      <?php } } 

      ?>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Xuan Doan @171099
    </div>
  </div>
</body>
</html>

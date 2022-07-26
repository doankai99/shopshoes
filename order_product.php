<!DOCTYPE HTML>
<html>
<style type="text/css">
  h1{
    text-align: center;
  }
</style>
<head>
  <title>XD</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/css_buyproduct.css?version=3" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="index.php">🅽🆇🅳</a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="admin\index.php">Admin</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="content">
      <?php
      include_once ('admin/functions.php');
      if (isset($_GET['ProductID'])) {
      $ProductID = $_GET['ProductID'];
      $sql1 = "SELECT * FROM product WHERE product_id = '$ProductID'";
      $rst1 = querySQL($sql1);
      while ($std = mysqli_fetch_array($rst1)) { ?>
      <fieldset>
      <form class="frm" action="cart.php?userID=<?= $std['user_id']?>" method="POST">
        <table>
          <tr>
            <td width = '70%px' align="center">
        <div class="std_detail1">
          <div class="std_info1">
            <img src='admin\images\product\<?= $std['product_image']?>' width="300" height="350"><br>
            Name: <?= $std['product_name'] ?><br>
            Price: <?= $std['price'] ?><br>
            <?php
            $scategory = $std['procduct_type'];
            $sql2 = "SELECT category_name FROM category WHERE category_id = '$scategory'";
            $rst2 = querySQL($sql2);
            $Category = mysqli_fetch_array($rst2); ?>
            Category: <?= $Category[0] ?><br>
          </div>     
        </div>
            </td>
            <td align="center" width = '30%px' style="background-color: white;">
        <!-- <form class="frm" action="cart.php?userID=<?= $std['user_id']?>" method="POST"> -->
              <legend><h3>Enter information</h3></legend><br>
              <table>
              <tr>
              <td>Name</td> 
              <td><input type="text" name="name" required maxlength="30"></td>
              </tr>
              <tr>
              <td>Address</td> 
              <td><input type="text" name="address"><br></td>
              </tr>
              <tr>
              <td>Email</td> 
              <td><input type="email" name="email"></td>
              </tr>
              <tr>
              <td>Phone</td>
              <td><input type="phone" name="phone" required maxlength="10" aria-grabbed="true"></td>
              </tr>
              <tr>
              <td>
                Click to buy product =>
              </td>
              <td>
              <input type="submit" value="BUY PRODUCT" name="order">
              </td>
              </tr>
            </table>
          </form>
            </td>
          </tr>
          </table>
        </fieldset>
      <?php } 
      } 
      ?>
  <div id="content_footer"></div>
    <div id="footer">
      Xuan Doan @171099
    </div>
</body>
</html>
<!DOCTYPE HTML>
<html>
    <head></head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="css/home.css?version=3" title="style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body>
        <div class="Container">
            <div class="header">
            <div class="row">
                    <div class="col-md-4">
                    <div class="logo">
                    </div>
                    </div>
                    <div class="Col-md-4">
                        <a href="index.php">🅽🆇🅳</a>
                    </div>
                    <div class="Col-md-4">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li><a href="admin\index.php">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p align= "Center">Hello Hello</p><br>
                    <p align= "center">Don't miss out on this amazing offer!<br>Enjoy 20% off all home decor items with promo <br>code #Easter20 only for 72 hours.</p>
                </div>
                <div class="col-md-3"><p>1</p><br>2</div>
            </div>
            <div class="main">
            <div class="row">
                <div class="col-md-2">
                    <div id="site_content">
                        <div class="sidebar">
                            <h3>Product Type</h3>
                            <ul>
                                <?php
                                include_once ('admin/functions.php');
                                $sql = "SELECT * FROM category";
                                $result = querySQL($sql);
                                while ($cls = mysqli_fetch_array($result)) { ?>
                                <li><a href="category_detail.php?CategoryID=<?= $cls['category_id'] ?>"><?= $cls['category_name'] ?></a><i></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                        <div class="col-md-8">
                            <div id="content">
                    <?php
                    $rst1 = querySQL("SELECT * FROM product");
                    while ($std = mysqli_fetch_array($rst1)) { ?>
                                <div class="std_detail">
                                    <div class="std_image">
                                        <a href="product_detail.php?ProductID=<?= $std['product_id'] ?>">
                                        <img src='admin\images\product\<?= $std['product_image']?>' width="150" height="150"> 
                                        </a>
                                    </div> <br>
                                    <div class="std_info"> 
                                        <?= $std['product_name'] ?> 
                                    </div>
                                    <div class="std_price">
                                        <?= $std['price'] ?>
                                    </div>
                                    <div class="std_buy">
                                        <a href='order_product.php?ProductID=<?= $std['product_id']?>'>Buy</a>
                                    </div>     
                                </div>
                            
                        <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <p>1<br>2<br>3<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <h4><strong>Your Store</strong></h4>
                <ul>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul> 
            </div>
            <div class="col-md-6">
            <h4>OUR ADDRESS</h4>
                <p>To 10. Phuong Dong Mai Quan Ha Dong tp Ha Noi</p>
            </div>
        </div>
        <div class="footer" align = "center">
            <p>If you have questions regarding your Data, please visit our Privacy Policy </p><br>
            <p>Want to change how you receive these emails? You can update your preferences or unsubscribe from <br> this list.© 2022 Your Brand. All Rights Reserved.</p>
        </div>
        </div>
    </body>
</html>
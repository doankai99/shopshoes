<!DOCTYPE HTML>
<html>
    <head></head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="css/home.css?version3" title="style" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <body>
        <div class="Container">
            <div class="header">
                <div class="row">
                    <div class="col-md-4">
                    <div id="logo">
                    </div></div>
                    <div class="Col-md-8">
                        <h1><a href="index.php">🅽🆇🅳</a></h1>
                    </div>
                    </div>
                    <div class="row">
                        <div class="menubar">
                        <ul>
                            <li><a href="">Quần Áo</a></li>
                            <li><a href="">Giầy dép</a></li>
                            <li><a href="">Túi Xách</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="index.php">home</a></li>
                            <li><a href="admin\index.php">Login</a></li>
                        </ul>
                        </div>
                        <div class="bia2">
                            <img src="css/image/bia2.png" width="1490px" height="400px">
                        </div>
                </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
            </div>
            <div class="row" style="background-image: linear-gradient(to right,#f2f6f6, #f4e6a6); width : 1490px">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <p align= "Center">Hello Hello</p><br>
                    <p align= "center">Don't miss out on this amazing offer!<br>Enjoy 20% off all home decor items with promo <br>code #Easter20 only for 72 hours.</p>
                </div>
                <div class="col-md-3"><p></p><br></div>
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
                    </div>
                </div>
            </div>
        </div>
        <div id = "info">
            <div class="info1">
            <h4><strong>Your Store</strong></h4>
                <ul>
                    <li><a href="https://www.facebook.com/profile.php?id=100052587250831"><box-icon type='logo' name='facebook-square'></box-icon></a></li>
                    <li><a href="#"><box-icon name='instagram-alt' type='logo' ></box-icon></a></li>
                    <li><a href="#"><box-icon name='envelope' type='solid' ></box-icon></a></li>
                    <li><a href="#"><box-icon name='yahoo' type='logo' ></box-icon></a></li>
                </ul> 
            </div>
            <div class="info2">
            <h4>OUR ADDRESS</h4>
                <p>To 10. Phuong Dong Mai Quan Ha Dong tp Ha Noi</p><br>
            </div>
            </div>
        </div>
        <div class="footer">
            <p>If you have questions regarding your Data, please visit our Privacy Policy </p><br>
            <p>Want to change how you receive these emails? You can update your preferences or unsubscribe from <br> this list.© 2022 Your Brand. All Rights Reserved.</p>
        </div>
        </div>
    </body>
</html>
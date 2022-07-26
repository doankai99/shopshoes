<?php
require_once 'header.php';
$id = $_POST['id'];
$qry = "DELETE FROM product WHERE product_id = '$id'";
$result = querySQL($qry);
if ($result) { ?>
 <script>
     alert ("Delete product successfully !");
     window.location.href = "manage_product.php";
 </script>
<?php } else { ?> 
  <script>
    alert ("Delete product failed !");
    window.location.href = "manage_product.php";
</script>
<?php } ?>
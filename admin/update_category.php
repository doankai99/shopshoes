
<?php
require_once 'header.php';

$id = $_POST['id'];
if (isset($_POST['update'])) {
$name = $_POST['name'];
$sql = "UPDATE category SET category_name = '$name' WHERE category_id = '$id'";
$run = querySQL($sql);
if ($run) { ?>
   <script type="text/javascript">
		alert ("Update Category successfully !");
		window.location.href = "manage_category.php";
   </script>
<?php 
} else { ?>
  <script type="text/javascript">
		alert ("Update Category failed !");
		window.location.href = "manage_category.php";
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
    footer{
    	margin-top: 350px;
    	height: 100px;
    	color: red;
    	text-align: center;
    }
</style>

<body>
<center>
<form class="frm1" action="" method="POST">
	
	<legend>Update Category</legend>
	<h4>Category name</h4>
	<?php
	$qry = "SELECT * FROM category WHERE category_id = '$id'";
	$result = querySQL($qry);
	$cls = mysqli_fetch_array($result);
	?>
	<input type="hidden" name="id" value="<?= $cls[0] ?>">
	<input type="text" name="name" value="<?= $cls[1] ?>" size="30"> <br><br>
	<input type="submit" name="update" value="Update">
  
</form>
</center>
<footer>
<h2>Xuan Doan</h2>
<h2>Nguyen Xuan Doan</h2>
</footer>
</body>
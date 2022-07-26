
<?php
require_once 'header.php';

$qry = "SELECT * FROM product";
if (isset($_POST['search'])) {
	$keyword = $_POST['keyword'];
	$qry .= " WHERE product_name LIKE '%$keyword%' 
	          OR price LIKE '%$keyword%'"; 
    $result = querySQL($qry);
   //không tìm thấy kết quả  
   if ($result->num_rows == 0) {  ?>
   <script>
	 alert("Product not found");
	 window.location.href = "";
   </script> 
   <?php } 
}
$result = querySQL($qry);
?>
<style type="text/css">
	body{
		background-image: url(images/background1.png);
	}
	.tbl{
		width: 100%;
		font-size: 20px;
	}
	.tbl tr th {
		background-color: yellow;
	}
	.frms {
    width: 250px;
    background-image: linear-gradient(to right, #f8f6f9, #0e0f11);
    border: #0e0f11;
    margin-top: 20px;
	border-radius: 5px;
    }
	.frms input[type="text"]{
		margin-top: 5px;
		border-radius: 10px;
		background-color: white;
		width: 150px;
		height: 30px;
		transition: 0.25s;
		text-align: center;
	}
	.frms input[type = "submit"]{
		border-radius: 5px;
		width: 80px;
		height: 30px;
		font-family: cursive;
		color: #0e0f11;
	}
</style>
<body>
<center>
<form class= "frms" action="" method="POST">
		<legend> Search Product </legend>
		<input type="text" name="keyword" required maxlength="15"
	  	placeholder="Input name or price"> <br> <br>
		<input type="submit" value="Search" name="search">
</form>
<br><br>
<table class="tbl" border="1">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Price</th>
		<th>Category</th>
		<th>Image</th>
		<th>Options</th>
	</tr>
		<?php 
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?= $row[2] ?></td>
			<?php
			//Hiển thị class name thay vì class id
			$qry1 = "SELECT * FROM category";
			$result1 = querySQL($qry1);
			while ($row1 = mysqli_fetch_array($result1)) {
				if ($row1["category_id"] == $row["procduct_type"]) {
					$category = $row1["category_name"];
				}
			}
			?>
			<td><?= $category ?></td>
			</td>
			<td> 
			<img src='images\product\<?= $row['product_image'] ?>' width="200" height="150"></td>
		    </td>
			<td> 
				<form class="frm_inline" action="update_product.php" method="POST">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Update">
			    </form>
				<form class="frm_inline" action="delete_product.php" method="POST"
				 onsubmit="return confirmDelete();">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Delete">
			    </form>
			</td>
		</tr>
		<?php } ?>
</table>
</center>
<script>
	function confirmDelete() {
		var del = confirm("Do you want to delete this product ?");
		if (del)
			return true;
		else
			return false;
	}
</script>
</body>
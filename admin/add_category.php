<?php
require_once 'header.php';
$host="localhost";
$user="root";
$password="";
$db="shoes";
if (isset($_POST['add'])) {
$name = $_POST['name'];
$sql = "INSERT INTO category (category_name) VALUES ('$name')";
$run = querySQL($sql);
if ($run) { ?>
  <script>
      alert("Add Category successfully !");
      window.location.href = "manage_category.php";
  </script>
<?php } else { ?>
   <script>
       alert("Add category failed !");
       window.location.href = "manage_category.php";
   </script>
<?php } } ?>
<style type="text/css">
  body{
    background-image: url(images/download.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
  }
</style>
<body>
<center>
    <form class="frm" action="add_category.php" method="POST">
        <fieldset>
            <legend><h3>Add Category</h3></legend><br>
        <h4>Category Name</h4>
        <input type="text" name="name" required maxlength="30"> 
        <br><br>
        <input type="submit" value="Add" name="add">
        </fieldset>
    </form>
</center>
<footer>
</footer>
</body>
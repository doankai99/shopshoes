<?php
require_once 'functions.php';
//start 1 session mới 
session_start();

//hàm isset dùng để kiểm tra xem biến đã khởi tạo chưa
if (isset($_POST['username'])) {
//tạo 2 biến $username & $password để nhận thông tin từ form login
$username = $_POST['username'];
$password = $_POST['password'];
$token = encryptPassword($password);
//$password = md5($password); //mã hóa ký tự nhập vào bằng MD5
//tạo query để truy vấn bảng user
$qry = "SELECT * FROM user WHERE username = '$username' AND password = '$token'";
/* hiển thị kết quả truy vấn
tạo biến result để lưu kết quả truy vấn
gọi hàm querySQL từ file functions.php */
$result = querySQL($qry);
/* $row dùng để lưu kết quả truy vấn vào array (nếu có)
Lưu ý: mysqli_fetch_array là cú pháp */
$row = mysqli_fetch_array($result);
if (is_array($row)) {  
//khởi tạo 2 biến session cho username & password
$_SESSION['username'] = $username; 
} else { ?>
   <script type="text/javascript">
   	  alert("Login failed !");
   	  window.location.href = "index.php"
   </script>
<?php } } 
//check nếu người dùng đã login thì sẽ direct thẳng vào trang home
if (isset($_SESSION['username'])) {
   header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
		background-image: url(images/background1.png);
		background-repeat: no-repeat;
		background-size: 100%;
	}
</style>
<head>
	<title>Shoes Shop</title>
	<link rel="stylesheet" type="text/css" href="css/css_admin.css?version=1">
</head>
<body>
<center>
	<form class="frm" action="" method="POST">
		<h1>Login</h1>
		<h4 align="center">Account</h4>
		<input type="text" name="username" placeholder="Username" required=""> <br> <br>
		<h4 align="center">Password</h4> 
		<input type="password" name="password" placeholder="Password" required=""> <br> <br>
		<input type="submit" id="inp_login" value="Login">
	</form>
</center>
</body>
</html>
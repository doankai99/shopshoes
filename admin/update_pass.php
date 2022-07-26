<?php
require_once 'header.php';
$id = $_POST['id'];
if (isset($_POST['change'])) {
    $pass = $_POST['pass'];
    $retype = $_POST['retype'];
    if ($pass != $retype) {?> 
        <script>
            alert("Password & retype password don't match");
            window.location.href = "update_pass.php";
        </script>
    <?php } 
    else {
    $token = encryptPassword($pass); // mã hóa pass trước khi lưu vào DB
    $sql = "UPDATE user SET password = '$token' WHERE user_id = '$id'";
    $run = querySQL ($sql);
    if ($run) 
    { 
        ?>
        <script type="text/javascript">
		alert ("Update password successfully !");
		window.location.href = "manage_user.php";
   </script>
    <?php }
    }
}
?>
<style type="text/css">
    body{
        background-image: url(images/download.jpg);
    }
</style>
<body>
<center>
    <form class="frm" action="update_pass.php" method="POST">
        <legend><h2 style="color: red">Change password</h2></legend>
    <h4>Password<h4>
     <input type="password" name="pass" required> <br><br>
    <h4>Retype</h4>
     <input type="password" name="retype" required> <br><br>
    <input type="hidden" name="id" value='<?= $id ?>'>
    <input type="submit" value="Change" name="change">
    </form>
</center>
<footer><img src=""></footer>
</body>




<?php
require_once 'header.php';
$sql = "SELECT * FROM category";
$result = querySQL($sql);
?>
<style type="text/css">
    body{
        background-image: url(images/download.jpg);
    }
    .tbl{
        margin-top: 150px;
        overflow: auto;
    }
    .frt1{
    margin-top: 300px;
    text-align: center;
    color: red;
    }
</style>
<body>
<center>
<table class='tbl' border=1>
    <tr>
        <th> Category ID </th>
        <th> Category Name </th>
        <th> Options </th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    $id = $row['category_id']; //$row[0] (cột 1)
    $name = $row['category_name']; //$row[1] (cột 2) ?>
    <tr>
        <td> <?= $id ?> </td>
        <td> <?= $name ?> </td>
        <td> 
            <form class='frm_inline' action="update_category.php" method="POST">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Update'>
            </form>
            <form class='frm_inline' action='delete_category.php' method="POST" onsubmit="return confirmDelete();">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Delete'>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
</center>
<script>
    function confirmDelele() {
        var del = confirm("Do you want to delete this Category ?");
        if (del)
            return true;
        else
            return false;
    }
</script>
<footer>
    <div class="frt1">Xuan Doan</div>
</footer>
</body>
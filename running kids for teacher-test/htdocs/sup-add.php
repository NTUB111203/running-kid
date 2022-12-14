<?php
require_once("DataBase.php");

$sup_name = $_POST['sup_name'];
$sup_tel = $_POST['sup_tel'];

$sql = "INSERT INTO  gift_supplier(sup_name,sup_tel)VALUES('$sup_name','$sup_tel')";

if (mysqli_query($link, $sql)) {
    echo "新增成功!!";
} else {
    echo "新增失敗" . mysqli_error($link);
}

//新增成功

    header("Location: supplier.php");?>

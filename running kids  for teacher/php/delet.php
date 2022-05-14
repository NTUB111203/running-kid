<?php
include "db_connect.php";
$id = $_GET['id'];

$sql = "DELETE FROM `product` WHERE `pId` ='".$id."'";
$result = filterTable($sql);

echo "<script>";
echo "alert('成功刪除'); location.href='../user2.php'";
echo "</script>";
?>
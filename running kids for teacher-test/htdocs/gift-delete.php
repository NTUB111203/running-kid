<?php
require_once("DataBase.php");
 DELETE FROM customers WHERE Name='王二';
    $sql = "DELETE INTO gift_supplier(sup_name,sup_tel) VALUES ($sup_name,$sup_tel)";
    mysqli_query($link,$sql);
    $sql = "Select sup_no from  gift_supplier where sup_name=".$_POST['sup_name'];
    $check_sup = mysqli_query($link,$sql);
    $sup_no = mysqli_fetch_assoc($check_sup)["sup_no"][0];

if(mysqli_query($link,$sql)){
    header("Location: gift.php");
}

?>

<?php
require_once("DataBase.php");
$sup_name = $_POST['sup_name'];
$sup_tel = $_POST['sup_tel'];
$gift = $_POST['gift'];
$exchange_points = intval($_POST['exchange_points']);
$gift_description = $_POST['gift_description'];
$sql = "Select sup_no from  gift_supplier where sup_name=".$_POST['sup_name'];
$check_sup = mysqli_query($link,$sql);
$result_num=mysqli_num_rows($check_sup);
if($check_sup && $result_num>0){
    $sup_no = mysqli_fetch_assoc($check_sup)["sup_no"][0];
}else{
    $sql = "INSERT INTO gift_supplier(sup_name,sup_tel) VALUES ($sup_name,$sup_tel)";
    mysqli_query($link,$sql);
    $sql = "Select sup_no from  gift_supplier where sup_name=".$_POST['sup_name'];
    $check_sup = mysqli_query($link,$sql);
    $sup_no = mysqli_fetch_assoc($check_sup)["sup_no"][0];
}
$sql = "INSERT INTO gift(gift,exchange_points,gift_sup_no,gift_description) VALUES ('$gift',$exchange_points,$sup_no,'$gift_description')";
//$sql = "INSERT INTO gift_supplier(sup_name,sup_tel) VALUES ('$sup_name','$sup_tel')";

if(mysqli_query($link,$sql)){
    header("Location: gift.php");
}

?>

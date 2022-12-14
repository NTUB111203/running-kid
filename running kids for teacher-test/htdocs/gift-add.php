<?php
require_once("DataBase.php");
$gift = $_POST['gift']; //禮物名稱
$exchange_points = intval($_POST['exchange_points']); //禮物積分
$gift_description = $_POST['gift_description']; //禮物描述
$sup_name = $_POST['sup_name'];  //禮品供應商
$sup_no = $_POST['sup_no'];
//$sup_tel = $_POST['sup_tel'];  //供應商電話
 $sql = "SELECT sup_no from  gift_supplier where sup_name='$sup_name'";

//     $sql = "INSERT INTO gift_supplier(sup_name) VALUES ('$sup_name')";
//     mysqli_query($link,$sql);
//     $sql = "Select sup_no from  gift_supplier where sup_name='$sup_name'";
//     $check_sup = mysqli_query($link,$sql);
//     $sup_no = mysqli_fetch_assoc($check_sup)["sup_no"];
    // echo $sup_no;
$sql = "INSERT INTO gift(gift,exchange_points,gift_sup_no,gift_description) VALUES ('$gift',$exchange_points,$sup_no,'$gift_description')";


//新增成功
if(mysqli_query($link,$sql)){
    header("Location: gift.php");
}

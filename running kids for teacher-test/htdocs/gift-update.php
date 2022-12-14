<?php
session_start();
/*連接資料庫*/
require_once('DataBase.php');

$gift_no = $_SESSION['gift_no'];
$gift =  $_POST["gift"];
$exchange_points = $_POST["exchange_points"];
$gift_description = $_POST["gift_description"];
// $sup_name = $_POST["sup_name"];
$sup_no = $_POST["sup_no"];
//$class_no = $_POST['class_no'];

$sql = "UPDATE  gift LEFT JOIN gift_supplier ON gift.gift_sup_no = gift_supplier.sup_no
SET   `gift` = '$gift',`exchange_points` = '$exchange_points',`gift_description` = '$gift_description',`sup_no` = '$sup_no'
WHERE gift_no = '$gift_no'";

// $sql = "UPDATE `gift` SET `grade`='$grade' ,`class`='$class'  
//         WHERE `class_no` = '" . $class_no . "'";


// if (!$result) {
//     die($link->error);
// }


if (mysqli_query($link, $sql)) {
    function_alert("禮品編輯成功!");
    // header('Location: gift.php');
} else {
    function_alert("編輯失敗！");
}


// if (!$result) {
//     die($link->error);
// }

// 如果編輯成功
// header('Location: gift.php');

// Close connection
mysqli_close($link);

function function_alert($message)
{

    echo "<script>alert('$message');
    window.location.replace('gift.php'); 
    </script>";
    return false;
}

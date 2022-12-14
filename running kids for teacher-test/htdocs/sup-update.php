<?php
session_start();
/*連接資料庫*/
require_once('DataBase.php');

// $sup_no = $_GET['sup_no'];
$sup_no = $_SESSION['sup_no'];
$sup_name = $_POST['sup_name'];
$sup_tel = $_POST['sup_tel'];

//$class_no = $_POST['class_no'];


$sql = "UPDATE `gift_supplier` SET `sup_name`='$sup_name' ,`sup_tel`='$sup_tel'  
        WHERE `sup_no` = '" . $sup_no . "'";
echo $sql;


// if (!$result) {
//     die($link->error);
// }


if (mysqli_query($link, $sql)) {
    function_alert("編輯成功!");
} else {
    function_alert("編輯失敗！");
}
// if (!$result) {
//     die($link->error);
// }

// 如果編輯成功
header('Location: supplier.php');

// Close connection
mysqli_close($link);

function function_alert($message)
{

    echo "<script>alert('$message');
    window.history.back(); 
    </script>";
    return false;
}

<?php
session_start();
/*連接資料庫*/
require_once('DataBase.php');

$class_no = $_SESSION['class_no'];
$grade = $_POST['grade'];
$class = $_POST['class'];

//$class_no = $_POST['class_no'];



$sql = "UPDATE `class` SET `grade`='$grade' ,`class`='$class'  
        WHERE `class_no` = '" . $class_no . "'";

echo $sql;


// if (!$result) {
//     die($link->error);
// }


if (mysqli_query($link, $sql)) {
    function_alert("班級編輯成功!");
} else {
    function_alert("編輯失敗！");
}


// if (!$result) {
//     die($link->error);
// }

// 如果編輯成功
header('Location: class-maintain.php');

// Close connection
mysqli_close($link);

function function_alert($message)
{

    echo "<script>alert('$message');
    //window.history.back(); 
    </script>";
    return false;
}

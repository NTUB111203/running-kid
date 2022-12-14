<?php
session_start();
/*連接資料庫*/
require_once('DataBase.php');

// $class_no = $_SESSION['class_no'];
// $m_id = $_GET['m_id']; 
$m_id = $_POST['m_id'];
$m_name = $_POST['m_name'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];

$sql = "UPDATE `members` SET `m_id`='$m_id' ,`m_name`='$m_name', `gender`='$gender',`birthday`='$birthday'
        WHERE `m_id` = '" . $m_id . "'";


// if (!$result) {
//     die($link->error);
// }


if (mysqli_query($link, $sql)) {
    function_alert("學生資料編輯成功!");
} else {
    function_alert("編輯失敗！");
}


// if (!$result) {
//     die($link->error);
// }

// // 如果編輯成功
header('Location:student-view.php');

// Close connection
mysqli_close($link);

function function_alert($message)
{

    echo "<script>alert('$message');
    //window.history.back(); 
    </script>";
    return false;
}

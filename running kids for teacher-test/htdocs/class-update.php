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
// $sql = "UPDATE `class` SET `grade`='" . $_POST['grade'] . "' ,`class`='" . $_POST['class'] . "'  
// WHERE `class_no` = '" . $_GET['$class_no'] . "'";
echo $sql;
// $result = filterTable($sql);
// mysqli_query($link, $sql);
// $result = "SELECT * FROM class";
// $retval = mysqli_query($link, $result);
// if ($retval) {
//     $num = mysqli_num_rows($retval);

//     if (mysqli_num_rows($retval) > 0) {
//         while ($row = mysqli_fetch_assoc($retval)) {
//             //$class_no = $_GET['class_no'];
//             //echo $class_no;
//             $sql = "UPDATE `class` SET `grade`='$grade' ,`class`='$class'  
//             WHERE `class_no` = '" . $_GET['class_no'] . "'";
//             $result = $link->query($sql);
//             echo $result;
//         }
//     }
// }

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

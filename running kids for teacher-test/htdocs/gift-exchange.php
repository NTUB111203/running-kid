<?php
session_start();
/*連接資料庫*/
require_once('DataBase.php');

if (isset($_POST['buttonSave'])) {
    $serial_no = $_POST['serial_no'];

    // function debug_to_console($data)
    // {
    //     $output = $data;
    //     if (is_array($output))
    //         $output = implode(',', $output);

    //     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    // }

    foreach ($serial_no as $item) {
        // debug_to_console($item);
        $sql = "UPDATE `student_exchange` SET `exchange_status`='已兌換' 
        WHERE `serial_no` = '" . $item . "'";

        mysqli_query($link, $sql);
    }
}

//$serial_no = $_POST['serial_no'];
//$exchange_status = $_POST['exchange_status'];
// $class = $_POST['class'];

//$class_no = $_POST['class_no'];

// $result = filterTable($sql);
// mysqli_query($link, $sql);
// // $result = "SELECT * FROM class";
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


// if (mysqli_query($link, $sql)) {
//     function_alert("兌換成功!");
// } else {
//     function_alert("兌換失敗！");
// }


// if (!$result) {
//     die($link->error);
// }

// 如果兌換成功
header('Location:gift-off-check.php');

// Close connection
mysqli_close($link);

function function_alert($message)
{

    echo "<script>alert('$message');
   
    </script>";
    return false;
}

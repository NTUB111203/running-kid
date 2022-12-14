<?php
session_start();
/*連接資料庫*/
require_once('DataBase.php');

//$m_id= $_POST['m_id'];


if (isset($_POST['buttonSave'])) {

    $m_id = $_POST['m_id'];

    function debug_to_console($data)
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }

    foreach ($m_id as $item) {
        debug_to_console($item);
        $class_no = $_POST['class_no'];
        $sql = "UPDATE `members` SET `class_no`='$class_no' 
        WHERE `m_id` = '" . $item . "'";

        mysqli_query($link, $sql);
    }
}

// if (!$result) {
//     die($link->error);
// }
if (mysqli_query($link, $sql)) {
    function_alert("換班成功!");
} else {
    function_alert("換班失敗！");
}

// 如果成功
header('Location:student-maintain.php');

// Close connection
mysqli_close($link);


function function_alert($message) { 
      
    // Display the alert box  window.location.href='index.php';
    echo "<script>alert('$message');
    
    </script>"; 
    return false;
}

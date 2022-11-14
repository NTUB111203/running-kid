<?php
/*連接資料庫*/
require_once('DataBase.php');


$result = "SELECT * FROM class";
$retval = mysqli_query($link, $result);
if ($retval) {
    $num = mysqli_num_rows($retval);

    if (mysqli_num_rows($retval) > 0) {
        while ($row = mysqli_fetch_assoc($retval)) {
            $class_no = $_GET['class_no'];
            //echo $class_no;
            $sql = "DELETE FROM class where class_no ='$class_no'";
            $result = $link->query($sql);
        }
    }

    if (mysqli_query($link, $sql)) {
        function_alert("班級刪除成功!");
    } else {
        function_alert("有人隸屬該班級，故無法直接刪除！");
    }
}

if (!$result) {
    die($link->error);
}

// 如果刪除成功
header('Location: class-maintain.php');

// Close connection
mysqli_close($link);

function function_alert($message)
{

    echo "<script>alert('$message');
    window.history.back(); 
    </script>";
    return false;
}

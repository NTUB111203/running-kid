<?php
/*連接資料庫*/
require_once('DataBase.php');


$result = "SELECT * FROM gift_supplier";
$retval = mysqli_query($link, $result);
if ($retval) {
    $num = mysqli_num_rows($retval);

    if (mysqli_num_rows($retval) > 0) {
        while ($row = mysqli_fetch_assoc($retval)) {
            $sup_no = $_GET['sup_no'];
            //echo $class_no;
            $sql = "DELETE FROM gift_supplier where sup_no ='$sup_no'";
            echo $sql;
            $result = $link->query($sql);
        }
    }
}

if (!$result) {
    die($link->error);
}

if ($link->affected_rows >= 1) {
    echo '刪除成功';
} else {
    echo '查無資料';
}
// 如果刪除成功
header('Location: supplier.php');

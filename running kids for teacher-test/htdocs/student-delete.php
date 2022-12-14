<?php
/*連接資料庫*/
require_once 'DataBase.php';


$result = "SELECT * FROM members";
$retval = mysqli_query($link, $result);
if ($retval) {
    $num = mysqli_num_rows($retval);

    if (mysqli_num_rows($retval) > 0) {
        while ($row = mysqli_fetch_assoc($retval)) {
            //$class_no = $_GET['class_no'];
            $m_id = $_GET['m_id'];
            $sql = "DELETE FROM members where m_id = '$m_id'";
            echo $sql;
            $result = $link->query($sql);
        }
    }
}


// if (!$result) {
//     die($link->error);
// }

if ($link->affected_rows >= 1) {
    echo '刪除成功';
} else {
    echo '查無資料';
}
// 如果刪除成功
header('Location: student-view.php');

<?php
require_once("DataBase.php");


$result = "SELECT * FROM gift ";
$retval = mysqli_query($link, $result);
if ($retval) {
  $num = mysqli_num_rows($retval);

  if (mysqli_num_rows($retval) > 0) {
    while ($row = mysqli_fetch_assoc($retval)) {
      $gift_no = $_GET['gift_no'];
      // echo $gift_no . '<br>';
      // $sql = "DELETE FROM gift where gift_no = " . $row['gift_no'] . "";
      $sql = "DELETE FROM gift where gift_no = " . $gift_no . "";
      echo $sql;
      $result = $link->query($sql);
    }
  }
}
// echo $sql;

if (!$result) {
  die($link->error);
}

if ($link->affected_rows >= 1) {
  echo '刪除成功';
} else {
  echo '查無資料';
}
// 如果刪除成功
header('Location: gift.php');

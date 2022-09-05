<?php
  $name = $_POST['na'];
  $area = $_POST['area'];
  $day = $_POST['day'];
  $day2 = $_POST['day2'];
  $day3 = $_POST['day3'];
  $pname = $_POST['pname'];
  $kind = $_POST['kind']; 

include "DataBase.php";
 $sql1 = "INSERT INTO resume(`name`,`area`,`day`,`day2`,`day3`,`pname`,`kind`)
 VALUES('$name','$area','$day','$day2','$day3','$pname','$kind')";
 $result = filterTable($sql1);   


 echo "<script>";
 echo "alert('成功新增'); location.href='../resume.php'";
 echo "</script>";



?>
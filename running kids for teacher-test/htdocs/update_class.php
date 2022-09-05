<?php

 echo $_POST['semester'];
 echo $_POST['grade'];
 echo $_POST['class'];


 include "DataBase.php";


 $sql = "UPDATE `class` SET `pName`='".$_POST['name']."'  ,`semester`='".$_POST[semester]."'  ,`grade`='".$_POST[grade]."'  ,`class`='".$_POST[class]."'
  ,WHERE `pId` = '".$_POST['id']."'";
 echo $sql;
 $result = filterTable($sql);   


 echo "<script>";
 echo "alert('成功編輯'); location.href='../class-add.php'";
 echo "</script>";
 


?>
<?php
 include "DataBase.php";

session_start();

$schoolid= $_POST['username'];

$passtr=$_POST['password'];

$query = "SELECT * FROM `classtable` Where `id` ='" . $schoolid . "'";
$result = filterTable($query);
$row = mysqli_fetch_array($result);

if ($row){
     if($row['password']==$passtr)
     {
         $_SESSION['username'] = $schoolid;
         header('location:../class.php');
     }else{
        echo "<script>";
        echo "alert('密碼錯誤'); location.href='../index.php'";
        echo "</script>";
     }
}else{
    echo "<script>";
    echo "alert('無此帳號'); location.href='../index.php'";
    echo "</script>"; 
  }
  

?>
  

           
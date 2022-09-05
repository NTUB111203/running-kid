<?php
session_start();

$host = "140.131.114.154:3306";
$user = "emily";
$pd = "@Tfboys806@";
$dbname = "runningkids";
$link = mysqli_connect($host,$user,$pd,$dbname);
if($link){
    echo "";//測試是否連線成功-->"success"
}else{
    echo 'failed<br/>'.mysqli_connext_error();
}


?>
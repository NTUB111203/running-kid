<?php
session_start();

$host = "localhost:3307";
$user = "root";
$pd = "0413";
$dbname = "runningkids";
$link = mysqli_connect($host,$user,$pd,$dbname);
if($link){
    echo "sucess";
}else{
    echo 'failed<br/>'.mysqli_connext_error();
}

//use Medoo\Medoo;

// function DB() {
//     $hostname = 'localhost:3307';
//     $username = 'root';
//     $password = '0413';
//     $db_name = 'runningkids';

//     try {
//         $db = new PDO("mysql:host=" . $hostname . ";dbname=" . $db_name, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//         //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
//         //echo '連線成功';
//         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
//         $db->query("set names utf8mb4");
//         return $db;
//         //$db = null; 
//         //結束與資料庫連線
//     } catch (PDOException $e) {
//         //error message
//         echo $e->getMessage();
//     }
// }
?>
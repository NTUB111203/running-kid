<?php
require_once("DataBase.php");
session_start();
$m_name = $_SESSION["m_name"];
$sch_no = $_SESSION["sch_no"];
$class_no = $_SESSION["class_no"];

$gift = $_POST['gift']; //禮物名稱
$exchange_points = intval($_POST['exchange_points']); //禮物積分
$gift_description = $_POST['gift_description']; //禮物描述
$sup_name = $_POST['sup_name'];  //禮品供應商
$sup_no = $_POST['sup_no'];
//$sup_tel = $_POST['sup_tel'];  //供應商電話
$sql = "SELECT sup_no from  gift_supplier where sup_name='$sup_name'";

/************* 上傳圖片 ***************/
    // $file_name = iconv('utf-8','big5', $_FILES["file"]["name"]);
    // if($_FILES['file']['error']>0){
    //     echo "檔案上傳失敗<br />";
    //     echo "Error: " . $_FILES["file"]["error"];
    // }else if(file_exists("file/".$file_name)){
    //     echo "檔案已存在，請勿重複上傳相同檔案";
    //     }else{
    //         move_uploaded_file($_FILES['file']['tmp_name'], 'file/'.$file_name);
    //         echo "檔案連結：".'<a href="file/'.$_FILES['file']['name'].'">'.$_FILES["file"]["name"].'</a>';
    //         echo "<br />";
    //         echo "副檔名：".pathinfo('file/'.$_FILES['file']['name'], PATHINFO_EXTENSION)."<br />";
    //         echo "類型：".$_FILES['file']['type']."<br />";
    //         echo "大小：".iconv('utf-8','big5',(round($_FILES['file']['size']/1024,2)))."KB<br />";
    // }


// $sql = "INSERT INTO gift_supplier(sup_name) VALUES ('$sup_name')";
// mysqli_query($link,$sql);
// $sql = "Select sup_no from gift_supplier where sup_name='$sup_name'";
// $check_sup = mysqli_query($link,$sql);
// $sup_no = mysqli_fetch_assoc($check_sup)["sup_no"];
// echo $sup_no;
$sql = "INSERT INTO gift(gift,exchange_points,gift_sup_no,gift_description,sch_no,gift_photo) VALUES ('$gift',$exchange_points,$sup_no,'$gift_description','$sch_no','https://gcdnb.pbrd.co/images/j12DHEdarck7.jpg?o=1')";


//新增成功
if (mysqli_query($link, $sql)) {
    header("Location: gift.php");
}

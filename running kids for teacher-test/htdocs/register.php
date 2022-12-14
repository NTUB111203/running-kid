<?php
include_once("DataBase.php");
// echo $_POST['sch_no'];
$sch_no = $_POST['school'];
$m_name = $_POST['name'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : 'F';
// $gender = $_POST['gender'];
$identity = isset($_POST['identity']) ? $_POST['identity'] : 'T';
// $identity = $_POST['identity'];
//$phone = $_POST['phone'];
$mail = $_POST['mail'];
//$birthday = $_POST['bir'];
$m_id = $_POST['id'];
$password = $_POST['password'];
//$class = $_POST["class"];
//$class_no = $_POST["class"];

$sql = "INSERT INTO members(sch_no,identity,m_name,mail,m_id,password,class_no) 
        VALUES ('$sch_no','$identity','$m_name','$mail','$m_id','$password','$class_no')";

echo $sql;

if (mysqli_query($link, $sql)) {
    echo "註冊成功!!";
} else {
    echo "註冊失敗" . mysqli_error($link);
}

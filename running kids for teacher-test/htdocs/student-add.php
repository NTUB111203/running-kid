<?php
/*連接資料庫*/
require_once 'DataBase.php';
session_start();
$m_name = $_SESSION["m_name"];
$sch_no = $_SESSION["sch_no"];
$class_no = $_SESSION["class_no"];



$m_id = $_POST['m_id'];
$m_name = $_POST['m_name'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : 'F';
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];



$sql = "INSERT INTO  members(m_id,m_name,mail,gender,identity,birthday,class_no,password,sch_no)
        VALUES('$m_id','$m_name',' ','$gender','S','$birthday','$class_no','$birthday','$sch_no')";
echo $sql;

if (mysqli_query($link, $sql)) {
    echo "新增成功!!";
} else {
    echo "新增失敗" . mysqli_error($link);
}

// 如果有新增成功
// header('Location: student-view.php');

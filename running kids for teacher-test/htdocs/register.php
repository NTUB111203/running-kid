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
$class_no = $_POST["class"];

$base_encode = base64_encode($password);

$sql = "INSERT INTO members(sch_no,identity,m_name,mail,m_id,password,class_no) VALUES ('$sch_no','$identity','$m_name','$mail','$m_id','$base_encode','$class_no')";

// echo $sql;

// if (!$result) {
//     die($link->error);
// }


if (mysqli_query($link, $sql)) {
    $response = array();
    $response['success'] = "註冊成功!!";
    // 如果成功
    // header('Location:login_index.php');
} else {
    $response['error'] = "註冊失敗" . mysqli_error($link);
}
exit(json_encode($response));

function function_alert($message)
{
    echo "<script>alert('$message');
    window.history.back(); 
    </script>";
    return false;
}

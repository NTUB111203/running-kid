<?php
/*連接資料庫*/
require_once 'DataBase.php';
session_start();
$m_name = $_SESSION["m_name"];
$school_no = $_SESSION["school_no"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>新增學生</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .selections{
            border-radius: 10rem;
            height: calc(2em + 1.25rem );
            font-size: 0.8rem;
        }
    </style>

</head>

<?php
echo
$_POST['sch_no'];
$_POST['class_no'];
$m_id = $_POST['m_id'];
$m_name = $_POST['m_name'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : 'F';
$gender = $_POST['gender'];
$enrollment = $_POST['enrollment'];
$birthday = $_POST['birthday'];
$class_no = $_GET['class_no'];
$identity = $_POST['identity'];
$mail = $_POST['mail'];

$sql = "INSERT INTO  members(m_id,m_name,gender,mail,identity,class_no)
        VALUES('$m_id','$m_name','$gender',' ','S','$class_no')";
if (mysqli_query($link, $sql)) {
    echo "新增成功!!";
} else {
    echo "新增失敗" . mysqli_error($link);
}

// 如果有新增成功
header('Location: student-view.php');

?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
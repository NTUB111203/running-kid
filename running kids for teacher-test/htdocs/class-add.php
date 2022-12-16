<?php
/*連接資料庫*/
require_once 'DataBase.php';
session_start();
$m_name = $_SESSION["m_name"];
$sch_no = $_SESSION["sch_no"];
?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>新增班級</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .selections {
            border-radius: 10rem;
            height: calc(2rem + 1.25rem);
            font-size: 0.8rem;
        }
    </style>

</head>


<?php
echo $_POST['sch_no'];
// $sch_no = $_POST['sch_no'];
$semester = $_POST['semester'];
$grade = $_POST['grade'];
$class = $_POST['class'];

$sql = "INSERT INTO  class(semester,grade,class,sch_no)VALUES('$semester','$grade', '$class','$sch_no')";
echo $sql;

if (mysqli_query($link, $sql)) {
    function_alert("班級新增成功!");
} else {
    function_alert("班級新增失敗！");
}

// 如果新增成功
header('Location:class-maintain.php');

// Close connection
mysqli_close($link);

function function_alert($message)
{

    echo "<script>alert('$message');
    window.history.back(); 
    </script>";
    return false;
}


// if(mysqli_query($link,$sql)){
//     echo "新增成功!!";
// }else{
//     echo "新增失敗".mysqli_error($link);
// }

?>



<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-12">
                        <!-- col-lg-7 -->
                        <div class="p-5">
                            <div class="text-center">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>
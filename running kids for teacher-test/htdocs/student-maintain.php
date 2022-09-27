<?php
/*連接資料庫*/
require_once 'DataBase.php';

// Initialize the session
session_start();
 
// // Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;  //記得要跳出來，不然會重複轉址過多次
// }

$m_name=$_SESSION["m_name"];

//echo session_save_path();
//echo "<h1>你好 ".$m_name."</h1>";
//echo "<tr>";
//echo "<a href='logout.php'>登出</a>";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Other Utilities</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


    <?php include("side.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">        
                
    <?php include("top.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">班級學生管理</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">請選擇班級</h6>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- PHP 班級 -->
                        
                       
                        <?php
                        
                        $result = "SELECT * FROM class";
                        $retval=mysqli_query($link, $result);
                        if ($retval) {
                            $num = mysqli_num_rows($retval);
                            
                                if (mysqli_num_rows($retval) > 0) {
                                while ($row = mysqli_fetch_assoc($retval)) {
                                    $members = "select count(*)as member from members where class =". $row['class'];
                                    $retval2=mysqli_query($link, $members);
                                    $rowMember = mysqli_fetch_assoc($retval2);
                                    echo "<div class=\"col-xl-3 col-md-6 mb-4\">\n";
                                    echo "<div class=\"card border-left-success shadow h-100 py-2\">\n";
                                    echo "<div class=\"card-body\">\n";
                                    echo "<div class=\"row no-gutters align-items-center\">\n";
                                    echo "<div class=\"col mr-2\">\n";
                                    echo "<div class=\"h1 font-weight-bold text-success text-uppercase mb-1\">\n";
                                    echo "<h1>".$row["class"]."</h1>";
                                    echo "</div>\n";
                                    echo "<div class=\"h5 mb-0 font-weight-bold text-gray-800\">\n";
                                    //echo "<h5>".$rowMember['member']."人</h5>";
                                    echo "</div>";
                                    //echo "<div class=\"h5 mb-0 font-weight-bold text-gray-800\">年級</div>\n";
                                    //按鈕
                                    echo "</div>\n";
                                    echo "<a href=\"student-view.php?class=".$row['class']. "\" class=\"btn btn-success btn-circle btn-lg\">\n";
                                    echo "<i class=\"fas fa-info-circle\"></i>\n";
                                    echo "</a>\n";
                                    echo "</div>\n";
                                    echo "</div>\n";
                                    echo "</div>\n";
                                    echo "</div>\n";
                        }
                        }
                        }
                        ?>                
                                       
                                        </div>
                                        <tr>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    
                   
                 

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button按鈕-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
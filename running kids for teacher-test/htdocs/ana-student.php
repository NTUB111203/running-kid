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
                        

                        <h1 class="h3 mb-0 text-gray-800">學生DONI個人分析</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>


                   <!-- Content Row -->
                   <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                        今日里程</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">0.1KM</div>
                </div>
                <!-- <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                        累積里程</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">1287KM</div>
                </div>
                <!-- <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-info text-uppercase mb-1">
                        累積跑步時間</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">288.56HR</div>
                </div>
                <!-- <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                        平均跑步時速</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">4.46KM/HR</div>
                </div>
                <!-- <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div> -->
            </div>
        </div>
    </div>
</div>
</div>

<!-- Content Row -->

<div class="row">

<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">進步趨勢分析</h6>
           
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartStudent"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">學生跑步資訊 </h6>
            
        </div>
        <!-- Card Body -->
        <div class="card-body">         
            <div class="my-4"></div>
            <a href="#" class="btn btn-success btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">起始跑步日期 : 2021-03-01</span>
            </a>        
            <div class="my-2"></div>
            <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">平均每月公里數 : 75.5 KM &nbsp;&nbsp;</span>
            </a>   
            <div class="my-2"></div>
            <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">本月跑步公里數 : 84.9 KM &nbsp;&nbsp;</span>
            </a>              
            <div class="my-2"></div>
            <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">上個月跑步公里 : 81.6 KM &nbsp;&nbsp;</span>
            </a>   
            <div class="my-2"></div>
            <a href="#" class="btn btn-warning btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">平均進步公里數 : 9.4 KM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </a> 
            <div class="my-4"></div>     
             
            <!-- <div class="chart-pie pt-4 pb-2">
                <canvas id="pieBMI"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> 適中
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> 過瘦
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> 過重
                </span>
            </div> -->
        </div>
    </div>
</div>

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    
</div>
</div>

<!-- 排名table -->

<?php 

// $query = $link->query("
//     SELECT m_id,distance,r_datetime FROM runningkids.record;
// ");

// foreach($query as $data){
//     $distance[] = $data['distance'];
//     $r_datetime[] = $data['r_datetime'];
// }
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">個人里程紀錄</h6>
    </div>
    <div class="card-body">
        <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
        </div>
        <hr>
        <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> 五月每日跑步里程
            </span>
            
        </div> 
    </div>
    
</div>

</div>


<!-- </div> -->
<!-- End of Main Content -->


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
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
<?php
/*連接資料庫*/
require_once 'DataBase.php';
?>

<?php
// Initialize the session
session_start();
 
// // Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;  //記得要跳出來，不然會重複轉址過多次
// }

$m_name=$_SESSION["m_name"];
$class_no = $_GET['id'];
// $class = $_SESSION["id"];

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
                        <h1 class="h3 mb-0 text-gray-800">
                            <?php 
                            $result = "SELECT * FROM class where class_no=".$_GET['id'];
                            $retval=mysqli_query($link, $result);
                            if ($retval) {
                                $num = mysqli_num_rows($retval);
                                if (mysqli_num_rows($retval) > 0){
                                    while ($row = mysqli_fetch_assoc($retval)) {
                                        echo $row["class"];
                                        // echo "<h1>".$row["grade"]."</h1>";
                                    }
                                }
                            }    
                            ?>
                            班級分析</h1>
                        
                        
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">班級紀錄</h6>
                        </div>
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
                                            累計跑步里程
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            
                                            
                                            <!-- 累計跑步里程 -->
                                            <?php 
                                            $result = "SELECT sum(record.distance) as totalDistance FROM runningkids.record
                                            inner join members on members.m_id=record.m_id
                                            where record.m_id in
                                            (SELECT members.m_id FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where  members.identity='S' and members.class_no =" .$_GET['id']. ")" ;
                                            $retval=mysqli_query($link, $result);
                                            $rowClass = mysqli_fetch_assoc($retval);
                                            echo "<p>".$rowClass["totalDistance"]."KM</p>";
                                            ?>
                                            
                                            <!-- KM -->
                                            </div>
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
                                                平均跑步里程</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <!-- 以下為SQL班級人數 -->
                                            <?php 
                                            $result = "SELECT count(m_id) as classMembers FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where members.identity='S' and members.class_no =  " .$_GET['id']. "" ;
                                            $retval=mysqli_query($link, $result);
                                            
                                             $rowClass = mysqli_fetch_assoc($retval);
                                             echo "<p>".$rowClass["classMembers"]."人</p>";
                                            ?>

                                            <?php 
                                            $result = "SELECT sum(record.distance) as totalDistance FROM runningkids.record
                                            inner join members on members.m_id=record.m_id
                                            where record.m_id in
                                            (SELECT members.m_id FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where  members.identity='S' and members.class_no =" .$_GET['id']. ")" ;
                                            $retval=mysqli_query($link, $result);
                                            $rowClass = mysqli_fetch_assoc($retval);
                                            echo "<p>".$rowClass["totalDistance"]."KM</p>";

                                            $result = "SELECT count(m_id) as classMembers FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where members.identity='S' and members.class_no =  " .$_GET['id']. "" ;
                                            $retval=mysqli_query($link, $result);
                                            
                                             $rowClass = mysqli_fetch_assoc($retval);
                                             echo "<p>".$rowClass["classMembers"]."人</p>";
                                             echo (float)$rowClass["totalDistance"]/(float)$rowClass["classMembers"];
                                            ?>

                                            
                                            
                                            

                                        

                                        </div>
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
                                                平均跑步時間</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">2.6HR</div>
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
                                                累計跑步時間</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $result = "SELECT sum(timestampdiff(minute, r_datetime, end_time)) as totalTime FROM runningkids.record
                                            inner join members on members.m_id=record.m_id
                                            where record.m_id in
                                            (SELECT members.m_id FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where  members.identity='S' and members.class_no =" .$_GET['id']. ")" ;
                                            $retval=mysqli_query($link, $result);
                                            $rowClass = mysqli_fetch_assoc($retval);
                                            echo "<p>".$rowClass["totalTime"]."分鐘</p>";
                                            ?>
                                            </div>
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
                        <!-- <div class="col-xl-8 col-lg-7"> -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">班級進步分析</h6>
                                    <div class="dropdown no-arrow">
                                        <!-- <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a> -->
                                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="chartSchool"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    
                    </div>
                    
                <!-- /.container-fluid -->

            <!-- </div> -->
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("footer.php"); ?>
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
    <?php include("logout_btn.php"); ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-school.js"></script>
    <!-- <script src="js/demo/chart-area-demo.js"></script>     -->
    <!-- <script src="js/demo/pie-BMI.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
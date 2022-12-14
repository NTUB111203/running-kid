<?php
// Initialize the session
session_start();
 
// // Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: welcome.php");
//     exit;  //記得要跳出來，不然會重複轉址過多次
// }

/*連接資料庫*/
require_once 'DataBase.php';

$m_name=$_SESSION["m_name"];
$sch_no=$_SESSION["sch_no"];
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

    <title>running kids</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


    <?php include("side-teacher.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">        
                
    <?php include("top.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">全校分析</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">班級排行榜</h6>
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
                                                第一名</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                                $resultSchoolDistance = "SELECT CONCAT(grade,class) as schoolClass FROM runningkids.record
                                                inner join class on record.c_no = class.class_no
                                                group by c_no where class.sch_no='".$sch_no."' 
                                                order by sum(distance) DESC;" ;
                                                $retval4=mysqli_query($link, $resultSchoolDistance);
                                                $NO1 = mysqli_fetch_assoc($retval4);
                                                $NO2 = mysqli_fetch_assoc($retval4);
                                                $NO3 = mysqli_fetch_assoc($retval4);
                                                $NO4 = mysqli_fetch_assoc($retval4);
                                                // $num1 = $row4[0];

                                                //如何取排序第一筆資料第一個
                                                //第二名取第二筆 以此類推
                                                //echo $row4['schoolClass'];
                                                echo $NO1['schoolClass'];
                                                
                                                
                                            ?> 
                                            
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
                                                第二名</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                echo $NO2['schoolClass'];
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
                                                第三名</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                echo $NO3['schoolClass'];
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
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">
                                                第四名</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                echo $NO4['schoolClass'];
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
                                    <h6 class="m-0 font-weight-bold text-primary">全校班級里程</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="chartBarSchool"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
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
    <script src="js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

     <!-- Page level custom scripts -->
     <!-- <script src="js/demo/chart-bar-school.js"></script> -->
     <!-- <script src="js/demo/pie-BMI.js"></script> -->
     <!-- <script src="js/demo/chart-school.js"></script> -->
     <!-- <script src="js/demo/chart-area-demo.js"></script> -->
     <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
     <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
     <script src="js/demo/datatables-demo.js"></script>

    <script>
        <?php 
       
       $query = $link->query("
       SELECT sum(distance) as schoolDistance,c_no,CONCAT(grade,class) as schoolClass FROM runningkids.record
        inner join class on record.c_no = class.class_no
        group by c_no;    
       ");

       foreach($query as $data){
           $schoolDistance[] = $data['schoolDistance'];
           $schoolClass[] = $data['schoolClass'];
        //    $class[] = $data[]
       }
        ?>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
        };
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
    }

    // Bar Chart Example
    var ctx = document.getElementById("chartBarSchool");
    var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($schoolClass) ?> ,
        datasets: [{
        label: "跑步里程",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: <?php echo json_encode($schoolDistance) ?> ,
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
        padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
        }
        },
        scales: {
        xAxes: [{
            time: {
            unit: 'month'
            },
            gridLines: {
            display: true,
            drawBorder: false
            },
            ticks: {
            maxTicksLimit: 50 //X軸label最大數量
            },
            maxBarThickness: 25,
        }],
        yAxes: [{
            ticks: {
            min: 0,
            //max: 3000,
            //maxTicksLimit: 5,
            padding: 100,
            // Include a dollar sign in the ticks
            callback: function(value, index, values) {
                return  number_format(value)+ '公尺';
            }
            },
            gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
            }
        }],
        },
        legend: {
        display: false
        },
        tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
            label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+ '公尺 ';
            }
        }
        },
    }
    });

    </script>
    


</body>

</html>
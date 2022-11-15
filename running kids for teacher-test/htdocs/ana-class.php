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
                                        echo $row["grade"].$row["class"];
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
                                            // $result = "SELECT count(m_id) as classMembers FROM runningkids.class
                                            // inner join members on class.class_no=members.class_no
                                            // where members.identity='S' and members.class_no =  " .$_GET['id']. "" ;
                                            // $retval=mysqli_query($link, $result);
                                            
                                            //  $rowClass = mysqli_fetch_assoc($retval);
                                            //  echo "<p>".$rowClass["classMembers"]."人</p>";
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
                                            //echo "<p>".$rowClass["totalDistance"]."KM</p>";
                                            $totaldis= (float)$rowClass["totalDistance"];

                                            $result = "SELECT count(m_id) as classMembers FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where members.identity='S' and members.class_no =  " .$_GET['id']. "" ;
                                            $retval=mysqli_query($link, $result);
                                            
                                             $rowClass = mysqli_fetch_assoc($retval);
                                            //echo "<p>".$rowClass["classMembers"]."人</p>";
                                            $clas = (float)$rowClass["classMembers"];
                                            //echo ($totaldis/$clas);
                                            echo "<p>".round($totaldis/$clas)."KM</p>";
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
                                            累計跑步時間</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $result = "SELECT round(ABS(sum(timestampdiff(minute, r_datetime, end_time)))) as totalTime FROM runningkids.record
                                            inner join members on members.m_id=record.m_id
                                            where record.m_id in
                                            (SELECT members.m_id FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where  members.identity='S' and members.class_no =" .$_GET['id']. ")" ;
                                            $retval=mysqli_query($link, $result);
                                            $rowClass = mysqli_fetch_assoc($retval);
                                            $totalTime = $rowClass["totalTime"];
                                            echo sprintf('%.2f',$totalTime/60).'小時';
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
                                                平均跑步時間</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                                            $result = "SELECT round(ABS(sum(timestampdiff(minute, r_datetime, end_time)))) as totalTime FROM runningkids.record
                                            inner join members on members.m_id=record.m_id
                                            where record.m_id in
                                            (SELECT members.m_id FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where  members.identity='S' and members.class_no =" .$_GET['id']. ")" ;
                                            $retval=mysqli_query($link, $result);
                                            $rowClass = mysqli_fetch_assoc($retval);
                                            $totalTime = $rowClass["totalTime"];
                                            $result = "SELECT count(m_id) as classMembers FROM runningkids.class
                                            inner join members on class.class_no=members.class_no
                                            where members.identity='S' and members.class_no =  " .$_GET['id']. "" ;
                                            $retval=mysqli_query($link, $result);
                                            $rowClass = mysqli_fetch_assoc($retval);
                                            $clas = (float)$rowClass["classMembers"];
                                            // echo "<p>".round($totalTime/$clas)."分鐘</p>";
                                            echo sprintf('%.2f',$totalTime/$clas/60).'小時';

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
                                    <h6 class="m-0 font-weight-bold text-primary">班級數據分析</h6>
                                    <div class="dropdown no-arrow">
                                    
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
    <!-- <script src="js/demo/chart-school.js"></script> -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>     -->
    <!-- <script src="js/demo/pie-BMI.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

    <!-- 里程紀錄分析 -->
    <script>
    <?php 
       
       $query = $link->query("
       SELECT sum(distance) as monthDistance ,concat(year(r_datetime),'/',right(100+month(r_datetime),2)) as eachMonth FROM runningkids.record
        where c_no=" .$_GET['id']."
        group by eachMonth
        order by eachMonth ASC
        ;");
        foreach($query as $data){
            $monthDistance[] = $data['monthDistance'];
            $eachMonth[] = $data['eachMonth'];
        }

        // $query = $link->query("
        // SELECT sum(distance) as monthDistance ,month(r_datetime) as months FROM runningkids.record
        // where c_no=" .$_GET['id']." 
        // group by month(r_datetime);    
        // ");
        // foreach($query as $data){
        //     $monthDistance[] = $data['monthDistance'];
        //     $months[] = $data['months'];
        // }
    ?>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
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
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
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

        // Area Chart Example
        var ctx = document.getElementById("chartSchool");
        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            //labels: echo json_encode($months) ,
            labels: <?php echo json_encode($eachMonth) ?> ,
            datasets: [{
            label: "跑步里程",
            lineTension: 0.3,
            backgroundColor: "rgba(54, 185, 204, 0.05)",
            borderColor: "rgba(54, 185, 204, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(54, 185, 204, 1)",
            pointBorderColor: "rgba(54, 185, 204, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(54, 185, 204, 1)",
            pointHoverBorderColor: "rgba(54, 185, 204, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data:<?php echo json_encode($monthDistance) ?> ,
            
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
                    unit: 'date'
                },
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxTicksLimit: 30,
                    padding: 10,
                    // callback: function(value, index, values) {
                    //     return number_format(value)+'月';
                    // }
                }
            }],
            yAxes: [{
                ticks: {
                    maxTicksLimit: 3,//左側顯示項次數量
                    padding: 10,
                    // Include a dollar sign in the ticks
                    callback: function(value, index, values) {
                        return '公里' + number_format(value);
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
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+'公里';
                }
            }
            }
        }
        });

        </script>

</body>

</html>
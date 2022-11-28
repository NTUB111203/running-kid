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
$m_id = $_GET['id'];

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
                        
                    <!-- FIX改成相對的學生姓名 -->
                        <h1 class="h3 mb-0 text-gray-800">
                        學生
                            <?php 
                            $result = "SELECT * FROM members where m_id=".$_GET['id'];
                            $retval=mysqli_query($link, $result);
                            if ($retval) {
                                $num = mysqli_num_rows($retval);
                                if (mysqli_num_rows($retval) > 0){
                                    while ($row = mysqli_fetch_assoc($retval)) {
                                        echo $row["m_name"];
                                        // echo "<h1>".$row["grade"]."</h1>";
                                    }
                                }
                            }    
                            ?>
                        個人分析
                        </h1>
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
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php 
                    $resultToday = "SELECT sum(record.distance) as TodayDistance FROM runningkids.record
                    inner join members on members.m_id=record.m_id
                    where record.m_id in
                    (SELECT members.m_id FROM runningkids.class
                    inner join members on class.class_no=members.class_no
                    where  members.identity='S'and day(r_datetime) = day(now()) and members.m_id =" .$_GET['id']. ")" ;
                    $retvalToday=mysqli_query($link, $resultToday);
                    $rowToday = mysqli_fetch_assoc($retvalToday);
                    $TodayDistance = $rowToday["TodayDistance"];
                    if (empty($TodayDistance)) {
                        echo "0公里";
                    }else {
                        echo sprintf('%.2f', ($TodayDistance/1000))."公里";
                    }
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
                        累積里程</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php 
                    $resultStuTotal = "SELECT sum(record.distance) as stuTotalDistance FROM runningkids.record
                    inner join members on members.m_id=record.m_id
                    where record.m_id in
                    (SELECT members.m_id FROM runningkids.class
                    inner join members on class.class_no=members.class_no
                    where  members.identity='S' and members.m_id =" .$_GET['id']. ")" ;
                    $retvalStuTotal=mysqli_query($link, $resultStuTotal);
                    $rowToday = mysqli_fetch_assoc($retvalStuTotal);
                    $stuTotalDistance = $rowToday["stuTotalDistance"];
                    if (empty($stuTotalDistance)) {
                        echo "0公里";
                    }else {
                        echo sprintf('%.2f', ($stuTotalDistance/1000))."公里";
                    }
                    ?>
                    </div>
                </div>
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
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        $resultStuTime = "SELECT round(ABS(sum(timestampdiff(minute, r_datetime, end_time)))) as totalTime FROM runningkids.record
                        inner join members on members.m_id=record.m_id
                        where record.m_id in
                        (SELECT members.m_id FROM runningkids.class
                        inner join members on class.class_no=members.class_no
                        where  members.identity='S' and members.m_id =" .$_GET['id']. ")" ;
                        $retvalStuTime=mysqli_query($link, $resultStuTime);
                        $rowStuTime = mysqli_fetch_assoc($retvalStuTime);
                        $totalTime = $rowStuTime["totalTime"];
                        if (empty($totalTime)) {
                            echo "0小時";
                        }else {
                            echo "<p>".sprintf('%.2f', ($totalTime/60))."小時</p>";
                        }
                        ?> 
                    </div>
                </div>
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
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                        
                        if (empty($totalTime)||empty($stuTotalDistance)) {
                            echo "0 ";
                        }else {
                            $StuSpeed = sprintf('%.2f', ($stuTotalDistance/1000))/sprintf('%.2f', ($totalTime/60));
                            $showStuSpeed = sprintf('%.2f', $StuSpeed);
                            echo $showStuSpeed;
                            //echo round($StuSpeed,2);
                        }
                        
                        
                        
                        ?> 
                        公里/小時
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
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">里程紀錄分析</h6>
           
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
                <span class="text">起始日期 :
                <?php 
                $result = "SELECT min(date(r_datetime))as starttime FROM runningkids.record
                where m_id =  " .$_GET['id']. "" ;
                $retval=mysqli_query($link, $result);
                $rowTime = mysqli_fetch_assoc($retval);
                $starttime = $rowTime["starttime"];
                if(empty($starttime)){
                    echo "尚未有紀錄";
                }else{
                    echo $starttime;
                }
                    
                ?>
                    </span>
            </a>        
            <div class="my-2"></div>
            <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">本月公里數 : 
                    <?php 
                    $result = "SELECT sum(record.distance) as stuMonDistance FROM runningkids.record
                    inner join members on members.m_id=record.m_id
                    where record.m_id in
                    (SELECT members.m_id FROM runningkids.class
                    inner join members on class.class_no=members.class_no
                    where  members.identity='S'and month(r_datetime) = month(now()) and members.m_id =" .$_GET['id']. ")" ;
                    $retval=mysqli_query($link, $result);
                    $rowS = mysqli_fetch_assoc($retval);
                    $stuMonDistance = $rowS["stuMonDistance"];
                    if(empty($stuMonDistance)){
                        echo "0";
                    }else{
                        echo sprintf('%.2f',$stuMonDistance/1000);
                    }
                    
                    
                    ?>公里 </span>
            </a>   
            <!-- <div class="my-2"></div>
            <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">本月跑步公里數 : 84.9 KM &nbsp;&nbsp;</span>
            </a>               -->
            <div class="my-2"></div>
            <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">上個月公里數 : <?php 
                    $resultLast = "SELECT sum(record.distance) as stuMonDistanceLast FROM runningkids.record
                    inner join members on members.m_id=record.m_id
                    where record.m_id in
                    (SELECT members.m_id FROM runningkids.class
                    inner join members on class.class_no=members.class_no
                    where  members.identity='S'and month(r_datetime) = month(now())-1 and members.m_id =" .$_GET['id']. ")" ;
                    $retvalLast=mysqli_query($link, $resultLast);
                    $rowSMD = mysqli_fetch_assoc($retvalLast);
                    $stuMonDistanceLast=$rowSMD["stuMonDistanceLast"];
                    echo sprintf('%.2f',$stuMonDistanceLast/1000);
                    
                    ?>公里 </span>
            </a>   
            <div class="my-2"></div>
            <a href="#" class="btn btn-warning btn-icon-split btn-lg">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">進步公里數 :
                    <?php
                    echo sprintf('%.2f',$stuMonDistance/1000)-sprintf('%.2f',$stuMonDistanceLast/1000).'公里';
                    ?>
                </span>
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
            <canvas id="studentRecord"></canvas>
        </div>
        <hr>
        <div class="mt-4 text-center small">
            <span class="mr-2">
                <i class="fas fa-circle text-primary"></i> 每日跑步里程
            </span>
            
        </div> 
    </div>
    
</div>

</div>


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
    <script src="js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-student.js"></script> -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>     -->
    <!-- <script src="js/demo/pie-BMI.js"></script> -->
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>    
    <!-- <script src="js/demo/chart-bar-demo.js"></script>
    <script src="js/demo/personal_record.js"></script> -->

    <!-- SELECT m_id,distance,r_datetime FROM runningkids.record; -->

    <!-- 里程紀錄分析 -->
    
    <script>
    <?php 
       
        $query = $link->query("
        select  MONTH(r_datetime) as Months ,sum(distance) as 'eachMonth' 
        from runningkids.record
        WHERE (r_datetime between '2022/09/01' and '2023/08/31') and m_id=" .$_GET['id']."
        GROUP BY  MONTH(r_datetime);    
        ");

        foreach($query as $data){
            $eachMonth[] = $data['eachMonth'];
            $Months[] = $data['Months'];
        }
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
        var ctx = document.getElementById("chartStudent");
        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            //labels:<?php echo json_encode($Months) ?>,
            labels: <?php echo json_encode($Months) ?> ,
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
            data:<?php echo json_encode($eachMonth) ?> 
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
                maxTicksLimit: 12
                }
            }],
            yAxes: [{
                ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                    return '公尺' + number_format(value);
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
                return datasetLabel + ': ' + number_format(tooltipItem.yLabel)+'公尺';
                }
            }
            }
        }
        });

        </script>

    <!-- 個人里程圖表 -->
    <script>
    <?php 
    //get 月份累加
        
        $query = $link->query("
            SELECT m_id,distance,r_datetime FROM runningkids.record
            where m_id=" .$_GET['id']. "
            order by r_datetime ASC
            ;
        ");

        foreach($query as $data){
            $distance[] = $data['distance'];
            $r_datetime[] = $data['r_datetime'];
        }
    ?>
    // 圖表的JS
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

        // Bar Chart Example
        var ctx = document.getElementById("studentRecord");
        var studentRecord = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($r_datetime) ?>,
            datasets: [{
            label: "跑步里程",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#36b9cc",
            borderColor: "#4e73df",
            data:<?php echo json_encode($distance) ?> ,
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
                display: false,
                drawBorder: false
                },
                ticks: {
                maxTicksLimit: 6
                },
                maxBarThickness: 20,
            }],
            yAxes: [{
                ticks: {
                min: 0,
                //確認資料是否合理
                //max: 150,
                maxTicksLimit: 5,
                padding: 10,
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
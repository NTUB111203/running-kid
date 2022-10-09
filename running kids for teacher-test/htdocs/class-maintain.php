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
                        <h1 class="h3 mb-0 text-gray-800">班級列表</h1>
                    </div>
                    <!-- DataTales 班級增刪 -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">班級管理</h6>         -->
                            <div class="row justify-content-end">
                                <a href="class-add.html" class="btn btn-success btn-icon-split ">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text" style="font-weight:bold;">新增班級</span>
                                </a>
                                <!-- &emsp; -->
                                <a href="class-edit.html" class="btn btn-warning btn-icon-split ">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    <span class="text" style="font-weight:bold;">編輯班級</span>
                                </a>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>學年度</th>
                                            <th>年級</th>
                                            <th>班別</th>
                                            <th>人數</th>
                                            <th>狀態</th>
                                        </tr>
                                    </thead>
                                     
                                               <!--表格資料仍有錯誤待修，目前只是把class表拉進-->
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
                                                                    // echo "<td><input type=\"checkbox\" id=\"cbox1\" value=\"first_checkbox\"></input></td>\n";                                                           
                                                                    echo "<th>".$row["semester"]."</th>";
                                                                    echo "<th>".$row["grade"]."</th>";
                                                                    echo "<th>".$row["class"]."</th>";
                                                                    echo "<th>".$rowMember['member']."</th>";
                                                
                                                                    echo "<th style=\"color: rgb(0, 87, 248);\">現任班級</th>\n";
                                                                    echo '</tr>';
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                     
                                </table>
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

</body>

</html>
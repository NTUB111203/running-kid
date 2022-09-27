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
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div> -->
                        <div class="card-body">
                        <div class="row">
                            <div class="col">                            
                                <h1 class="h3 mb-2 text-gray-800">
                                <i class="fas fa-fw fa-gift"></i>禮品兌換
                                </h1>
                            </div>
                            <div class="col">
                            
                            </div>
                            <div class="col align-right">
                                <div class="row justify-content-end ">
                                    <a href="gift-add.php" class=" btn btn-success btn-icon-split " >
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text" style="font-weight:bold;">確認兌換</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>學號</th>
                                            <th>學生姓名</th>                                            
                                            <th>禮品名稱</th>
                                            <th>兌換數量</th>
                                            <th>兌換日期</th>
                                            <th>                                            
                                            <input type="checkbox" name="all" onclick="check_all(this,'c')">
                                            <!-- 美化 -->
                                            <!-- 全選/全不選 -->
                                            已兌換(請打勾)
                                            </a>
                                            
                                            </th>
                                            <!-- <th>Start date</th>
                                            <th>Salary</th> -->
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>
                                        <tr>
                                            <td>學號data1</td>
                                            <td>姓名data1</td>
                                            <td>禮品名稱data1</td>
                                            <td>兌換數量data1</td>
                                            <td>兌換日期data1</td>
                                            <td> 
                                                <input type="checkbox" name="c" value="" />                                               
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>學號data2</td>
                                            <td>姓名data2</td>
                                            <td>禮品名稱data2</td>
                                            <td>兌換數量data2</td>
                                            <td>兌換日期data2</td>
                                            <td> 
                                                <input type="checkbox" name="c" value="" />                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>學號data3</td>
                                            <td>姓名data3</td>
                                            <td>禮品名稱data3</td>
                                            <td>兌換數量data3</td>
                                            <td>兌換日期data3</td>
                                            <td> 
                                                <input type="checkbox" name="c" value="" />                                           
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
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

    <!-- checkbox 全選功能 -->
    <script type="text/javascript">
    function check_all(obj,cName)
    {
        var checkboxs = document.getElementsByName(cName);
        for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
    }
    </script>

</body>

</html>
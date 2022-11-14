<?php
/*連接資料庫*/
require_once 'DataBase.php';
session_start();
$m_name = $_SESSION["m_name"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>供應商管理</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

                    <div class="container">


                    </div>

                    <!-- <div class="row">
                       
                       <h1 class="h3 mb-2 text-gray-800">禮品項目</h1>
                       <div class="row justify-content-end">
                       <a href="gift-on.php" class=" btn btn-success btn-icon-split " >
                           <span class="icon text-white-50">
                               <i class="fas fa-check"></i>
                           </span>
                           <span class="text" style="font-weight:bold;">新增禮品</span>
                       </a>
                       </div>
                       </div> -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                               <h6 class="m-0 font-weight-bold text-primary"></h6>
                           </div> -->



                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h1 class="h3 mb-2 text-gray-800">
                                        <i class="fas fa-fw fa-gift"></i>供應商資訊
                                    </h1>
                                </div>
                                <div class="col">
                                    <div class="row justify-content-end ">
                                        <a href="sup-add.html" class=" btn btn-success btn-icon-split ">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text" style="font-weight:bold;">新增供應商</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>


                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>禮品供應商</th>
                                            <th>供應商連絡電話</th>
                                            <th>編輯</th>
                                            <th>刪除</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <!--表格資料仍有錯誤待修，目前只是把class表拉進-->
                                        <?php
                                        $result = "SELECT * FROM  gift_supplier";
                                        //$result = "SELECT * FROM gift LEFT JOIN gift_supplier ON gift.gift_sup_no = gift_supplier.sup_no";  
                                        $retval = mysqli_query($link, $result);

                                        if ($retval) {
                                            $num = mysqli_num_rows($retval);

                                            if (mysqli_num_rows($retval) > 0) {
                                                while ($row = mysqli_fetch_assoc($retval)) {
                                                    echo "<th>" . $row["sup_name"] . "</th>";
                                                    echo "<th>" . $row['sup_tel'] . "</th>";

                                        ?>
                                                    <td>
                                                        <?php
                                                        echo '<a href="sup-edit.php?sup_no=' . $row['sup_no'] . '" class=" btn btn-warning btn-icon-split ">';
                                                        echo '<span class="text" style="font-weight:bold;">編輯</span>';
                                                        echo '</a>';
                                                        ?>
                                                    </td>

                                                     <!-- 連接到sup-delete.php -->
                                                    <td>
                                                        <?php
                                                        echo '<a href="sup-delete.php?sup_no=' . $row['sup_no'] . '" class=" btn btn-danger btn-icon-split ">';
                                                        echo '<span class="text" style="font-weight:bold;">刪除</span>';
                                                        echo '</a>';
                                                        ?>
                                                    </td>
                                                    <!-- 跳出確認刪除按鈕                                                                                                -->
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
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
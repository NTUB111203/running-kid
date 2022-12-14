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

$m_name = $_SESSION["m_name"];

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

    <title>禮物兌換</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .item-box .item-list input[type='checkbox'] {
            width: 20px;
            height: 20px;
            border: 1px solid #999;
            border-radius: 3px;

            -webkit-appearance: none;
            /*取消預設外觀*/
            background-color: #fff;

            position: relative;
        }

        .item-box .item-list input[type='checkbox']:checked {
            border: 1px solid #15aabf;
            background-color: #15aabf;
        }

        .item-box .item-list input[type='checkbox']:checked:after {
            content: " ✓";
            font-size: 20px;
            font-weight: 900;
            color: #fff;
            line-height: 20px;
            position: absolute;
        }
    </style>
    <script type="text/javascript">
        function check_all(obj, cName) {
            var checkboxs = document.getElementsByName(cName);
            for (var i = 0; i < checkboxs.length; i++) {
                checkboxs[i].checked = obj.checked;
            }
        }
    </script>


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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div> -->


                        <!-- <form class="user" method="post" action="gift-exchange.php"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h1 class="h3 mb-2 text-gray-800">
                                        <i class="fas fa-fw fa-gift"></i>禮品兌換(尚未兌換)
                                    </h1>
                                </div>
                                <div class="col">

                                </div>
                                <div class="col align-right">
                                    <div class="row justify-content-end ">
                                        <a href="gift-off-check.php" class="btn btn-primary btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-flag"></i>
                                            </span>
                                            <span class="text">禮物兌換紀錄</span>
                                        </a>
                                        <a href="gift-exchange.php" class=" btn btn-success btn-icon-split ">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <!-- <button><span class="text" type="submit" name="buttonSave" id="button" value="送出" style="font-weight:bold"></span>確認兌換</button> -->
                                            <span class="text" style="font-weight:bold;" type="submit" name="buttonSave" id="button" value="送出">確認兌換</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <form class="user" method="post" action="gift-exchange.php">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>學號</th>
                                                <th>學生姓名</th>
                                                <th>禮品名稱</th>
                                                <th>兌換數量</th>
                                                <th>學生兌換日期</th>
                                                <th>
                                                    <label>

                                                        <!-- <input type="checkbox" name="CheckAll" value="已選取" id="CheckAll" />
                                                        全部選取</label> -->
                                                        <!-- <br />
                                                    ------------------<br /> -->
                                                        <input type="checkbox" name="all" onclick="check_all(this,'serial_no[]')" />
                                                        全選兌換
                                                    </label>
                                                    <!-- 美化 
                                            全選/全不選
                                            已兌換(請打勾) -->


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
                                                <?php
                                                $result = "SELECT * FROM student_exchange as a 
                                                LEFT JOIN members as b ON a.student_id = b.m_id
                                                LEFT JOIN gift as c ON a.gift_no = c.gift_no
                                                WHERE exchange_status = '未兌換' ";
                                                $retval = mysqli_query($link, $result);

                                                if ($retval) {
                                                    $num = mysqli_num_rows($retval);

                                                    if (mysqli_num_rows($retval) > 0) {
                                                        while ($row = mysqli_fetch_assoc($retval)) {
                                                            // $_SESSION['serial_no'] = $row["serial_no"];
                                                            //$members = "select count(*)as member from members where class =". $row['class'];
                                                            //$retval2=mysqli_query($link, $members);
                                                            //$rowMember = mysqli_fetch_assoc($retval2);
                                                            // echo "<td><input type=\"checkbox\" id=\"cbox1\" value=\"first_checkbox\"></input></td>\n";                                                           
                                                            echo "<th>" . $row["m_id"] . "</th>";
                                                            echo "<th>" . $row["m_name"] . "</th>";
                                                            echo "<th>" . $row["gift"] . "</th>";
                                                            echo "<th>" . $row['exchange_qty'] . "</th>";
                                                            echo "<th>" . $row["exchange_date"] . "</th>";
                                                            //echo "<td><input type=\"checkbox\" name=\"Checkbox[]\" id=\"exchange_status\" value=\"已兌換\"></input></td>\n";
                                                            echo '<td><input type="checkbox" name="serial_no[]" value="' . $row['serial_no'] . '"></input></td>';
                                                            //echo "<th>".$row['exchange_status']."</th>";
                                                            // echo "<th>";

                                                ?>
                                                            <!-- <td><input type="checkbox" name="c" id="serial_no[]" value="" require /></td> -->
                                            </tr>




                                <?php
                                                        }
                                                    }
                                                }
                                ?>
                                <button type="submit" name="buttonSave" id="button" value="送出"></button>
                                        </tbody>
                                    </table>
                                </div>

                            </form>
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

    <!-- checkbox 全選功能 -->
    <script type="text/javascript">
        function check_all(obj, cName) {
            var checkboxs = document.getElementsByName(cName);
            for (var i = 0; i < checkboxs.length; i++) {
                checkboxs[i].checked = obj.checked;
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#CheckAll").click(function() {
                if ($("#CheckAll").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
                    $("input[name='Checkbox[]']").each(function() {
                        $(this).prop("checked", true); //把所有的核取方框的property都變成勾選
                    })
                } else {
                    $("input[name='Checkbox[]']").each(function() {
                        $(this).prop("checked", false); //把所有的核方框的property都取消勾選
                    })
                }
            })
        })
    </script>

</body>

</html>
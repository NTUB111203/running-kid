<?php
/*連接資料庫*/
require_once 'DataBase.php';


session_start();

$m_name = $_SESSION["m_name"];
// $sch_no = $_SESSION["sch_no"];
$class_no = $_SESSION["class_no"];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>學生管理</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript">
        function check_all(obj, cName) {
            var checkboxs = document.getElementsByName(cName);
            for (var i = 0; i < checkboxs.length; i++) {
                checkboxs[i].checked = obj.checked;
            }
        }
    </script>
    <script>
        window.onload = function getclass() {
            $.ajax({
                type: "POST",
                url: "getRow-class.php",
                dataType: "json",
                data: {
                    name: "classList"
                },

                success: function(res) {
                    $.each(res, function(index, val) {
                        $("#class_no").append(
                            $("<option></option>")
                            .attr("value", index)
                            .text(val)
                        );
                    });
                },
            });
        };
    </script>

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

                    <!-- End of Topbar -->

                    <div class="container">

                        <div class="card o-hidden border-0 shadow-lg my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                                    <div class="col-lg-12">
                                        <!-- col-lg-7 -->
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">學生編輯</h1>
                                            </div>


                                            <!-- ==============學生基本資料================= -->

                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">編輯學生基本資料</h6>
                                                    <!-- 一個班級一個表格or全部學生一個表格or 按下班級的人數再顯現學生清單 -->

                                                </div>

                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <!-- <h6 class="m-0 font-weight-bold text-primary">班級管理</h6>         -->
                                                        <div class="row justify-content-end">
                                                            <!-- <a href="studentadd.php" class="btn btn-success btn-icon-split ">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span class="text" style="font-weight:bold;">新增學生</span>
                                                            </a> -->

                                                            <!-- 新增學生鈕 -->
                                                            <?php
                                                            $class_no = $_GET['class_no'];
                                                            // $class_no = $_SESSION['class_no'];
                                                           
                                                            $result = "SELECT * FROM class WHERE class_no = '$class_no'";

                                                            $retval = mysqli_query($link, $result);
                                                            if ($retval) {
                                                                $num = mysqli_num_rows($retval);
                                                                if (mysqli_num_rows($retval) > 0) {
                                                                    while ($row = mysqli_fetch_assoc($retval)) {
                                                                        echo "<a href=\"studentadd.php\" class=\"btn btn-success btn-icon-split \">\n";
                                                                        echo "<span class='icon text-white-50'>";
                                                                        echo "<i class=\"fas fa-check\"></i>\n";
                                                                        echo "</span>\n";
                                                                        echo "<span class=\"text\" style=\"font-weight:bold\">新增學生</span>\n";
                                                                        echo "</a>\n";
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <!-- <th> -->
                                                                        <!-- <label> -->
                                                                        <!-- <input type="checkbox" name="all" onclick="check_all(this,'m_id[]')" /> -->
                                                                        <!-- 美化 -->
                                                                        <!-- 全選/全不選 -->
                                                                        <!-- 選取 -->
                                                                        <!-- 
                                                                            </label> -->
                                                                        <!-- </th> -->
                                                                        <th>學號</th>
                                                                        <th>姓名</th>
                                                                        <th>性別</th>
                                                                        <th>生日</th>
                                                                        <th>電話</th>
                                                                        <th>信箱</th>
                                                                        <th>入學年</th>
                                                                        <th>編輯</th>
                                                                        <th>刪除</th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody>

                                                                    <tr>

                                                                        <?php

                                                                        $result = "SELECT * FROM members where class_no = $class_no AND identity='S'";
                                                                        $retval = mysqli_query($link, $result);
                                                                        if ($retval) {
                                                                            $num = mysqli_num_rows($retval);

                                                                            if (mysqli_num_rows($retval) > 0) {
                                                                                while ($row = mysqli_fetch_assoc($retval)) { ?>

                                                                                    <!-- <td><input type="checkbox" name="c" value="" /></td> -->

                                                                                    <?php
                                                                                    //$class_no = $_GET['class_no'];
                                                                                    //echo "<th> <input type=cheakbox name=change></th>";
                                                                                    //echo "<td><input type=\"checkbox\" id=\"cbox1\" value=\"first_checkbox\"></input></td>\n";
                                                                                    //echo '<td><input type="checkbox" name="m_id[]" value="' . $row['m_id'] . '"></input></td>';
                                                                                    echo "<th>" . $row["m_id"] . "</th>";
                                                                                    echo "<th>" . $row["m_name"] . "</th>";
                                                                                    echo "<th>" . $row["gender"] . "</th>";
                                                                                    echo "<th>" . $row["birthday"] . "</th>";
                                                                                    echo "<th>" . $row["phone"] . "</th>";
                                                                                    echo "<th>" . $row["mail"] . "</th>";
                                                                                    echo "<th>" . $row["enrollment"] . "</th>";


                                                                                    ?>
                                                                                    <td>
                                                                                        <?php
                                                                                        echo '<a href="student-edit.php?m_id=' . $row['m_id'] . '" class="btn btn-warning btn-icon-split">';
                                                                                        echo '<span class="text" style="font-weight:bold;">編輯</span>';
                                                                                        echo '</a>';
                                                                                        ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <?php
                                                                                        echo '<a href="student-delete.php?m_id=' . $row['m_id'] . '" class=" btn btn-danger btn-icon-split ">';
                                                                                        echo '<span class="text" style="font-weight:bold;">刪除</span>';
                                                                                        echo '</a>';
                                                                                        ?>
                                                                                    </td>
                                                                    </tr>
                                                        <?php
                                                                                }
                                                                            }
                                                                        } ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>



                                                <!-- ==============學生換班================= -->
                                                <form class="user" method="post" action="class-change.php">
                                                    <div class="card shadow mb-4">
                                                        <div class="card-header py-3">
                                                            <h6 class="m-0 font-weight-bold text-primary">學生換班</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <h6 class="m-0 font-weight-bold text">換班資訊</h6>
                                                                <div class="card-body">
                                                                    貼心提醒:適用於二年級升上三年級，低中高年級之分班與轉班情況。
                                                                    <hr>
                                                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    <label>
                                                                                        <input type="checkbox" name="all" onclick="check_all(this,'m_id[]')" />
                                                                                        <!-- 美化 -->
                                                                                        <!-- 全選/全不選 -->
                                                                                        選取
                                                                                    </label>
                                                                                    <!-- </th> -->
                                                                                <th>學號</th>
                                                                                <th>姓名</th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            <tr>
                                                                                <?php

                                                                                $result = "SELECT * FROM members where class_no = $class_no AND identity='S'";
                                                                                $retval = mysqli_query($link, $result);
                                                                                if ($retval) {
                                                                                    $num = mysqli_num_rows($retval);

                                                                                    if (mysqli_num_rows($retval) > 0) {
                                                                                        while ($row = mysqli_fetch_assoc($retval)) { ?>
                                                                                            <!-- <td><input type="checkbox" name="c" value="" /></td> -->
                                                                                            <?php
                                                                                            //$class_no = $_GET['class_no'];
                                                                                            //echo "<th> <input type=cheakbox name=change></th>";
                                                                                            //echo "<td><input type=\"checkbox\" id=\"cbox1\" value=\"first_checkbox\"></input></td>\n";
                                                                                            echo '<td><input type="checkbox" name="m_id[]" value="' . $row['m_id'] . '"></input></td>';
                                                                                            echo "<th>" . $row["m_id"] . "</th>";
                                                                                            echo "<th>" . $row["m_name"] . "</th>";
                                                                                            ?>
                                                                            </tr>
                                                                <?php
                                                                                        }
                                                                                    }
                                                                                } ?>

                                                                <div class="form-group row">
                                                                    <div class="col-sm-3 "></div>
                                                                    <div class="col-sm-6 ">
                                                                        <H6>班級:</H6>
                                                                        <select name="class_no" id="class_no" class="form-control selections" required>
                                                                            <option value="">請選擇要轉的班級</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-3 "></div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-3 "></div>
                                                                <div class="col-sm-6 ">
                                                                    <!-- <a href="student-maintain.php" class="btn btn-warning btn-user btn-block">
                                                                    
                                                                </a> -->
                                                                    <button class="btn btn-warning btn-user btn-block" type="submit" name="buttonSave" id="button" value="送出">確認修改</button>
                                                                </div>
                                                </form>
                                                <div class="col-sm-3 "></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Footer -->
    <?php //include("footer.php"); 
    ?>
    <!-- End of Footer -->




    </div>

    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Footer -->
    <?php //include("footer.php"); 
    ?>
    <!-- End of Footer -->
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
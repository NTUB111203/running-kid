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

    <title>學生管理</title>

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
                                            <!-- DataTales 學生成員 -->
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-primary">編輯學生資料</h6>
                                                    <!-- 一個班級一個表格or全部學生一個表格or 按下班級的人數再顯現學生清單 -->
                                                </div>

                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <!-- <h6 class="m-0 font-weight-bold text-primary">班級管理</h6>         -->
                                                        <div class="row justify-content-end">
                                                            <a href="student-add.html" class="btn btn-success btn-icon-split ">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span class="text" style="font-weight:bold;">新增學生</span>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <input type="checkbox" name="all" onclick="check_all(this,'c')">
                                                                            <!-- 美化 -->
                                                                            <!-- 全選/全不選 -->
                                                                            選取
                                                                            </a>
                                                                        </th>
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
                                                                        $class_no = $_GET['class_no'];
                                                                        $result = "SELECT * FROM members where class_no= $class_no AND identity='S'";
                                                                        $retval = mysqli_query($link, $result);
                                                                        if ($retval) {
                                                                            $num = mysqli_num_rows($retval);
                                                                            if (mysqli_num_rows($retval) > 0) {
                                                                                while ($row = mysqli_fetch_assoc($retval)) {

                                                                                    echo "<th>";
                                                                                    echo "<th>" . $row["m_id"] . "</th>";
                                                                                    echo "<th>" . $row["m_name"] . "</th>";
                                                                                    echo "<th>" . $row["gender"] . "</th>";
                                                                                    echo "<th>" . $row["birthday"] . "</th>";
                                                                                    echo "<th>" . $row["phone"] . "</th>";
                                                                                    echo "<th>" . $row["mail"] . "</th>";
                                                                                    echo "<th>" . $row["enrollment"] . "</th>";
                                                                                    // echo "<td> <button type=\"button\" onclick='location.href=\"student-edit.html?id=". $row->m_id."\"'>更新</button></td>";
                                                                        ?>
                                                                                    <td>
                                                                                        <?php
                                                                                        echo '<a href="student-edit.html?m_id=' . $row['m_id'] . '" class="btn btn-warning btn-icon-split">';
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


                                                        <?php         }
                                                                            }
                                                                        } ?>

                                                        <!-- <td>Tiger Nixon</td> -->


                                                        <!-- href到修改介面 -->


                                                        <!-- <tr>                                                    
                                                <td>Javascript Developer</td>
                                                <td>San Francisco</td>
                                                <td>女</td>
                                                <td>2009/09/15</td>
                                                <td>
                                                    <a href="student-edit.html"
                                                        class="btn btn-warning btn-icon-split ">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        <span class="text">編輯學生</span>
                                                    </a>
                                                </td>
                                            </tr> -->

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">學生換班</h6>
                                                        <!-- 一個班級一個表格or全部學生一個表格or 按下班級的人數再顯現學生清單 -->
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="card  mb-4">
                                                                    <div class="card-header py-3">
                                                                        <h6 class="m-0 font-weight-bold text">換班資訊</h6>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        貼心提醒:適用於二年級升上三年級，低中高年級之分班情況，與轉校換班。
                                                                        <hr>
                                                                        <form class="user">
                                                                            <div class="form-group row">
                                                                                <div class="col-sm-3 "></div>
                                                                                <div class="col-sm-6 ">

                                                                                    <!-- 
                                                                                    <select name="grade" id="grade" class="form-control selections">
                                                                                        <option value='請選擇'>請選擇學校</option>

                                                                                         <?php
                                                                                            //echo "hi";
                                                                                            ?> 

                                                                                    </select> -->

                                                                                </div>
                                                                                <div class="col-sm-3 "></div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-3 "></div>
                                                                                <div class="col-sm-6 ">
                                                                                    <H6>年級:</H6>
                                                                                    <select name="grade" id="grade" class="form-control selections">

                                                                                        <option value="$result['local']">請選擇年級
                                                                                        <option value="1">一年級
                                                                                        <option value="2">二年級
                                                                                        <option value="3">三年級
                                                                                        <option value="4">四年級
                                                                                        <option value="5">五年級
                                                                                        <option value="6">六年級
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-sm-3 "></div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                                <div class="col-sm-3 "></div>
                                                                                <div class="col-sm-6 ">
                                                                                    <H6>班別:</H6>
                                                                                    <input name="class" id="class" class="form-control selections">
                                                                                </div>
                                                                                <div class="col-sm-3 "></div>
                                                                            </div>
                                                                        </form>


                                                                        <?
                                                                        // mysql_select_db($dbName);//開啟資料庫，這邊這行會很多餘嗎？ 
                                                                        // 14	 
                                                                        // 15	$str="SELECT `local` FROM `0227_postofficenum`";//主要是希望0227_postofficenum這張資料表的local欄位資料全部進入下拉式選單... 
                                                                        // 16	$result=mysql_query($str);//sql查詢結果 
                                                                        // 17	$result=mysql_fetch_assoc($result);//將sql查詢結果轉為陣列再度存回result 
                                                                        // 18	
                                                                        ?>

                                                                        <?
                                                                        // do 
                                                                        // { 
                                                                        // echo "<option value=$result['local']>"; 
                                                                        // echo $result['local']; 
                                                                        // echo "</option>"; 
                                                                        // }while($result=mysql_fetch_assoc($result)); 
                                                                        ?>

                                                                    </div>
                                                                    <div class="col-sm-3 "></div>
                                                                </div>

                                                                </form>
                                                                <!-- <form>
                                                <input id="a" type="radio" name="hopping" value="a" checked >
                                                <label for="a"><span></span>無</label><br>
                                                <input id="b" type="radio" name="hopping" value="b">
                                                <label for="b"><span></span>上升一個年級</label>                                            
                                            </form> -->
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">

                                                            <div class="col-sm-3 "></div>
                                                            <div class="col-sm-6 ">

                                                                <a href="student-maintain.php" class="btn btn-warning btn-user btn-block">
                                                                    確認修改
                                                                </a>
                                                            </div>
                                                            <div class="col-sm-3 "></div>
                                                        </div>
                                                    </div>

                                                    <!-- <div class="col-lg-6">
                                                                <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th></th>
                                                                            <th>姓名</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr> -->
                                                    <?php

                                                    // $result = "SELECT * FROM members where class= " . $_GET["class"];

                                                    // $retval = mysqli_query($link, $result);

                                                    // if ($retval) {
                                                    //     $num = mysqli_num_rows($retval);

                                                    //     if (mysqli_num_rows($retval) > 0) {
                                                    //         while ($row = mysqli_fetch_assoc($retval)) {
                                                    //             echo "<td><input type=\"checkbox\" id=\"cbox1\" value=\"first_checkbox\"></input></td>\n";
                                                    //             echo "<th>" . $row["m_name"] . "</th>";
                                                    //             echo '</tr>';
                                                    //         }
                                                    //     }
                                                    // }
                                                    ?>

                                                    </tbody>
                                                    </table>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <!-- <hr>
                        <div class="form-group row">
                            <div class="col-sm-3 "></div>
                            <div class="col-sm-6 ">

                                <a href="student-maintain.html" class="btn btn-warning btn-user btn-block">
                                    回到班級列表
                                </a>
                            </div>
                            <div class="col-sm-3 "></div>
                        </div> -->
                                </div>
                            </div>
                            <div class="row">
                                <!--                         
                <hr>
                <div class="form-group row">
                    <div class="col-sm-3 "></div>
                    <div class="col-sm-6 ">

                        <a href="student-maintain.html" class="btn btn-warning btn-user btn-block">
                            回到班級列表
                        </a>
                    </div>
                    <div class="col-sm-3 "></div>
                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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
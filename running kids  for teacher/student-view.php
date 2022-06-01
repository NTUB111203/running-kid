<?php
/*連接資料庫*/
require_once 'DataBase.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="../Logo/logo-pink.png" type="image/x-icon">
    <title>running kids for teacher</title>

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

    <?php include("sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">郭明諭老師</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
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
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>會員編號</th>
                                                        <th>姓名</th>
                                                        <th>性別</th>
                                                        <th>生日</th>
                                                        <th>電話</th>
                                                        <th>信箱</th>
                                                        <th>入學年</th>
                                                        <th></th>
                                                        <!-- <th>班級</th> -->
                                                        <!-- <th>學號</th>
                                                        <th>姓名</th>
                                                        <th>性別</th>
                                                        <th>生日</th>
                                                        <th>
                                                            <a href="student-add.html"
                                                                class="btn btn-success btn-icon-split ">
                                                                <span class="icon text-white-50">
                                                                    <i class="fas fa-check"></i>
                                                                </span>
                                                                <span class="text">新增學生</span>
                                                            </a>
                                                        </th> -->
                                                    </tr>
                                            </thead>                                            
                                            <tbody>
                                                <tr>
                                                    <?php
                                                        $result = "SELECT * FROM members where class= '201'";
    
                                                        $retval=mysqli_query($link, $result); 
                                                        
                                                        if ($retval) {
                                                            $num = mysqli_num_rows($retval);
                                                           
                                                               if (mysqli_num_rows($retval) > 0) {
                                                                while ($row = mysqli_fetch_assoc($retval)) {
                                                                    
                                                                    echo "<th>".$row["m_id"]."</th>";
                                                                    echo "<th>".$row["m_name"]."</th>";
                                                                    echo "<th>".$row["gender"]."</th>";
                                                                    echo "<th>".$row["birthday"]."</th>";
                                                                    echo "<th>".$row["phone"]."</th>";
                                                                    echo "<th>".$row["mail"]."</th>";
                                                                    echo "<th>".$row["enrollment"]."</th>";
                                                                   // echo "<td> <button type=\"button\" onclick='location.href=\"student-edit.html?id=". $row->m_id."\"'>更新</button></td>";
                                                                    echo "<td>\n";
                                                                    echo "<a href=\"student-edit.html\" class=\"btn btn-warning btn-icon-split \">\n";
                                                                    echo "<span class=\"icon text-white-50\">\n";
                                                                    echo "<i class=\"fas fa-exclamation-triangle\"></i>\n";
                                                                    echo "</span>\n";
                                                                    echo "<span class=\"text\">編輯學生</span>\n";
                                                                    echo "</a>\n";
                                                                    echo "</td>\n";
                                                                    echo "<tr>";
                                                                }
                                                            }
                                                        }
                                                        ?>
    
                                                        <!-- <td>Tiger Nixon</td> -->
                                                        
                                                      
                                                        <!-- href到修改介面 -->
                                                    </tr>
                                                    
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


                                                                <select name="grade" id="grade" class="form-control selections">
                                                                <option value = '請選擇'>請選擇</option>
                                                                
                                                                    <!-- <option value="">請選擇學校
                                                                    <option value=".$row["s_name"].">.$row["s_name"].
                                                                    <option value="學校2">學校2
                                                                    <option value="學校3">學校3
                                                                    <option value="學校4">學校4
                                                                    <option value="學校5">學校5 -->
                                                                </select>
                                                                 
                                                            </div>
                                                            <div class="col-sm-3 "></div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-3 "></div>
                                                            <div class="col-sm-6 ">
                                                                <select name="grade" id="grade"
                                                                    class="form-control selections">
                                                                    
                                                                    <option value="$result['local']">請選擇年級
                                                                    <option value="一年級">一年級
                                                                    <option value="二年級">二年級
                                                                    <option value="三年級">三年級
                                                                    <option value="四年級">四年級
                                                                    <option value="五年級">五年級
                                                                    <option value="六年級">六年級
                                                                    <option value="畢業生">畢業生
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3 "></div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 "></div>
                                                            <div class="col-sm-6 ">
                                                                <select name="grade" id="grade"
                                                                    class="form-control selections">
                                                                    
                                                                    <?
                                                                    // mysql_select_db($dbName);//開啟資料庫，這邊這行會很多餘嗎？ 
                                                                    // 14	 
                                                                    // 15	$str="SELECT `local` FROM `0227_postofficenum`";//主要是希望0227_postofficenum這張資料表的local欄位資料全部進入下拉式選單... 
                                                                    // 16	$result=mysql_query($str);//sql查詢結果 
                                                                    // 17	$result=mysql_fetch_assoc($result);//將sql查詢結果轉為陣列再度存回result 
                                                                    // 18	?> 
                                                                    // ?>
                                                                    // <? 
                                                                    // do 
                                                                    // { 
                                                                    // echo "<option value=$result['local']>"; 
                                                                    // echo $result['local']; 
                                                                    // echo "</option>"; 
                                                                    // }while($result=mysql_fetch_assoc($result)); 
                                                                    ?> 
                                                                    <option value="">請選擇班級
                                                                    <option value="一班">一班
                                                                    <option value="二班">二班
                                                                    <option value="三班">三班
                                                                    <option value="四班">四班
                                                                    <option value="五班">五班
                                                                    <option value="六班">六班
                                                                </select>
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

                                                    <a href="student-maintain.html"
                                                        class="btn btn-warning btn-user btn-block">
                                                        確認修改
                                                    </a>
                                                </div>
                                                <div class="col-sm-3 "></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <table class="table table-bordered" id="dataTable" width="50%"
                                                cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>姓名</th>
                                                    </tr>
                                                </thead>                                                
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        $result = "SELECT * FROM members where class='201'";
    
                                                        $retval=mysqli_query($link, $result); 
                                                        
                                                        if ($retval) {
                                                            $num = mysqli_num_rows($retval);
                                                           
                                                               if (mysqli_num_rows($retval) > 0) {
                                                                while ($row = mysqli_fetch_assoc($retval)) {
                                                                    echo "<td><input type=\"checkbox\" id=\"cbox1\" value=\"first_checkbox\"></input></td>\n";                                                           
                                                                    echo "<th>".$row["m_name"]."</th>";
                                                                    echo '</tr>';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                       
                                                </tbody>

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
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> -->
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
    <script src="js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
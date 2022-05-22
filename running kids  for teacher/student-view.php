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

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

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
                                                    <th>編號</th>
                                                        <th>姓名</th>
                                                        <th>性別</th>
                                                        <th>電話</th>
                                                        <th>信箱</th>
                                                        <th>入學年</th>
                                                        <th></th>
                                                        
                                                    </tr>
                                            </thead>                                            
                                            <tbody>
                                                <tr>
                                                    <?php
                                                        $result = "SELECT * FROM members";

                                                        $retval=mysqli_query($link, $result); 
                                                        
                                                        if ($retval) {
                                                            $num = mysqli_num_rows($retval);
                                                            
                                                                if (mysqli_num_rows($retval) > 0) {
                                                                while ($row = mysqli_fetch_assoc($retval)) {
                                                                    
                                                                    echo "<th>".$row["m_id"]."</th>";
                                                                    echo "<th>".$row["m_name"]."</th>";
                                                                    echo "<th>".$row["gender"]."</th>";
                                                                    echo "<th>".$row["phone"]."</th>";
                                                                    echo "<th>".$row["mail"]."</th>";
                                                                    echo "<th>".$row["enrollment"]."</th>";
                                                                    echo "<td>\n";
                                                                    echo "<a href=\"student-edit.html\" class=\"btn btn-warning btn-icon-split \">\n";
                                                                    echo "<span class=\"icon text-white-50\">\n";
                                                                    echo "<i class=\"fas fa-exclamation-triangle\"></i>\n";
                                                                    echo "</span>\n";
                                                                    echo "<span class=\"text\">編輯學生</span>\n";
                                                                    echo "</a>\n";
                                                                    echo "</td>\n";
                                                                    // echo "<td> <button type=\"button\" onclick='location.href=\"student-edit.html?id=". $row->m_id."\"'>更新</button></td>";
                                                                    echo '</tr>';
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

                                                            <?php
                                                        $result = "SELECT * FROM school";
    
                                                        $retval=mysqli_query($link, $result); 
                                                        
                                                        if ($retval) {
                                                            $num = mysqli_num_rows($retval);
                                                           
                                                               if (mysqli_num_rows($retval) > 0) {
                                                                while ($row = mysqli_fetch_assoc($retval)) {
                                                                    
                                                                    echo "<th>".$row["s_name"]."</th>";
                                                                    echo '</tr>';
                                                                    // echo "<option value=\".$row[\"s_name\"].\">.$row[\"s_name\"].\n";
                                                                }
                                                            }
                                                        }
                                                        ?>

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
                                                        $result = "SELECT * FROM members";
    
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
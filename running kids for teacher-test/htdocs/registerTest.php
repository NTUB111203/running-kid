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

    <link rel="icon" href="../Logo/logo-pink.png" type="image/x-icon" />
    <title>會員註冊</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->


  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Topbar -->
          <nav
            class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
          >
            <!-- Sidebar Toggle (Topbar) -->
            <button
              id="sidebarToggleTop"
              class="btn btn-link d-md-none rounded-circle mr-3"
            >
              <i class="fa fa-bars"></i>
            </button>

            <!-- Logo -->
            <div class="sidebar-brand-icon rotate-n-15">
              <img src="Logo/logo-pink.png" width="50px" />
            </div>
            <div class="sidebar-brand-text mx-3">孩是要運動</div>

            <!-- Topbar Search -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="searchDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div
                  class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                  aria-labelledby="searchDropdown"
                >
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input
                        type="text"
                        class="form-control bg-light border-0 small"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
          </nav>
          <!-- End of Topbar -->

          <!-- /.container-fluid -->
          <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-9">
              <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row">
                    <!-- <div
                      class="col-lg-6 d-none d-lg-block bg-login-image1"
                    ></div> -->
                    <div class="col-lg-12">
                      <div class="p-5">
                        <div class="text-center">
                          <h1 class="h4 text-gray-900 mb-4">會員註冊</h1>
                        </div>
                        
                        <!-- 篩選出學校 -->
                        <?php 
                          // $result = "SELECT * FROM school ";
                          // $retval=mysqli_query($link, $result);
                          // if ($retval) {
                          //   $num = mysqli_num_rows($retval);
                          //   if (mysqli_num_rows($retval) > 0) {
                          //     while ($rowSchool = mysqli_fetch_assoc($retval)) {
                          //       echo "<option>".$rowSchool["sch_name"]."</option>";
                          //     }
                          //   }
                          // } 
                        ?> 
                        <!-- 篩選出學校 -->

                        <div
                          class="user"
                        >

                        <!-- 篩選出學校結合選單 -->
                        <div class="form-group">
                          <select name="sch_name" id="sch_name" class="form-control selections" required>
                            <option value="">請選擇學校</option>
                            <?php 
                          $result = "SELECT * FROM school ";
                          $retval=mysqli_query($link, $result);
                          
                          if ($retval) {
                            $num = mysqli_num_rows($retval);
                            if (mysqli_num_rows($retval) > 0) {
                              while ($rowSchool = mysqli_fetch_assoc($retval)) {
                                echo "<option value=".$rowSchool["$sch_no"].">".$rowSchool["sch_name"]."</option>";
                              }
                            }
                          } 
                        ?> 
                          </select>
                        </div>
                        <!-- 篩選出學校結合選單 -->

                        <div class="form-group">
                          <select
                            name="sch_name"
                            id="sch_name"
                            class="form-control selections"
                            required
                          >
                            <option value="">請選擇學校</option>
                            <?
                            $sql = "SELECT DISTINCT sch_name FROM school";//DISTINCT可選出欄位中具有不同名稱的資料，本例中會挑出TV與Player
                            $result = mysqli_query($link, $sql) or die("資料選取錯誤！".mysqli_error($link));
                            while($data=mysqli_fetch_assoc($result)){?>
                            <option value="<?echo $data['sch_name'];?>"><?echo $data['sch_name'];?></option>
                            <?
                            }
                            ?>
                            
                          </select>
                        </div>

                        <div class="form-group">
                          <select
                            type="text"
                            class="form-control form-control-user"
                            name="class_no"
                            id="class_no"
                            value=""
                            
                            required
                          >
                          <option value="">請輸入您的處室或班級</option>
                          </select>
                        </div>

                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control form-control-user"
                            name="m_id"
                            id="m_id"
                            value=""
                            placeholder="請輸入您的教師編號"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <input
                            type="text"
                            class="form-control form-control-user"
                            name="mail"
                            id="mail"
                            value=""
                            placeholder="請輸入您的帳號(請使用學校信箱)"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control form-control-user"
                            name="password"
                            id="password"
                            value=""
                            placeholder="請輸入您的密碼(輸入8~12位數，須同時包含英文或數字)"
                            autocomplete="off"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <input
                            type="password"
                            class="form-control form-control-user"
                            name="repassword"
                            id = "repassword"
                            value=""
                            placeholder="再次輸入密碼"
                            autocomplete="off"
                            required
                          />
                        </div>

                        <div class="form-group">
                          <select name="identity" 
                                  class="form-control selections"
                                  id="identity" 
                                  required >                                            
                            <option value="">身分</option>
                            <option value="PE">體育組公用</option>
                            <option value="T">導師</option>
                        </select>
                        </div>

                        <div class="form-group">
                          <input 
                            type="text" 
                            class="form-control form-control-user" 
                            name="m_name"  
                            id = 'm_name'
                            value="" 
                            placeholder="姓名"required
                          />
                        </div>

                        <!-- <div class="form-group">
                          <select name="gender" 
                                  class="form-control selections"
                                  id="gender"
                                  required >                                            
                            <option value="">性別</option>
                            <option value="F">女生</option>
                            <option value="M">男生</option>
                        </select>
                        </div>

                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" 
                          name="phone" id="phone" value="" placeholder="電話"required>
                        </div>

                      

                        <div class="form-group">
                          <input type="date" class="form-control form-control-user" 
                            name="birthday" id="birthday" value="" placeholder="生日"required>
                        </div> -->
                
                        <button class="btn btn-primary btn-user btn-block" onclick="validateForm()">註冊</button>
                         
                                      </div>

                       
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <!-- <span>Copyright &copy; Your Website 2021</span> -->
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
    <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select "Logout" below if you are ready to end your current session.
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-secondary"
              type="button"
              data-dismiss="modal"
            >
              Cancel
            </button>
            <a class="btn btn-primary" href="login_index.php">Logout</a>
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

 <!-- Page level plugins -->
 <script src="vendor/chart.js/Chart.min.js"></script>
 <script src="vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <!-- <script src="js/demo/datatables-demo.js"></script> -->
  </body>
</html>

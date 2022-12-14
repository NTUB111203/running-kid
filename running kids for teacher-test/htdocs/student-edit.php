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

    <title>學生基本資料編輯</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .selections {
            border-radius: 10rem;
            height: calc(2em + 1.25rem);
            font-size: 0.8rem;
        }
    </style>

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
                                <h1 class="h4 text-gray-900 mb-4">學生基本資料編輯</h1>
                            </div>

                            <form class="user" method="POST" action="student-update.php">

                                <?php
                                $m_id = $_GET['m_id'];
                                $result = "SELECT * FROM members WHERE m_id = '$m_id'";
                                // $result = "SELECT * FROM class";
                                $retval = mysqli_query($link, $result);

                                if ($retval) {
                                    $num = mysqli_num_rows($retval);

                                    if (mysqli_num_rows($retval) > 0) {
                                        while ($row = mysqli_fetch_assoc($retval)) {
                                            // $m_id = $_GET['m_id'];
                                            $m_id =  $row["m_id"];
                                            $m_name =  $row["m_name"];
                                            $gender =  $row["gender"];
                                            $birthday =  $row["birthday"];
                                        }
                                    }
                                }
                                ?>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <H6>學號:</H6>
                                        <?php echo "<input type='text' class='form-control form-control-user' name='m_id' id='m_id' value='$m_id' require/>" ?>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <H6>姓名:</H6>
                                        <?php echo "<input type='text' class='form-control form-control-user' name='m_name' id='m_name' value='$m_name' require/>"
                                        ?>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <H6>性別:</H6>
                                        <?php echo "<select name='gender' id='gender' class='form-control selections' value='$gender' require/>"
                                        ?>
                                        <option value="">
                                        <option value="F" <?= $gender == 'F' ? ' selected="selected"' : ''; ?>>女生</option>
                                        <option value="M" <?= $gender == 'M' ? ' selected="selected"' : ''; ?>>男生</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <H6>生日:</H6>
                                        <?php echo "<input type='text' class='form-control form-control-user' name='birthday' id='birthday' value='$birthday' require/>"
                                        ?>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <hr>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-1 ">
                                        <a href="student-view.php" class="btn btn-warning btn-user btn-block">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 ">

                                        <button type="submit" class="btn btn-warning btn-user btn-block">確認修改</button>
                                        <!-- <a href="student-update.php" class="btn btn-warning btn-user btn-block">
                                            確認修改
                                        </a> -->
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>



                            </form>
                        </div>
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
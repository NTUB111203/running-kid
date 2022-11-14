<?php
require_once 'DataBase.php';

$class_no = $_GET['class_no'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>班級編輯</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .selections {
            border-radius: 10rem;
            height: calc(2rem + 1.25rem);
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
                                <h1 class="h4 text-gray-900 mb-4">班級編輯</h1>
                            </div>

                            <form class="user" method="POST" action="class-update.php">
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">

                                        <H6>學年度:</H6>
                                        <input type="text" class="form-control form-control-user" name="semester" id="semester" value="" />
                                        <!-- placeholder="學年度:110、109" required />  -->
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <H6>年級:</H6>
                                        <select name="grade" id="grade" class="form-control selections">
                                            <option value="">
                                            <option value="1">一年級
                                            <option value="2">二年級
                                            <option value="3">三年級
                                            <option value="4">四年級
                                            <option value="5">五年級
                                            <option value="6">六年級
                                                <!-- <option value="畢業生">畢業生 -->
                                        </select>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <H6>班別:</H6>
                                        <input type="text" class="form-control form-control-user" name="class" id="class" value="" />
                                        <!-- placeholder="班別 : 甲班、二班、01" required  -->
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-1 ">
                                        <a href="class-maintain.php" class="btn btn-warning btn-user btn-block">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 ">

                                        <button type="submit" class="btn btn-warning btn-user btn-block">
                                            確認編輯班級
                                        </button>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>


                                <tobody>
                                    <?php
                                    $result = "SELECT * FROM class WHERE class_no = '$class_no'";
                                    // $result = "SELECT * FROM class";
                                    $retval = mysqli_query($link, $result);

                                    if ($retval) {
                                        $num = mysqli_num_rows($retval);

                                        if (mysqli_num_rows($retval) > 0) {
                                            while ($row = mysqli_fetch_assoc($retval)) {
                                                echo "<tr>" . $row["semester"] . "</tr>";
                                                echo "<th>" . $row["grade"] . "</th>";
                                                echo "<tr>" . $row["class"] . "</tr>";
                                            }
                                        }
                                    }
                                    ?>
                                </tobody>

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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->

</body>

</html>
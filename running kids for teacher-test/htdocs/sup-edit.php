<?php
require_once 'DataBase.php';

$sup_no = $_GET['sup_no'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>編輯供應商</title>

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

        input[type="file"] {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            /* margin: -1px; */
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 18px 12px;
            cursor: pointer;
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
                                <h1 class="h4 text-gray-900 mb-4">供應商編輯</h1>
                            </div>

                            <form class="user" method="post" action="sup-update.php">
                                <thead>
                                    <?php
                                    $result = "SELECT * FROM gift_supplier WHERE sup_no = '$sup_no'";
                                    $retval = mysqli_query($link, $result);

                                    if ($retval) {
                                        $num = mysqli_num_rows($retval);

                                        if (mysqli_num_rows($retval) > 0) {
                                            while ($row = mysqli_fetch_assoc($retval)) {
                                                $_SESSION['sup_no'] = $row["sup_no"];
                                                $sup_name =  $row["sup_name"];
                                                $sup_tel =  $row["sup_tel"];
                                            }
                                        }
                                    }
                                    ?>

                                    <div class="form-group row">
                                        <div class="col-sm-3 "></div>
                                        <div class="col-sm-6 ">
                                            <h6>供應商名稱</h6>
                                            <?php echo "<input type='text' class='form-control form-control-user' name='sup_name' id='sup_name' value='$sup_name' require/>" ?>

                                        </div>
                                        <div class="col-sm-3 "></div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-3 "></div>
                                        <div class="col-sm-6 ">
                                            <h6>供應商電話</h6>
                                            <?php echo "<input type='text' class='form-control form-control-user' name='sup_tel' id='sup_tel' value='$sup_tel' require/>" ?>
                                        </div>
                                        <div class="col-sm-3 "></div>
                                    </div>
                                </thead>



                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-1 ">
                                        <a href="supplier.php" class="btn btn-warning btn-user btn-block">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 ">



                                        <button type="submit" class="btn btn-warning btn-user btn-block">確認編輯禮品</button>

                                        </a>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>
                                </tobody>


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
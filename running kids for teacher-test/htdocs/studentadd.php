<?php
/*連接資料庫*/
require_once 'DataBase.php';

session_start();
$m_name = $_SESSION["m_name"];
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

    <title>新增學生</title>

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
    <script>
        window.onload = function getSchool() {
            $.ajax({
                type: "POST",
                url: "getRow.php",
                dataType: "json",
                data: {
                    name: "schoolList"
                },

                success: function(res) {
                    $.each(res, function(index, val) {
                        $("#sch_no").append(
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
                                <h1 class="h4 text-gray-900 mb-4">新增學生</h1>
                            </div>

                            <form class="user" method="POST" action="student-add.php">

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <h6>學號</h6>
                                        <input type="text" class="form-control form-control-user" name="m_id" id="m_id" value="" required />
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <h6>姓名</h6>
                                        <input type="text" class="form-control form-control-user" name="m_name" id="m_name" value="" required />
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <h6>性別</h6>
                                        <select name="gender" class="form-control selections" required>
                                            <option value="">
                                            <option value="F">女生
                                            <option value="M">男生
                                        </select>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <h6>生日</h6>
                                        <input type="text" class="form-control form-control-user" name="birthday" id="birthday" value="" placeholder="XXXX-XX-XX" required />
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

                                        <button type="submit" class="btn btn-warning btn-user btn-block">
                                            確認新增學生
                                        </button>

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
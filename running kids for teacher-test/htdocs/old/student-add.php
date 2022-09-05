
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
    <style>
        .selections{
            border-radius: 10rem;
            height: calc(2em + 1.25rem );
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
                                <h1 class="h4 text-gray-900 mb-4">新增學生</h1>
                            </div>
                            
                            <form class="user" action='select-test.php'>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="學號">
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="姓名">
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <select name="grade" id="grade" class="form-control selections" >                                            
                                            <option >性別
                                            <option value="女生">女生
                                            <option value="男生">男生
                                        </select>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="生日">
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

                                        <input type="submit" name="submit2" value="確認新增">
                                        
   
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
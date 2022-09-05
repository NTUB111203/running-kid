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

    <title>新增班級</title>

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
            height: calc(2rem + 1.25rem );
            font-size: 0.8rem;
        }
    </style>
    
</head>

<?php
$sql = "INSERT INTO  `class` (`semester`,`grade`, `class`)";
$sql = "UPDATE  `user`  = '557gfg', `name`='87dd' WHERE `id`= 6;";
$result = mysqli_query($link,$sql);

// 如果有異動到資料庫數量(更新資料庫)
if (mysqli_affected_rows($link)>0) {
// 如果有一筆以上代表有更新

// mysqli_insert_id可以抓到第一筆的id
$new_id= mysqli_insert_id ($link);
echo "新增後的id為 {$new_id} ";
}
elseif(mysqli_affected_rows($link)==0) {
    echo "無資料新增";
}
else {
    echo "{$sql} 語法執行失敗，錯誤訊息: " . mysqli_error($link);
}
 mysqli_close($link);     
 ?>



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
                                <h1 class="h4 text-gray-900 mb-4">新增班級</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <select name="grade" id="grade" class="form-control selections" >                                            
                                            <option value="">請選擇年度
                                            <option value="學校1">109
                                            <option value="學校2">110
                                            <option value="學校3">111
                                        </select>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <select name="grade" id="grade" class="form-control selections" >                                            
                                            <option value="">請選擇年級
                                            <option value="一年級">一年級
                                            <option value="二年級">二年級
                                            <option value="三年級">三年級
                                            <option value="四年級">四年級
                                            <option value="五年級">五年級
                                            <option value="六年級">六年級
                                        </select>
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="班別 : 甲班、二班">
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

                                        <a href="class-maintain.php" class="btn btn-warning btn-user btn-block">
                                            確認新增班級
                                        </a>
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
<?php
/*連接資料庫*/
require_once 'DataBase.php';
$gift_no = $_GET['gift_no'];
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>禮物編輯</title>

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
    <script>
        window.onload = function getsup() {
            $.ajax({
                type: "POST",
                url: "getRow-sup.php",
                dataType: "json",
                data: {
                    name: "gift_supplierList"
                },

                success: function(res) {
                    $.each(res, function(index, val) {
                        $("#sup_no").append(
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
                                <h1 class="h4 text-gray-900 mb-4">禮品編輯</h1>
                            </div>

                            <form class="user" method="post" action="gift-update.php">

                                <?php
                                $gift_no = $_GET['gift_no'];
                                $result = "SELECT * FROM gift LEFT JOIN gift_supplier ON gift.gift_sup_no = gift_supplier.sup_no
                                           WHERE gift_no = '$gift_no'";
                                $retval = mysqli_query($link, $result);

                                if ($retval) {
                                    $num = mysqli_num_rows($retval);

                                    if (mysqli_num_rows($retval) > 0) {
                                        while ($row = mysqli_fetch_assoc($retval)) {
                                            echo "<th>" . $row["gift"] . "</th>";
                                            echo "<th>" . $row["exchange_points"] . "</th>";
                                            //echo "<th>".$row["gift_sup_no"]."</th>";
                                            echo "<th>" . $row['gift_description'] . "</th>";
                                            echo "<th>" . $row["sup_name"] . "</th>";
                                            //echo "<th>" . $row['sup_tel'] . "</th>";
                                        }
                                    }
                                }
                                ?>
                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-3 ">
                                        <h6>禮品名稱</h6>
                                        <?php echo "<input type='text' class='form-control form-control-user' name='gift' id='gift' value='$gift' required/>" ?>
                                        <!-- <input type="text" class="form-control form-control-user" name="gift" id="gift" value="" required /> -->
                                    </div>

                                    <div class="col-sm-3 ">
                                        <h6>兌換積分</h6>
                                        <?php echo "<input type='text' class='form-control form-control-user' name='exchange_points' id='exchange_points' value='$exchange_points' required/>" ?>
                                        <!-- <input type="text" class="form-control form-control-user" name="exchange_points" id="exchange_points" value="" required /> -->
                                    </div>
                                    <div class="col-sm-3 "></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-6 ">
                                        <h6>禮物供應商</h6>
                                        <select name="sup_no" id="sup_no" class="form-control selections" required>
                                            <option value="">請選擇供應商</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>

                                    <div class="col-sm-6 ">
                                        <h6>禮物描述</h6>
                                        <textarea id="w3review" class="form-control form-control-user" name="gift_description" id="gift_description" rows="1" cols="10"></textarea>
                                    </div>

                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-sm-4 "></div>
                                    
                                        <label for="file-upload" class="btn btn-info custom-file-upload selections col-sm-4 text-center align-center">
                                        <i class="fa fa-cloud-upload"></i> 上傳照片檔案
                                        </label>
                                        <input id="file-upload" type="file"/>
                                    
                                    <div class="col-sm-4 "></div>
                                </div> -->

                                <div class="form-group row">
                                    <div class="col-sm-3 "></div>
                                    <div class="col-sm-1 ">
                                        <a href="gift.php" class="btn btn-warning btn-user btn-block">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </div>
                                    <div class="col-sm-5 ">

                                        <button type="submit" class="btn btn-warning btn-user btn-block">確認新增禮品</button>

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

$result = "SELECT * FROM gift";

$retval=mysqli_query($link, $result);

//$gift_no = $_GET['gift_no'];
$result = "SELECT * FROM gift LEFT JOIN gift_supplier ON gift.gift_sup_no = gift_supplier.sup_no";
$retval=mysqli_query($link, $result);
if ($retval) {
$num = mysqli_num_rows($retval);

if (mysqli_num_rows($retval) > 0) {
while ($row = mysqli_fetch_assoc($retval)) {
echo "<th>".$row["gift"]."</th>";
echo "<th>".$row["exchange_points"]."</th>";
echo "<th>".$row["gift_sup_no"]."</th>";
echo "<th>".$row['gift_description']."</th>";
echo "<th>".$row["sup_name"]."</th>";
echo "<th>".$row['sup_tel']."</th>";
}
}
}




//$result = "UPDATE 'gift' SET 'exchange_points' = '200' WHERE (`gift_no` = '2')";
?>
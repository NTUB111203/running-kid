<?php
/*連接資料庫*/
require_once 'DataBase.php';

// Define variables and initialize with empty values
$m_id=$_POST["m_id"];
$password=$_POST["password"];
// $repassword=$_POST["repassword"];

//增加hash可以提高安全性
$password_hash=password_hash($password,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM members WHERE m_id ='".$m_id."'";
    $result=mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    // print_r(mysqli_fetch_assoc($result));
    if(mysqli_num_rows($result)==1 && $password==$row["password"]){
        // Store data in session variables
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["m_name"] = $row["m_name"];
        //這些是之後可以用到的變數
        //$_SESSION["id"] = mysqli_fetch_assoc($result)["id"];
        //$_SESSION["username"] = mysqli_fetch_assoc($result)["username"];
        header("location:index.php");
    }else{
        function_alert("帳號或密碼錯誤"); 
    }
}
else{
    function_alert("Something wrong"); 
}

// Close connection
mysqli_close($link);

function function_alert($message) { 
      
    // Display the alert box  window.location.href='index.php';
    echo "<script>alert('$message');
    window.history.back(); 
    </script>"; 
    return false;
} 
?>

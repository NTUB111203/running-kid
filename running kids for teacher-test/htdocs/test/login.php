<?php
// Include config file
$conn=require_once "Database.php";
 
// Define variables and initialize with empty values
$m_name=$_POST["m_name"];
$password=$_POST["password"];
//增加hash可以提高安全性
$password_hash=password_hash($password,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM members WHERE m_name ='".$m_name."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["password"]){
        session_start();
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        //這些是之後可以用到的變數
        $_SESSION["m_id"] = mysqli_fetch_assoc($result)["m_id"];
        $_SESSION["m_name"] = mysqli_fetch_assoc($result)["m_name"];
        header("location:welcome.php");
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
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    return false;
} 
?>
?>
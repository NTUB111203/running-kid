<?php
/*連接資料庫*/
require_once 'DataBase.php';

// Initialize the session
//session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;  //記得要跳出來，不然會重複轉址過多次
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>歡迎登入孩是要運動</title>
</head>
<body>
    <h1>登入</h1>
    <h2>你可以選擇登入或是註冊帳號~</h2>
<form method="post" action="login.php">
帳號：
<input type="text" name="m_id"><br/><br/>
密碼：
<input type="password" name="password"><br><br>
<input type="submit" value="登入" name="submit"><br><br>
<a href="register.html">還沒有帳號？現在就註冊！</a>
</form>
</body>
</html>

</html>
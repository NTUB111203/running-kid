<?php
require_once("DataBase.php");
print_r($_POST);
    $sch_no = $_POST['sch_no'];
    $m_name = $_POST['m_name'];
    $gender = isset($_POST['gender'])? $_POST['gender'] : 'F';
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $mail = $_POST['mail'];
    $birthday = $_POST['birthday'];
    $m_id = $_POST['m_id'];
	$password = $_POST['password'];
    $class = $_POST['class'];
	

$sql = "INSERT INTO members(sch_no,identity,m_name,gender,phone,mail,birthday,m_id,password,class) VALUES ('$sch_no','T','$m_name','$gender','$phone','$mail','$birthday'
,'$m_id','$password','$class')";

if(mysqli_query($link,$sql)){
    echo "註冊成功!!";
}else{
    echo"註冊失敗".mysqli_error($link);
}

//  $result = filterTable($sql1);   


//  echo "<script>";
//  echo "alert('成功註冊'); location.href='login.php'";
//  echo "</script>";

/*連接資料庫
 $conn=require_once 'DataBase.php';*/
 //$conn = mysqli_connect("140.131.114.154:3306","emily","@Tfboys806@","runningkids")

/*if($_SERVER["REQUEST_METHOD"]=="POST"){
    $m_id=$_POST["m_id"];
    $password=$_POST["password"];
    //檢查帳號是否重複
    $check="SELECT * FROM members WHERE m_id='".$m_id."'";
    if(mysqli_num_rows(mysqli_query($conn,$check))==0){
        $sql="INSERT INTO members (m_id, password)
            VALUES('".$m_id."','".$password."')";
        
        if(mysqli_query($conn, $sql)){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo "<a href='index.php'>未成功跳轉頁面請點擊此</a>";
            header("refresh:32;url=index.php");
            exit;
        }else{
            echo "Error creating table: " . mysqli_error($conn);
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo "<a href='register.html'>未成功跳轉頁面請點擊此</a>";
        header('HTTP/1.0 302 Found');
        //header("refresh:3;url=register.html",true);
        exit;
    }
}


mysqli_close($conn);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='index.php';
    </script>"; 
    
    return false;
} */
?>
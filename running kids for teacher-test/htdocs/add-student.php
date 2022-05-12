<?php
include "test/db_connect.php";             


$s_no=$_POST["s_no"];
$name=$_POST["m_name"];
$gender=$_POST["gender"];
$identity=$_POST["identity"];

/* 將欄位資料加入資料庫 */
$sql="INSERT INTO members (`s_no`,`my_name`,`gender`,`identity`)
VALUES ('$s_no','$my_name','$gender','$birth',now())";

$result =  mysqli_query($link,$sql);
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
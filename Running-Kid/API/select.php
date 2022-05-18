<?php
    session_start();
    
    $mysql_host="140.131.114.154";
    $mysql_user="emily";
    $mysql_pass="@Tfboys806@";
    $mysql_DB="runningkids";
    $DB=mysqli_connect($mysql_host,$mysql_user,$mysql_pass);

 
    if($DB){
        echo "已確定連線";
    }else{
        echo '無法連線Mysql資料庫：<br/>'.mysqli_connect_error();
    }


?>
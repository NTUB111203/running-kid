<?php

session_start();

	$host = "140.131.114.154";
	$user = "emily";
	$pd = "@Tfboys806@";
	$dbname = "runningkids";
	$link = mysqli_connect($host,$user,$pd,$dbname);
	if($link){
		echo "已確定連線";
	}else{
		echo '無法連線mysql資料庫:<br/>'.mysqli_connext_error();
	}
	
?>
	



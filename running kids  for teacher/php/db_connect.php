<?php

session_start();
function filterTable($query)
	{
		$dbType   = 'MySQL';
		$host     = '140.131.114.154';
		$dbName   = 'runningkids';
		$userName = 'emily';
		$pwd      = '@Tfboys806@';
		
		$dbh = mysqli_connect($host, $userName, $pwd, $dbName) or die("Error " . mysqli_error($dbh));
		//$dbh = mysqli_connect($host, $userName, $pwd, $dbName);
	    mysqli_query($dbh, "SET NAMES 'utf8'");
	    $filter_Result = mysqli_query($dbh, $query);
	    return $filter_Result;
	}

	function _fetch_array($sql) {
	// mysqli_connect('localhost','root','','darkcalamity');
	return mysqli_fetch_array(filterTable($sql));
	}


	function _alert($str,$path){
		echo "<script> alert(\"$str\");parent.location.href='$path';</script>";
	}



	function mailer($addres,$ver){


		require_once('PHPMailer_5.2.4/class.phpmailer.php');
			         $mail = new PHPMailer();
			         $mail->isSMTP();
			         $mail->SMTPAuth = true;
			         $mail->SMTPSecure = 'ssl';
			         $mail->Host = 'smtp.gmail.com';
			         $mail->Port = '465';
			         $mail->isHTML();
			         $mail->Username = 'DarkcalamityTM@gmail.com';
			         $mail->Password = 'dark099553';
			         $mail->SetFrom('no-reply@DarkCalamity.com');
			         $mail->Subject = "DarkCalamity";
			         $mail->Body = "<p>歡迎加入! 請點擊以下連結啟用帳號</p><a href='$ver'>按我啟用</a>";
			         $mail->AddAddress($addres);
			         $mail->Send();
}

	?>
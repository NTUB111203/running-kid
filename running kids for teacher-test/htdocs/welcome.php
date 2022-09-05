<?php
session_start();  //很重要，可以用的變數存在session裡
$m_id=$_SESSION["m_id"];
echo "<h1>你好 ".$m_id."</h1>";
echo "<a href='logout.php'>登出</a>";
    
?>
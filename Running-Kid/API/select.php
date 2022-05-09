<?php
    $CN=mysqli_connect("140.131.114.154","emily","@Tfboys806@");
    $DB=mysqli_select_db($CN,"runningkids");

    
    $r_no=$_POST('r_no');
    $m_id=$_POST('m_id');
    $r_datetime=$_POST('r_datetime');
    $distance = $_POST('distance');
    $c_no=$_POST('c_no');

    $getRecord="insert into record(r_no, m_id, r_dat) * from record";


?>
<?php
    $CN = mysqli_connect('140.131.114.154', 'emily', '@Tfboys806@', 'runningkids');
    $DB = mysqli_select_db($CN, 'runningkids');

    $EncodedData = file_get_contents('php://input');
    $DecodedData = json_decode($EncodedData, true);

   // $m_id = '194';
    //$sch_no = 1;
    //$m_name = 'dddfgfdf';
    //$class_no = 1;
    $m_id = $DecodedData['m_id'];
    $m_name = $DecodedData['m_name'];
    $sch_no = $DecodedData['sch_no'];
    $class_no = $DecodedData['class_no'];

    $insertMemberData = "insert into members(m_id,sch_no,m_name,class_no) values ('$m_id','$sch_no','$m_name','$class_no')";

    $register = mysqli_query($CN, $insertMemberData);

    if ($register) 
        $Message = "Member has been registered successfully";
    else 
        $Message = "Server Error... please try latter";

    $Response[] = array("Message" => $Message);
    echo json_encode($Response);
?>

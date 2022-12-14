<?php
include_once("DataBase.php");
if(isset($_POST['name'])){
    $getValue = $_POST['name'];
}else{
    $getValue = "";
}
    function getSchoolRow($link){
        $sql = "select * from school";
        $result = mysqli_query($link,$sql);
        $rows=[];
        while ($row=mysqli_fetch_row($result)){
            $rows[$row[0]]=$row[1];
        }
        
        return ($rows);
    }
    function getclassRow($sch_no,$link){
        $sql = "select * from class where sch_no ='$sch_no'";
        $result = mysqli_query($link,$sql);
        $row =[];
        while ($row=mysqli_fetch_row($result)){
            $rows[$row[0]]=$row[2].$row[3];
        }
        return $rows;
    }
// print_r(getSchoolRow($link));
switch ($getValue){
    case "schoolList":
        // echo getSchoolRow($link);
        echo json_encode(getSchoolRow($link));
        // echo getSchoolRow($link);
        break;
    case "classList":
        $sch_no = $_POST['sch_no'];
        echo json_encode(getClassRow($sch_no,$link));
        break;
} 

// echo json_encode($getValue);

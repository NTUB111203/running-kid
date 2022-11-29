<?php
include_once("DataBase.php");
if(isset($_POST['name'])){
    $getValue = $_POST['name'];
}else{
    $getValue = "";
}
    function getSupRow($link){
        $sql = "select * from gift_supplier";
        $result = mysqli_query($link,$sql);
        $rows=[];
        while ($row=mysqli_fetch_row($result)){
            $rows[$row[0]]=$row[1];
        }
        
        return ($rows);
    }
// print_r(getSchoolRow($link));
switch ($getValue){
    case "gift_supplierList":
        // echo getSchoolRow($link);
        echo json_encode(getSupRow($link));
        // echo getSchoolRow($link);
        break;
} 

// echo json_encode($getValue);
?>
<?php
include_once("DataBase.php");
if(isset($_POST['name'])){
    $getValue = $_POST['name'];
}else{
    $getValue = "";
}
    function getClassRow($link){
        // $sql = "select * from school";
        $sql = "select * from class";
        $result = mysqli_query($link,$sql);
        $rows=[];
        while ($row=mysqli_fetch_row($result)){
            $rows[$row[0]]=$row[2].$row[3];
        }
        
        return ($rows);
    }

    
// print_r(getClassRow($link));
switch ($getValue){
    case "classList":
        // echo getClassRow($link);
        echo json_encode(getClassRow($link));
        // echo getClassRow($link);
        break;
} 

// echo json_encode($getValue);
?>
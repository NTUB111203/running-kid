<?php
/*連接資料庫*/
require_once 'DataBase.php';
$result = "SELECT * FROM gift";
$id = $_GET['gift_no'];
$retval=mysqli_query($link, $result); 

//$gift_no = $_GET['gift_no'];
$result = "SELECT * FROM gift LEFT JOIN gift_supplier ON gift.gift_sup_no = gift_supplier.sup_no";
$retval=mysqli_query($link, $result); 
    if ($retval) {
        $num = mysqli_num_rows($retval);
                                                              
        if (mysqli_num_rows($retval) > 0) {
        while ($row = mysqli_fetch_assoc($retval)) {
                echo "<th>".$row["gift"]."</th>";
                echo "<th>".$row["exchange_points"]."</th>";
                echo "<th>".$row["gift_sup_no"]."</th>";
                echo "<th>".$row['gift_description']."</th>";
                echo "<th>".$row["sup_name"]."</th>";
                echo "<th>".$row['sup_tel']."</th>";  
        }
    }
}         

        
    

//$result = "UPDATE 'gift' SET 'exchange_points' = '200' WHERE (`gift_no` = '2')";
?>

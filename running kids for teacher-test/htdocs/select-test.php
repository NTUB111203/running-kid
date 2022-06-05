<?php
include "db_connect.php";

$result = "SELECT * FROM members";

$retval=mysqli_query($link, $result); 

if ($retval) {
    $num = mysqli_num_rows($retval);
    echo"<br>";
       if (mysqli_num_rows($retval) > 0) {
        while ($row = mysqli_fetch_assoc($retval)) {
            echo "<tr>";
            echo "<td>學號:".$row["m_id"]."</td><br>";
            echo "<td>姓名:".$row["m_name"]."</td><br>";
            echo "<td>性別:".$row["gender"]."</td><br>";
            echo "<td>電話:".$row["phone"]."</td><br>";
            echo "<td>信箱:".$row["mail"]."</td><br>";
            echo "<td>密碼:".$row["password"]."</td><br>";
            echo "<td>".$row["enrollment"]."</td><br>";
            echo "</tr>";
        }
    }
    echo "共有 " . $num . " 筆資料<br>";
}

?>


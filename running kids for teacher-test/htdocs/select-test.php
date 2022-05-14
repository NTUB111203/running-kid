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
            echo "<td>序號:".$row["m_id"]."</td><br>";
            echo "<td>姓名:".$row["m_name"]."</td><br>";
            echo "<td>身分:".$row["identity"]."</td><br>";
            echo "<td>性別:".$row["gender"]."</td><br>";
            echo "</tr>";
        }
    }
    echo "共有 " . $num . " 筆資料<br>";
}

?>
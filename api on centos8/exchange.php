<?php
        $db = new PDO("mysql:host=localhost;dbname=$database",$user,$password);
        $student_id = $DecodedData['student_id'];
        $gift_no = $DecodedData['gift_no'];
        $exchange_qty = $DecodedData['exchange_qty'];
        $exchange_date = $DecodedData['exchange_date'];
        $exchange_status = $DecodedData['exchange_status'];
        $score =$DecodedData['score'];
        $c_no = 3;

        $rs= $db->prepare("Insert into runningkids.student_exchange(`student_id`,`gift_no`,`exchange_qty`,`exchange_date`,`exchange_status`) Value (?,?,?,?,?) " );
        $rs->execute(["$student_id","$gift_no","$exchange_qty","$exchange_date","$exchange_status"]);

        $ds= $db->prepare("Insert into runningkids.score(`m_id`,`datetime`,`score`,`c_no`) Value(?,?,?,?)");
        $ds->execute(["$student_id","$exchange_date","$score","$c_no"]);



}catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
}
?>

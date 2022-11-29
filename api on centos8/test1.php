<?php
$user="emily";
$password="@Tfboys806@";
$database="runningkids";


try{
        $db = new PDO("mysql:host=localhost;dbname=$database",$user,$password);
        $rs= $db->prepare("select m_id from members");
        $rs->execute();

        $data=$rs->fetchAll(PDO::FETCH_ASSOC);
        $f= json_encode($data,JSON_UNESCAPED_UNICODE);
        echo $f;


}catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
}
?>

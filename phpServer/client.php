<?php  
include_once 'conection.php';
$idT= 1;
$st=$connection->prepare("SELECT * FROM temperature WHERE id = ?");
$st->bindParam(1,$idT);
$st->execute();
$arr = $st->fetch(PDO::FETCH_ASSOC);

echo json_encode($arr);

?>
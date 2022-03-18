<?php  
require_once '../conection.php';
$hum = (isset($_GET['h'])) ? $_GET['h'] : null;
$temp = (isset($_GET['t'])) ? $_GET['t'] : null;


$st=$connection->prepare("UPDATE `temperature` SET `temp` = ?, `hum` = ?, `date` = NOW(), `time_`=time(now()) WHERE `temperature`.`id` = 1");
$st->bindParam(1,$temp);
$st->bindParam(2,$hum);

var_dump($st->execute());

?>
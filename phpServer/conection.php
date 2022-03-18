<?php

$host = "localhost";
$user = "root";
$password = "";
try {
    $connection = new PDO("mysql:host=$host;dbname=iot-temp",$user,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $connection->exec("set names utf8");
} catch (PDOException $err) {
    var_dump($err);
}
?>
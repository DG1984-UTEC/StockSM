<?php


/*$databaseHost = 'fdb34.awardspace.net';
$databaseName = '3895341_unidosdb';
$databaseUsername = '3895341_unidosdb';
$databasePassword = 'Davidfree2021';
*/


$databaseHost = 'localhost';
$databaseName = 'stocksm';
$databaseUsername = 'root';
$databasePassword = '';

$conexion = new mysqli();
$conexion->connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);




?>

<?php


/* 
 * archivo para establecer los parámetros de conexión a la BD
 */
include '../class/Query.php';
$con = new Query();
$con->setHost('localhost');
$con->setUser('root');
$con->setPassword('');
$con->setDataBase('bdusuarios_web');


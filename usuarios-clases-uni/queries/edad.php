<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nombre = "Hector";
$edad = 21;
$mayor = "Es mayor de EDAD";
if ($edad < 18){
    $mayor = "Es menor de EDAD";
}

$arrayResult = [
    'nombre'=> $nombre,
    'edad' => $edad,
    'mayor' => $mayor
];
echo json_encode($arrayResult);

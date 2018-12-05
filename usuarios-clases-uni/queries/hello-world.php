<?php

/* 
 * Modelo 'hola mundo'
 */
date_default_timezone_set("America/Bogota");
$strMessage ="<b>Hola</b>, esto es un mensaje mostrado a través de Ajax";
$arrayResult = [
    'message'=> $strMessage,
    'date' => date('Y-m-d H:i:s')
];
echo json_encode($arrayResult);
        


<?php
function conect (){
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $dataBase = "insertar";
    $port = "3306";
    $socket = "";
    if (!($link = mysqli_connect($host, $user, $password, $dataBase, $port, $socket))){
        echo "No se puede conectar a la base de datos";
        exit();
    }
    if (!mysqli_select_db($link, $dataBase))
            {
        echo "no se pudo conectar a la base de datos";
        exit();
            }
            return $link;
}



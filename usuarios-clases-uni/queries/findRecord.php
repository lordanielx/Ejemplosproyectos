<?php


if(!empty($_POST['entity']) && !empty($_POST['id']))
    {
    include'../config/configuration.php';
    $con->connect();
    $entity = $_POST['entity'];
    $id = $_POST['id'];
    $query = "SELECT * FROM $entity WHERE id='$id'";
    $con->setQuery($query);
    $arrayResult = $con->getArrayRecord();
    $arrayRecord = [
        'id'=> $arrayResult['id'],
        'name'=> utf8_encode($arrayResult['nombre']),
        'email'=> utf8_encode($arrayResult['correo']),
        'message'=> ''
        
    ];
    }
    else
    {
     $arrayRecord = ["message" => "Datos incompletos."];   
    }
    echo json_encode($arrayRecord);

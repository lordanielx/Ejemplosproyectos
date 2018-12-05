<?php

/* 
 *Modelo para Eliminar Registros
 */
include '../config/configuration.php';
$con->connect();
if(!empty($_POST['entity']) && !empty($_POST['id'])){
    $table = $_POST['entity'];
    $id = $_POST['id'];
    $query = "DELETE FROM $table WHERE id ='$id'";
    $con->setQuery($query);
    if($con->getQuery()){
    
        $message = "Registro eliminado";
    }else{
        $message = "El registro no se pudo eliminar";
    }
}else{
    $message = "No ha suminiastrado información suficiente";
}
echo json_encode(['message'=>$message]);

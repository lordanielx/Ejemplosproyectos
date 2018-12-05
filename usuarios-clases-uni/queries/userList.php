<?php

/* 
 * Modelo para listar los usuarios de la dase de datos
 */

include '../config/configuration.php';
$entity = "usuario";
$con->connect();

$query = "SELECT * FROM $entity";

$con->setQuery($query);
$nreg = $con->totalRecords();



$table = "";
$table.= "<table border='1'>";
$table.= "<caption align='bottom'>";
$table.= "Total registros:";
$table.= "<span class=''>$nreg</span>";
$table.= "</caption>";
$table.= "<tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Foto</th>
            <th>Fecha hora registro</th>
            <th>Eliminar</th>
            <th>Editar</th>
            </tr>";
while ($row = $con->getArrayRecord()){
    $id = $row['id'];
    $table .= "<tr>";
    $table .= "<td>" . $row['id'] . "</td>";
    $table .= "<td>" . utf8_encode($row['nombre']) . "</td>";
    $table .= "<td>" . $row['correo'] . "</td>";
    $table .= "<td>";
    $table .= "<img src='../assets/images/" .$row['foto'] . "'width='50' height='50'/>";
    $table .="</td>";
    $table .= "<td>" . $row['fecha_hora_registro'] . "</td>";
    
    $table .= "<td>";
    $table .= "<a href='#!' class='btn btn-danger' onclick='if(confirm(\"¿Está seguro?\")){deleteRecord(\"$entity\",\"$id\");}'>Eliminar</a>";
    $table .="</td>";
    
    $table .= "<td>";
    $table .= "<a href='#!' class='btn btn-secondary' onclick='updateRecord(\"$entity\",\"$id\");'>Editar</a>";
    $table .= "</td>";
    
    $table .= "</tr>";  
    
}

$table .= "</table>";
$con->freeQuery();
$con->closeConnection();

$arrayResult = ['table' => $table];
echo json_encode($arrayResult);



<?php

if (!empty($_GET['Id'])) {
     $Id = $_GET['Id'];
include 'conexion.php';
$link = conect();
$stringQuery = "DELETE FROM usuarios WHERE Id = $Id";
// para buscar con referencia a una cadena de texto se busca la acdena dentro de ''
	$sql = mysqli_query($link, $stringQuery);
	$message = "Registro eliminado correctamente";
       	}else{
            
          
       	$message = "Debe elegir un registro a eliminar";
        
       	}
       	echo "<script>alert('$message'); window.location='index.php';</script>";
       


 
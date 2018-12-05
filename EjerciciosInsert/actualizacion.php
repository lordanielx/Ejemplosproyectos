<?php

/* 
 * Actualizar el usuario
 */
 if (!empty($_POST['TextId'])) {
       $id = $_POST['TextId'];
       
       
       $usuario = utf8_decode($_POST['TextUsuario']);
       $nombre = utf8_decode($_POST['TextNombre']);
       $apellido = utf8_decode($_POST['TextApellido']);
       $telefono = ($_POST['TextTelefono']);
       $email = ($_POST['email']);
        include 'conexion.php';
        $link = conect();
        $stringQuery = "UPDATE usuarios SET Usuario = '$usuario', Nombre = '$nombre', Apellido = '$apellido', Telefono = '$telefono', Email = '$email'  WHERE id = '$id'";
// para buscar con referencia a una cadena de texto se busca la acdena dentro de ''
        if(mysqli_query($link, $stringQuery)){
            $message = "Registro actualizado correctamente";
        }else{
            $message = "Problemas al guardar";
        }
           
    }else{
        $message = "Debe elegir un registro para actualizar";
    }
        
    echo "<script>alert('$message'); window.location='index.php';</script>";


<?php

/* 
 * insertar datos
 */


if (!empty($_POST['TextUsuario']) && !empty($_POST['TextNombre']) && !empty($_POST['TextApellido']) && !empty($_POST['email']) && !empty($_POST['TextTelefono'])) {
    include 'conexion.php';
    $link = conect();
    $usuario = utf8_decode($_POST['TextUsuario']);
    $nombre = utf8_decode($_POST['TextNombre']);
    $apellido = utf8_decode($_POST['TextApellido']);
    $telefono = utf8_decode($_POST['TextTelefono']);
    $email = utf8_decode($_POST['email']);
    $stringQuery = "INSERT INTO usuarios (usuario, nombre, apellido, telefono, email) VALUES ('$usuario', '$nombre', '$apellido', '$telefono', '$email')";
    if(mysqli_query($link, $stringQuery)){
        $message = "Registro guardado correctamente";
    }else{
        $message = "Problemas al guardar";
    }
    $message = "Registro ingresado correctamente";
}else{
    $message = "Error en el ingreso falta algún dato";
}
echo "<script>alert('$message'); window.location= 'index.php';</script>";
    


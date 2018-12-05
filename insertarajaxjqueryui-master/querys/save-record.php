<?php 

	if (!empty($_POST['txtName']) && !empty($_POST['txtEmail']) && !empty($_POST['txtImg'])) {
		include '../config/configuration.php';
		$con->connect();
		$name = trim(utf8_decode($_POST['txtName']));
		$email = trim(utf8_decode($_POST['txtEmail']));
		$img = trim(utf8_decode($_POST['txtImg']));
		if (!empty($_POST['txtId']) == '') {
			$query = "INSERT INTO usuario(usuario, nombre, correo, clave) VALUES('') ";
			$operation = "insertado";
		}else{
			$id = $_POST['txtId'];
			$query = "UPDATE usuario SET nombre= '$name', correo='$email', foto='$img' WHERE id = '$id'";
			$operation = "actualizado";
		}
		$con->setQuery($query);
		if ($con->getQuery()) {
			$message = "Registro $operation correctamente";
		}else{
			$message = "El registro no pudo ser $operation";
		}
	}else{
		$message = "Ingrese la información solicitada";
	}
	echo json_encode(['message' => $message]);
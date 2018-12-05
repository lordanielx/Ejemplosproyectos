<?php 

	// PHP para crear un archivo txt con nombre, indicando por el usuario

	if (!empty($_POST['txtName']) && !empty($_POST['txtTexto'])) {
		$file = fopen('../assets/files/'.$_POST['txtName'].'.html', 'w+');
		fwrite($file, $_POST['txtTexto']);
		fclose($file);
		$message = "Archivo creado con exito";
	}else{
		$message = "No sumintro datos suficientes para crear el archivo";
	}

	echo json_encode(['message' => $message]);
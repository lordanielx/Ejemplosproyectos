<?php 

	// PHP para adicionar contenido un archivo txt con nombre, indicando por el usuario y ya existente

	if (!empty($_POST['txtName']) && !empty($_POST['txtTexto'])) {
		if (file_exists('../assets/files/'.$_POST['txtName'].'.html')) {
		$file = fopen('../assets/files/'.$_POST['txtName'].'.html', 'a+');
		fwrite($file, $_POST['txtTexto']);
		fclose($file);
		$message = "Archivo modificado";
		}else{
			$message = "El archivo no existe prro jijueputa aprenda a copiar prro jijueputa";
		}
	}else{
		$message = "No sumintro datos suficientes para crear el archivo";
	}

	echo json_encode(['message' => $message]);
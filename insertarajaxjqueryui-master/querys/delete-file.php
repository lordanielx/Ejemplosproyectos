<?php 

	// PHP para Eliminar el archivo eliminado por el usuario

	if (!empty($_POST['fileName'])){
		if (unlink('../assets/files/'.$_POST['fileName'])) {
			$message = "Archivo eliminado con exito";
		}else{
			$message = "No se pudo eliminar el archivo";
		}
	}else{
		$message = "No sumintro datos suficientes para eliminar el archivo";
	}

	echo json_encode(['message' => $message]);
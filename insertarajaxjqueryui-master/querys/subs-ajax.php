<?php 

	if (!empty($_POST['txtNum1']) && !empty($_POST['txtNum2'])) {
		$result = $_POST['txtNum1'] - $_POST['txtNum2'];
	}else{
		$result = "Ingrese los numeros";
	}
	echo json_encode(['result'=>$result]);
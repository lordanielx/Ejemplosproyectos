<?php 

	if (!empty($_POST['number1']) && !empty($_POST['number2'])) {
		$result = $_POST['number1'] + $_POST['number2'];
	}else{
		$result = "Ingrese los numeros";
	}
	echo json_encode(['result'=>$result]);
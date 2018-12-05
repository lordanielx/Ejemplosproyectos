<?php 

/*
*	Modelo del Hello World
*/
	
	date_default_timezone_set("America/Bogota"); 

	$message = "<b>Hola</b> Esto es un mensaje generado por Ajax";
	$arrayResult = [
		'message' => $message,
		'date' => date('d-m-y h:i:s')
	];

	echo json_encode($arrayResult);
 	
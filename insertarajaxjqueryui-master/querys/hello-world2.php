<?php 

	date_default_timezone_set("America/Bogota"); 

	$message = "<b>Hola</b> Esto es un mensaje generado por Ajax 2s";
	$message .= "<br> Fecha: " . date('d-m-y h:i:s');
	echo $message;


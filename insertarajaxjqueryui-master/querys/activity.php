<?php 

	$name = "Pedro Nel Builes Moreno";
	$age = "23";
	function ageConsult($value)
	{
		if ($value > 17) {
			return "Es mayor de edad";
		}else{
			return "No es mayor de edad";
		}
	}
	$result = ageConsult($age);

	$arrayResult = [
		'Name' => $name,
		'age' => $age,
		'result' => $result
	];

	echo json_encode($arrayResult);
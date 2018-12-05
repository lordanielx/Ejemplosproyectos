<?php 
	//Modelo para listar los usuarios de la B.D
	include '../config/configuration.php';
	$entity = "usuario";
	$con->connect();
	$query = "SELECT * FROM $entity";
	$con->setQuery($query);
	$nreg = $con->totalRecords();
	$table = "
	<div class='row pt-2 text-center'>
		<div class='col-md-1'>
			id
		</div>
		<div class='col-md-1'>
			usuario
		</div>
		<div class='col-md-2'>
			nombre
		</div>
		<div class='col-md-2'>
			correo
		</div>
		<div class='col-md-2'>
			foto
		</div>
		<div class='col-md-2'>
			fecha, hora registro
		</div>
		<div class='col-md-2'>
			acciones
		</div>
	</div>";
while ($row = $con->getArrayRecord()) {
	$id=$row['id'];
	$table .= "
	<div class='row mt-1 text-center'>
		<div class='col-md-1'>
			".$id."
		</div>
		<div class='col-md-1'>
			".utf8_encode($row['usuario'])."
		</div>
		<div class='col-md-2'>
			".utf8_encode($row['nombre'])."
		</div>
		<div class='col-md-2'>
			".utf8_encode($row['correo'])."
		</div>
		<div class='col-md-2'>
			<img src='../assets/images/".$row['foto']."' class='imgMia'>
		</div>
		<div class='col-md-2'>
			".utf8_encode($row['fecha_hora_registro'])."
		</div>
		<div class='col-md-2'>
			<a href='#!' class='btn btn-danger' title='Eliminar a ".utf8_encode($row['nombre'])."' onclick='if(confirm(\"¿Estas seguro?\")){deleteRecord(\"$entity\", \"$id\");}'>Eliminar</a>
			<a href='#!' class='btn btn-light ml-2 mr-3' title='Modificar a ".utf8_encode($row['nombre'])."' onclick='updateRecord(\"$entity\", \"$id\");'>Modificar</a>
		</div>
	</div>
	";
}
$table .="<div class='row mt-2 mb-1'>
		<div class='col-12 text-center'>
			Total registros:".$nreg."
		</div>
	</div>";
$con->freeQuery();
$con->closeConnection();
$arrayResult = ['table' => $table];
echo json_encode($arrayResult);

?>



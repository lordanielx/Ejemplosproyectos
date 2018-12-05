<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Usuarios</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/styles.css">
    </head>
    <body>
    	<?php 
    			include '../config/configuration.php';
    			$con->connect();
    		  	include '../querys/userread.php';
    	 ?>
        <div class="container">
        	<div class="row mt-3">
        		<div class="col-12 text-center">
        			<h1>Usuarios</h1>
        		</div>
        	</div>
        </div>
        <div class="container tableBody">
        	<div class="row pt-2 text-center">
        		<div class="col-md-1">
        			id
        		</div>
        		<div class="col-md-1">
        			usuario
        		</div>
        		<div class="col-md-2">
        			nombre
        		</div>
        		<div class="col-md-2">
        			correo
        		</div>
        		<div class="col-md-2">
        			foto
        		</div>
        		<div class="col-md-2">
        			fecha, hora registro
        		</div>
        		<div class="col-md-1">
        			acciones
        		</div>
        	</div>
        	<?php 
        		$result = $con->getQuery();
        		while ($row = mysqli_fetch_array($result)) {
        			?>
        			<div class="row mt-1 text-center">
		        		<div class="col-md-1">
		        			<?php echo $row['id']; ?>
		        		</div>
		        		<div class="col-md-1">
		        			<?php echo utf8_encode($row['usuario']); ?>
		        		</div>
		        		<div class="col-md-2">
		        			<?php echo utf8_encode($row['nombre']); ?>
		        		</div>
		        		<div class="col-md-2">
		        			<?php echo utf8_encode($row['correo']); ?>
		        		</div>
		        		<div class="col-md-2">
		        			<img src="../assets/images/<?php echo $row['foto']; ?>" class="imgMia">
		        		</div>
		        		<div class="col-md-2">
		        			<?php echo utf8_encode($row['fecha_hora_registro']); ?>
		        		</div>
		        		<div class="col-md-1">
		        			<a href="../querys/deleteRecords.php?table=usuario&id=<?php echo $row['id']; ?>" class="btn btn-danger" title="Eliminar a <?php echo utf8_encode($row['nombre']); ?>" onclick="return confirm('Estas Seguro?');">Eliminar</a>
		        		</div>
		        	</div>
        			<?php
        			
        		}
        	 ?>
        	<div class="row mt-2 mb-1">
        		<div class="col-12 text-center">
        			Total registros: <?php echo $nreg; ?>
        		</div>
        	</div>
        </div>
        <?php 
        	$con->freeQuery();
        	$con->closeConnection();
         ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>
</html>
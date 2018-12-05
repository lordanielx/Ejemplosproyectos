<?php 
    include '../class/MasterPage.php';
    $page =  new MasterPage();
 ?>
<!doctype html>
<html>
    <head>
        <?php $page->getHead(); ?>
    </head>
    <body>
    	<!-- Gestion de datos con AJaX -->
            <header id="header" class="">
          <div class="row pt-3 pb-3">
            <div class="col-12 text-center">
              <?php $page->getHeader(); ?>
            </div>
          </div>
            </header>
            <nav id="mainMenu" class="text-center">
                <?php $page->getNav(); ?>
            </nav>
		<div class="container">
			<div class="row mt-3">
				<div class="col-12 text-center">
					<h1>Usuarios</h1>
				</div>
			</div>
			<form action="" class="tableBody" name="frmData" id="frmData">
				<div class="row mt-2 pt-3">
					<div class="col-6 text-right pr-5">
						Número 1	
					</div>
					<div class="col-6">
						<input type="number" name="txtNum1"id="txtNum1">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-6 text-right pr-5">
						Número 2
					</div>
					<div class="col-6">
						<input type="number" name="txtNum2"id="txtNum2">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-6 text-right pr-5">
						Resultado
					</div>
					<div class="col-6">
						<input type="text" readonly="" name="txtResult"id="txtResult">
					</div>
				</div>
				<div class="row mt-2 pb-3">
					<div class="col-6 text-right">
						<input type="button" name="btnSuma" id="btnSuma" class="btn btn-light mr-2" value="Sumar">
					</div>
					<div class="col-6">
						<input type="button" name="btnSubstraccion" id="btnSubstraccion" class="btn btn-light" value="Restar">
					</div>
				</div>
				
				
			</form>
			<div id="helloWorld" class="tableBody text-center mt-2">
				
			</div>
			<div id="helloWorld2" class="tableBody text-center mt-2">
				
			</div>
			<div class="tableBody mt-2">
				<div id="name" class="text-center">
				
				</div>
				<div id="age" class="text-center">
					
				</div>
				<div id="ageConsult" class="text-center">
					
				</div>
			</div>
		</div>
		<!-- 

			Ejercicio para realizar

			1- Mostrar el nombre y edad en la página usando estilos.
			Los datos se generan por PHP
			Tambien debe indicar si esa persona es mayor o no de edad.
			
			2- Códigos de estado HTTP

		-->

		
        <?php $page->getScripts(); ?>
        <script>
        	$(function() {
        		helloWorld();
        		helloWorld2();
        		activity();
        		$('#btnSuma').click(function() {
        			$.ajax({
        				'url':'../querys/sum-ajax.php',
        				'type':'POST',
        				'data':{'number1': $('#txtNum1').val(), 'number2': $('#txtNum2').val()},
        				'dataType':'json',
        				'success':function(data) {
        					$('#txtResult').val(data.result);
        				}
        			});
        		});
        		$('#btnSubstraccion').click(function() {
        			$.ajax({
        				'url':'../querys/subs-ajax.php',
        				'type':'POST',
        				'data': $('#frmData').serialize(),
        				'dataType':'json',
        				'success':function(data) {
        					$('#txtResult').val(data.result);
        				}
        			});
        		});
        	});
        	function helloWorld() {
        		$.ajax({
        			'url':'../querys/hello-world.php',
        			'type':'POST',
        			'dataType':'json',
        			'success' : function(data) {
        				$('#helloWorld').html(data.message + "<br> Fecha " + data.date);
        			}
        		});
        	};
        	function helloWorld2() {
        		$.ajax({
        			'url':'../querys/hello-world2.php',
        			'type':'POST',
        			//'dataType':'json',
        			'success' : function(data) {
        				$('#helloWorld2').html(data);
        			}
        		});
        	}
        	function activity() {
        		$.ajax({
        			'url':'../querys/activity.php',
        			'type':'POST',
        			'dataType': 'json',
        			'success':function(data) {
        				$('#name').html(data.Name);
        				$('#age').html(data.age);
        				$('#ageConsult').html(data.result);
        			}
        		});
        	}
        </script>
    </body>
</html>
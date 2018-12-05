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
       		<div class="row">
       			<div class="col-12 text-center">
       				<h1>Archivos en PHP</h1>
       			</div>
       		</div>
       		<form action="" class="tableBody pt-2 pb-2" name="frmFiles" id="frmFiles">
       			<div class="row mt-2">
       				<div class="col-6 text-right">
       					Nombre Archivo
       				</div>
       				<div class="col-6">
       					<input type="text" name="txtName" id="txtName">.txt
       				</div>
       			</div>
       			<div class="row mt-2">
       				<div class="col-6 text-right margen10Por">
       					Texto Archivo
       				</div>
       				<div class="col-6">
       					<textarea name="txtTexto" id="txtTexto" cols="30" rows="10"></textarea>
       				</div>
       			</div>
       			<div class="row">
       				<div class="col-6 text-right">
       					Archivos disponibles
       				</div>
       				<div class="col-6">
       					<select name="ddlFiles" id="ddlFiles">
       						
       					</select>
       					<div id="txtCountFiles"></div>
       				</div>
       			</div>
       			<div class="row">
       				<div class="col-12 text-center">
       					<input type="button" name="btnDelete" id="btnDelete" value="Eliminar Archivo" class="btn btn-light">
       				</div>
       			</div>
       			<div class="row mt-2">
       				<div class="col-12 text-center">
       					<input type="button" name="btnCreateFile" id="btnCreateFile" value="Crear Archivo" class="btn btn-light">
       				</div>
       			</div>
       			<div class="row mt-2">
       				<div class="col-12 text-center">
       					<input type="button" name="btnAddFile" id="btnAddFile" value="Agregar texto al archivo Archivo" class="btn btn-light">
       				</div>
       			</div>
       			
       		</form>
       		<div id="dialog" title="Mensaje del sistema "></div>
       </div>
        <?php $page->getScripts(); ?>
        <script>
        	$(function() {
        		
        		listFiles();

        		$('#btnCreateFile').click(function() {
        			$.ajax({
        				url: '../querys/create-file.php',
	        			type: 'POST',
	        			dataType: 'json',
	        			data: $('#frmFiles').serialize(),
	        			success: function(data) {
	        				$('#dialog').html(data.message);
	        				$('#dialog').dialog({
	        					autoOpen: true,
	        					modal: true,
	        					buttons: {
	        						'cerrar': function() {
	        							$(this).dialog('close');
	        						}
	        					}
	        				});
	        			}
        			})
        		});
        		$('#btnAddFile').click(function() {
        			$.ajax({
        				url: '../querys/add-file.php',
	        			type: 'POST',
	        			dataType: 'json',
	        			data: $('#frmFiles').serialize(),
	        			success: function(data) {
	        				$('#dialog').html(data.message);
	        				$('#dialog').dialog({
	        					autoOpen: true,
	        					modal: true,
	        					buttons: {
	        						'cerrar': function() {
	        							$(this).dialog('close');
	        						}
	        					}
	        				});
	        			}
        			})
        		});
        		$('#btnDelete').click(function() {
        			$.ajax({
        				url: '../querys/delete-file.php',
	        			type: 'POST',
	        			dataType: 'json',
	        			data: {'fileName': $('#ddlFiles').val()},
	        			success: function(data) {
	        				$('#dialog').html(data.message);
	        				$('#dialog').dialog({
	        					autoOpen: true,
	        					modal: true,
	        					buttons: {
	        						'cerrar': function() {
	        							$(this).dialog('close');
	        						}
	        					}
	        				});
	        				listFiles();
	        			}
        			})
        		});
        	});
        	function listFiles() {
        		$.ajax({
        				url: '../querys/list-files.php',
	        			type: 'POST',
	        			dataType: 'json',
	        			success: function(data) {
	        				$('#ddlFiles').html(data.options);
	        				$('#txtCountFiles').html(data.numberFiles);
	        			}
        			});
        	}
        </script>
    </body>
</html>
<?php 
    include '../class/MasterPage.php';
    $page =  new MasterPage();
 ?>
<!doctype html>
<html lang="es">
    <head>
        <?php $page->getHead(); ?>
    </head>
    <body>
        <main id="main" class="">
            
        
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
            <article id="content" class="container">
                <h2 class="text-center">Usuarios</h2>
                <div class="form">
                    <form name="frmData" id="frmData">
                        <input type="hidden" name="txtId" id="txtId">
                        <div class="row mt-1">
                            <div class="col-6 text-right pr-4">
                                Usuario:
                            </div>
                            <div class="col-6">
                                <input type="text" name="txtUser" id="txtUser" maxlength="100">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6 text-right pr-4">
                                Nombre:
                            </div>
                            <div class="col-6">
                                <input type="text" name="txtName" id="txtName" maxlength="100">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6 text-right pr-4">
                                Correo:
                            </div>
                            <div class="col-6">
                                <input type="text" name="txtEmail" id="txtEmail">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6 text-right pr-4">
                                Nombre de la imagen:
                            </div>
                            <div class="col-6">
                                <input type="text" name="txtImg" id="txtImg">
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-6 text-right">
                                <input type="button" name="btnSave" id="btnSave" value="Guardar" class="btn btn-success">
                            </div>
                            <div class="col-6">
                                <input type="reset" value="Restablecer" class="btn btn-dark">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 text-center">
                                <input type="button" name="btnNuevo" id="btnNuevo" value="Nuevo registro" class="btn btn-outline-dark">
                            </div>
                        </div>
                    </form>
                </div>
    			<div id="resultRecords" class="tableBody">
    				
    			</div>
                <div id="dialog" title="Mensaje.">
                    
                </div>
    		</article>
        </main>

        <?php $page->getScripts(); ?>
        <script>
        	$(function() {
        		listRecords();
                $('#btnSave').click(function() {
                   saveRecord();
                   $( "#dialog" ).animate({
                        backgroundColor: "#000000",
                        color: "#fff",
                        width: 500
                        }, 1000 );
                });
                $('#btnNuevo').click(function () {
                    guardarRecords();
                    $( "#dialog" ).animate({
                        backgroundColor: "#000000",
                        color: "#fff",
                        width: 500
                        }, 1000 );
                });
                var imagenesDispo = [
                    "img1.jpg",
                    "img2.png",
                    "img3.jpg",
                    "img4,jpg",
                    "img5jpg.jpg",
                    "img6.png",
                    "textura1.png",
                    "textura2.png"
                ];
                $('#txtImg').autocomplete({
                    source: imagenesDispo
                });
        	});
        	function listRecords() {
        		$.ajax({
        			'url':'../querys/userlist.php',
        			'type':'POST',
        			'dataType':'json',
        			'success' : function(data) {
        				$('#resultRecords').html(data.table);
        			}
        		});
        	};

            function deleteRecord(entity, id){
                $.ajax({
                    'url':'../querys/deleteRecordsAjax.php',
                    'data': {'entity':entity, 'id':id},
                    'type': 'POST',
                    'dataType': 'json',
                    'success': function(data) {
                        $('#dialog').html(data.message);
                        $('#dialog').dialog();
                        listRecords();
                    }
                });
            }
            function updateRecord(entity, id) {
                $('#dialog').html('¿Está seguro?');
                $('#dialog').dialog({
                    autoOpen: true,
                    modal: true,
                    buttons: {
                        'Aceptar':function () {
                            getRecord(entity, id);
                            $(this).dialog('close');
                        },
                        'Cerrar': function () {
                            $(this).dialog('close');
                        }
                    }
                });
            }

            function getRecord(entity, id) {
                $.ajax({
                    'url':'../querys/findRecord.php',
                    'data':{'entity':entity,'id':id},
                    'type':'POST',
                    'dataType':'json',
                    'success':function(data) {
                        if (data.message === '') {
                            $('#txtId').val(data.id);
                            $('#txtName').val(data.name);
                            $('#txtEmail').val(data.email);
                            $('#txtImg').val(data.img);
                        }else{
                            $('#dialog').html(data.message);
                            $('#dialog').dialog({
                                autoOpen: true,
                                modal:true,
                                buttons: {
                                    'Cerrar': function() {
                                        $(this).dialog('close');
                                    }
                                }
                            });
                        }
                    }
                });
            }

            function saveRecord() {
                $.ajax({
                    'url':'../querys/save-record.php',
                    'data': $('#frmData').serialize(),
                    'type': 'POST',
                    'dataType': 'json',
                    'success': function(data) {
                        $('#dialog').html(data.message);
                        $('#dialog').dialog({
                                autoOpen: true,
                                modal:true,
                                buttons: {
                                    'Cerrar': function() {
                                        $(this).dialog('close');
                                    }
                                }
                            });
                        listRecords();
                    }
                });
            }
            function guardarRecords() {
                $.ajax({
                    'url':'../querys/guardar-record.php',
                    'data': $('#frmData').serialize(),
                    'type': 'POST',
                    'dataType': 'json',
                    'success': function(data) {
                        $('#dialog').html(data.message);
                        $('#dialog').dialog({
                                autoOpen: true,
                                modal:true,
                                buttons: {
                                    'Cerrar': function() {
                                        $(this).dialog('close');
                                    }
                                }
                            });
                        listRecords();
                    }
                });
            }
        </script>
    </body>
</html>



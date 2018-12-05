<?php
   include '../class/masterPage.php';
   $template = new masterPage();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <?php
       $template->getHead();
       ?>
    </head>
    <body>
       <main class="container">
                <header id="header">
                     <?php
                      $template->getHeader();
                      ?>
                </header>
            
                <nav id="mainMenu">
                     <?php
                      $template->getNav();
                      ?>
                </nav>
                <div align="center">
          <article id="content">
                  <h2>Gestion</h2>
                  
                
                <form name="frmFiles" id="frmFiles">
                    <label for="txaName">Nombre de archivo</label>
                    <br>
                    <input type="text" name="txtName" id="txtName">.txt
                    <br>
                    <label for="txaText">Texto archivo</label>
                    <br>
                    <textarea name="txaText" id="txaText"></textarea>
                     <br>
                     <label for="cboFiles">Archivos disponibles</label>
                     <br>
                     <select class="btn btn-danger dropdown-toggle" name="cboFiles" id="cboFiles"></select>
                     <br>
                     <label for="cboFiles">Número de archivos disponibles</label>
                     <br>
                     <input type="text" name="txtCountFiles" id="txtCountFiles" readonly="">
                     <br>
                    <br>
                    <input class="btn btn-primary" type="button" name="btnCreateFile" id="btnCreateFile" value="Crear archivo">
                    <input class="btn btn-success" type="button" name="btnAddFIle" id="btnAddFIle" value="Añadir texto al archivo">
                    <input class="btn btn-warning" type="button" name="btnDeleteFile" id="btnDeleteFile" value="Eliminar archivo">
                </form>
                <div id="dialog" title="Mensaje del sistema"></div>
            </div>
          </article>
        </main>
        
        <script src="../assets/js/jquery-3.3.1.js"></script>
        <script src="../assets/js/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
        
        <script type="text/javascript">
            $(function(){
                listFiles();
                       
                $('#btnCreateFile').click(function(){
                    $.ajax({
                        url:'../queries/create-file.php',
                        type: 'POST',
                        dataType: 'json',
                        data: $('#frmFiles').serialize(),
                        success: function(data){ 
                              $('#dialog').html(data.message);
                              $('#dialog').dialog({
                                    autoOpen:true,
                                    modal:true,
                                    buttons: {
                                        'Cerrar': function(){
                                            $(this).dialog ('close');
                                       
                                    }
                                }
                            }); 
                            listFiles();
                         }
                    });
                });
                
                $('#btnAddFIle').click(function(){
                    $.ajax({
                        url:'../queries/add-file.php',
                        type: 'POST',
                        dataType: 'json',
                        data: $('#frmFiles').serialize(),
                        success: function(data){ 
                              $('#dialog').html(data.message);
                              $('#dialog').dialog({
                                    autoOpen:true,
                                    modal:true,
                                    buttons: {
                                        'Cerrar': function(){
                                            $(this).dialog ('close');
                                       
                                    }
                                }
                            }); 
                         }
                    });
                });
                
                
                $('#btnDeleteFile').click(function(){
                    $.ajax({
                        url:'../queries/delete-file.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {'fileName':$('#cboFiles').val()},
                        success: function(data){ 
                              $('#dialog').html(data.message);
                              $('#dialog').dialog({
                                    autoOpen:true,
                                    modal:true,
                                    buttons: {
                                        'Cerrar': function(){
                                            $(this).dialog ('close');
                                       
                                    }
                                }
                            }); 
                            listFiles();
                         }
                    });
                });
                
            });
             
             
            function listFiles()
            {
             $.ajax({
                    url:'../queries/list-file.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function(data){ 
                    $('#cboFiles').html(data.options);
                    $('#txtCountFiles').val(data.numberFiles);
                 }         
            });
        }
        </script>
        
    </body>
</html>

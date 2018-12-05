<?php
   include '../class/masterPage.php';
   $template = new masterPage();
?>
<!DOCTYPE html>
<!--
Gestión de usuarios con  Ajax (AJAX)
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
              <h2>Usuarios</h2>

                <div id="form">
                    <form name="frmData" id="frmData">
                        <br>
                        <input type="hidden" name="txtId" id="txtId">
                        <br>
                        <label for="txtUser">Usuario</label>
                        <br>
                        <input type="text" name="txtUser" id="txtUser" maxlength="100">
                        <br>
                        <label for="txtName">Nombre</label>
                        <br>
                        <input type="text" name="txtName" id="txtName" maxlength="100">
                        <br>
                        <label for="txtCorre">Correo</label>
                        <br>
                        <input type="text" name="txtEmail" id="txtEmail" maxlength="100">
                        <br>
                        <label for="txtImg">Foto</label>
                        <br>
                        <input type="text" name="txtImg" id="txtImg" maxlength="100">
                        <br>
                        <input type="button" class="btn btn-primary" name="btnSave" id="btnSave" value="GUARDAR">
                        <br>
                        <input type="reset" class="btn btn-success" value="RESTABLECER">
                    </form>
                </div>
                
                <div id="resultRecords"></div>
                
                <div id="dialog" title="Mensaje del sistema"></div>
                
            </article>
          </div>
        </main>
         <?php
         $template->getScripts();
         ?>
        
    
        
        <script type="text/javascript">
                    $(function(){
                        listRecords();
                        $('#btnSave').click(function(){
                            saveRecord();
                        });
                    });

                    function listRecords(){
                        $.ajax({
                            'url': '../queries/userList.php',
                            'type': 'POST',
                            'dataType': 'json',
                            'success': function(data){
                                $('#resultRecords').html(data.table);
                                
                            }
                        });

                    }
                    function deleteRecord(entity, id)
                    {
                        $.ajax({
                           'url':'../queries/deleteRecordAjax.php',
                           'data':{'entity':entity, 'id':id},
                           'type': 'POST',
                           'dataType': 'json',
                           'success': function(data){
                              $('#dialog').html(data.message);
                              $('#dialog').dialog();
                               listRecords();
                           }
                        });
                    }
                    
                    function updateRecord(entity, id)
                    {
                        $('#dialog').html('Está seguro?');
                        $('#dialog').dialog({
                            autoOpen:true,
                            modal:true,
                            buttons: {
                                'Aceptar': function(){
                                    getRecord(entity, id);
                                    $(this).dialog ('close');
                                },
                                'Cerrar': function(){
                                    $(this).dialog ('close');
                                }
                            }
                        });
                    }
                     function getRecord(entity, id)
                     {
                        $.ajax({
                           'url':'../queries/findRecord.php',
                           'data':{'entity':entity, 'id':id},
                           'type': 'POST',
                           'dataType': 'json',
                           'success': function(data){
                               if(data.message === ''){
                               $('#txtId'). val(data.id);
                               $('#txtName'). val(data.name);
                               $('#txtEmail'). val(data.email);
                              }
                              else
                              {
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
                                 
                           }
                        });
                     }
                     function saveRecord()
                     {
                         $.ajax({
                           'url': '../queries/save-record.php',
                           'data': $('#frmData').serialize(),
                           'type': 'POST',
                           'dataType': 'json',
                           'success': function(data){
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
                                 listRecords();
                           } 
                         });
                     }
            </script>

    </body>
</html>

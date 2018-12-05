<!DOCTYPE html>
<!--
Vista para la tabla usuarios
-->
<html lang="es">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <main class="container">
            <header id="header">
                
            </header>

            <nav id="mainMenu">
                
            </nav>
        	
            <article id="content">
                <h2>Usuarios</h2>

                <p>
                    Módulo de usuarios
                </p>

                <div id="menuRecord">
                    <a href="#" id="new-record">Nuevo</a>
                    |
                    <a href="#" id="save-localstorage">Guardar temporalmente</a>
                    |
                    <a href="#" id="restore-localstorage">Restaurar datos</a>
                </div>
				
                <div id="form">
                <?php

                    if(!empty($record)){
                        $row = $record->row();
                        $id = $row->id;
                        $user = $row->usuario;
                        $name = $row->nombre;
                        $email = $row->correo;
                        $password = $row->clave;
                        $photo = $row->foto;
                    }else{
                        $id = "";
                        $user = "";
                        $name = "";
                        $email = "";
                        $password = "";
                        $photo = "";
                    }

                    echo form_open(base_url() . "index.php/begin/save");
                        
                    echo form_hidden('id', $id);
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Usuario', 'user');
                    echo "</th>";
                    echo "<td>";
                    echo form_input('user', $user);
                    echo "</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Nombre', 'name');
                    echo "</th>";
                    echo "<td>";
                    echo form_input('name', $name);
                    echo "</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Correo', 'email');
                    echo "</th>";
                    echo "<td>";
                    echo form_input('email', $email);
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Clave', 'password');
                    echo "</th>";
                    echo "<td>";
                    echo form_password('password', $password);
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Confirmar clave', 'passwordConfirm');
                    echo "</th>";
                    echo "<td>";
                    echo form_password('passwordConfirm');
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Foto', 'photo');
                    echo "</th>";
                    echo "<td>";
                    echo form_input('photo', $photo);
                    echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td colspan='2'>";
                    echo form_submit('btnSubmit', 'Guardar');
                    echo form_reset('btnReset', 'Restablecer');
                    echo "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo form_close();
                ?>

                </div>

                <div id="messageSave">
                    <?php
                        if(!empty($messageSave)){
                            echo $messageSave;
                        }
                    ?>
                </div>
                

                <div id="error">
                    <?php
                        echo validation_errors();
                    ?>
                </div>


                <?php
                    if(!empty($resultQuery)){
                ?>

                <div id="messageDelete">
                    <?php
                        if(!empty($messageDelete)){
                            echo $messageDelete;
                        }
                    ?>
                </div>
				
                    <table border="1">
                        <caption align="bottom">
                            Total registros: 
                            <?php
                                echo $totalRows;
                            ?>
                        </caption>
                        <div align="center">
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Foto</th>
                                <th>Fecha hora registro</th>
                                <th>Eliminar</th>
                                <th>Modificar</th>
                            </tr>
                        </div>
                            <?php
                                foreach ($resultQuery->result() as $row){
                                    echo "<tr>";
                                    echo "<td>" . $row->id . "</td>";
                                    echo "<td>" . $row->usuario . "</td>";
                                    echo "<td>" . $row->nombre . "</td>";
                                    echo "<td>" . $row->correo . "</td>";
                                    echo "<td>" . $row->foto . "</td>";
                                    echo "<td>" . $row->fecha_hora_registro . "</td>";
                                    echo "<td>";
                                    echo "<a href='" . base_url() . "index.php/begin/delete/usuario/" . $row->id . "' title='Elimina a " . $row->nombre . "' onclick='return confirm(\"¿Está seguro?\");'>Eliminar</a>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<a  href='" . base_url() . "index.php/begin/find/usuario/id/" . $row->id . "' title='Modifica a " . $row->nombre . "' onclick='return confirm(\"¿Está seguro?\");'>Modificar</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }

                            ?>

                    </table>


                <?php
                            echo $pagination;
                    }
                    ?>

                <div id="dialog" title="Mensaje del sistema"></div>

            </article>
        </main>
        
        <script src="<?php echo base_url() . 'assets/js/jquery-3.3.1.js'; ?>"></script>

        <script type="text/javascript">
            $(function(){

                //Enlace para nuevo registro
                $('#new-record').click(function(){
                    $('form').find('input[type=text], input[type=hidden], input[type=password]').val('');
                });
                
                
                $('#save-localstorage').click(function(){
                    localStorage.setItem('user', $('input[name=user]').val());
                    localStorage.setItem('name', $('input[name=name]').val());
                    localStorage.setItem('email', $('input[name=email]').val());
                    localStorage.setItem('password', $('input[name=password]').val());
                    localStorage.setItem('photo', $('input[name=photo]').val());
                });
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
    </body>
</html>

<!DOCTYPE html>
<!--
Vista para la tabla perfil
-->
<html lang="es">
    <head>
        
    </head>
    <body>
        <main class="container">
            <header id="header">
                
            </header>

            <nav id="mainMenu">
                
            </nav>
        	
            <article id="content">
                <h2>Módulo de la tabla perfil usando codeigniter Jose Daniel</h2>

                
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
                        $description = $row->descripcion;                        
                        $fecha_registro = $row->fecha_hora_registro;
                    }else{
                        $id = "";
                        $description = "";                        
                        $fecha_registro = "";
                    }

                    echo form_open(base_url() . "index.php/begin_1/save1");
                        
                    echo form_hidden('id', $id);
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>";
                    
                    echo form_label('Descripcion', 'description');
                    echo "</th>";
                    echo "<td>";
                    echo form_input('description', $description);
                    echo "</td>";
                    echo "</tr>";
                    
                    

                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Fecha de registro', 'fecha_registro');
                    echo "</th>";
                    echo "<td>";
                    echo form_input('fecha_registro', $fecha_registro);
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
                            <tr>
                                <th>Id</th>
                                <th>Desxcripción</th>                                
                                <th>Fecha hora registro</th>
                                <th>Eliminar</th>
                                <th>Modificar</th>
                            </tr>

                            <?php
                                foreach ($resultQuery->result() as $row){
                                    echo "<tr>";
                                    echo "<td>" . $row->id . "</td>";
                                    echo "<td>" . $row->descripcion . "</td>";                                    
                                    echo "<td>" . $row->fecha_hora_registro . "</td>";
                                    echo "<td>";
                                    echo "<a href='" . base_url() . "index.php/begin_1/delete1/perfil/" . $row->id . "' title='Elimina a " . $row->descripcion . "' onclick='return confirm(\"¿Está seguro?\");'>Eliminar</a>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<a href='" . base_url() . "index.php/begin_1/find/perfil/id/" . $row->id . "' title='Modifica a " . $row->fecha_hora_registro . "' onclick='return confirm(\"¿Está seguro?\");'>Modificar</a>";
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
                
                $('#save-localstorage').click(function(){
                    localStorage.setItem('description', $('input[name=description]').val());
                    localStorage.setItem('fecha_registro', $('input[name=fecha_registro]').val());
                });
            });
        </script>
        
        
    </body>
</html>

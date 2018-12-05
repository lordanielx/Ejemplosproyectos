<!DOCTYPE html>
<!--
Vista para la tabla de usuarios
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
                <h2>Usuarios</h2>

                <p>
                    Módulo de usuarios
                </p>
                <div id="form">
                    <?php
                        
                        if (!empty($record))
                        {
                            $row = $record->row();
                            $id = $row->id;
                            $user =$row->usuario;
                            $name =$row->nombre;
                            $email =$row->correo;
                            $password =$row->clave;
                           $photo =$row->foto;
                        }else{
                            $id = "";
                            $user ="";
                            $name ="";
                            $email ="";
                            $password ="";
                           $photo ="";
                            
                        }
                                           
                        echo form_open(base_url() . "begin/update");
                        echo form_hidden('id', $id);
                        echo "<br>"; 
                        echo form_label('usuario', 'user');
                        echo form_input('user', $user);
                        echo "<br>";
                        echo form_label('nombre', 'name');
                        echo form_input('name', $name);
                        echo "<br>";
                        echo form_label('correo', 'email');
                        echo form_input('email', $email);
                        echo "<br>";
                        echo form_label('clave', 'password');
                        echo form_input('password', $password);
                        echo "<br>";
                        echo form_label('foto', 'photo');
                        echo form_input('photo', $photo);
                        echo "<br>";
                        echo form_submit('btnSubmit', 'Guardar');
                        echo form_reset('btnReset','Restablecer');
                        echo form_close();                   
                    ?>
                    
                    </form>
                </div>
                
                
                <?php
                    if(!empty($resultQuery))
                    {
                        
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
                        <th>Usuario</th>
                        <th>Nombre</th>
                        <th>correo</th>
                        <th>foto</th>
                        <th>fecha hora registro</th> 
                        <th>Eliminar</th>
                        <th>Modificar</th>
                    </tr>
                    
                    <?php
                    foreach ($resultQuery-> result() as $row){
                        echo "<tr>";
                        echo "<td>".$row->id ."</td>";
                        echo "<td>".$row->usuario ."</td>";
                        echo "<td>".$row->nombre ."</td>";
                        echo "<td>".$row->correo ."</td>";
                        echo "<td>".$row->foto ."</td>";
                        echo "<td>".$row->fecha_hora_registro ."</td>";
                        echo "<td>";
                        echo "<a href='" . base_url() . "begin/delete/usuario/" . $row->id . "' title='Elimina a " . $row->nombre . "' onclick='return confirm(\"¿Está seguro?\");'>Eliminar</a>";
                        echo "</td>";  
                        
                        echo "<td>";
                        echo "<a href='" . base_url() . "begin/find/usuario/" . $row->id . "' title='Modifica a " . $row->nombre . "' onclick='return confirm(\"¿Está seguro?\");'>Modificar</a>";
                        echo "</td>";   
                        echo "</tr>";

                    }
                    ?>
                    </table>

                <?php
                    
                    }
                ?>
                
                
                
                
                <div id="dialog" title="Mensaje del sistema"></div>

            </article>
        </main>
        
       
        
    </body>
</html>

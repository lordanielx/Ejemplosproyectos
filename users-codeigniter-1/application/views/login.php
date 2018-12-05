<!DOCTYPE html>
<!--
Vista para iniciar sesión
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
                <h2>Inicio de sesión</h2>

                <p>
                    Ingrese sus credenciales
                </p>
                
                <?php
                    
                    echo form_open(base_url() . "index.php/session/validateSession");
                        
                    echo "<table>";
                    
                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Forma ingreso', 'enterUser');                    
                    echo "</th>";
                    echo "<td>";
                    echo form_label('Usuario');
                    echo form_radio('enterUser', 'usuario', TRUE);
                    echo form_label('Correo');
                    echo form_radio('enterUser', 'correo');
                    echo "</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Usuario/correo', 'user');
                    echo "</th>";
                    echo "<td>";
                    echo form_input('user');
                    echo "</td>";
                    echo "</tr>";
                    
                    echo "<tr>";
                    echo "<th>";
                    echo form_label('Contraseña', 'password');
                    echo "</th>";
                    echo "<td>";
                    echo form_password('password');
                    echo "</td>";
                    echo "</tr>";
                    
                                       
                    echo "<tr>";
                    echo "<td colspan='2'>";
                    echo form_submit('btnSubmit', 'Iniciar sesión');
                    echo form_reset('btnReset', 'Restablecer');
                    echo "</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo form_close();
                
                
                ?>
                <div id="error"
                     <?php
                        echo validation_errors();                     
                     ?>
                </div> 
                
                 <div id="errorValidation">
                    <?php
                    if(!empty($messageConnection)){
                        echo $messageConnection;
                    }                                            
                    ?>
                </div> 
                
                

                <div id="dialog" title="Mensaje del sistema"></div>

            </article>
        </main>
        
        
        
    </body>
</html>

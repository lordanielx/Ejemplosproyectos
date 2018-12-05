<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <h1>Actualizar datos</h1>        
<?php
        if (!empty($_GET['Id'])) {
        $Id = $_GET['Id'];
include 'conexion.php';
        $link = conect();
        $stringQuery = "SELECT * FROM usuarios WHERE Id = $Id";
        // para buscar con referencia a una cadena de texto se busca la acdena dentro de ''
        $sql = mysqli_query($link, $stringQuery);
        $row = mysqli_fetch_assoc($sql);
        $usuario = utf8_encode($row['Usuario']);
        $name = utf8_encode($row['Nombre']);
        $apellido = utf8_encode($row['Apellido']);
        $telefono = ($row['Telefono']);
        $email = utf8_encode($row['Email']);
        ?>1
        <form id="frmFormulario" name="frmFormulario" method="post" action="actualizacion.php">
                <table>
                        <tr>
                                <th><label for="textId"> Id</label></th>
                                <td><input type="text" name="TextId" id="txtId" readonly="" class="form-control" value="<?php echo $Id?>"></td>
                        </tr>
                        <tr>
                                <th><label for="textUsuario">Usuario</label></th>
                                <td><input type="text" name="TextUsuario" id="txtNombre" class="form-control" value="<?php echo $usuario?>"></td>
                        </tr>
                        <tr>
                                <th><label for="mail">Nombre</label></th>
                                <td><input type="text" name="TextNombre" id="nombre" class="form-control" value="<?php echo $name?>"></td>
                        </tr>
                        <tr>
                                <th><label for="textApellido">Apellido</label></th>
                                <td><input type="text" name="TextApellido" id="apellido" class="form-control" value="<?php echo $apellido?>"></td>
                        </tr>
                        <tr>
                                <th><label for="mail">E-Mail </label></th>
                                <td><input type="email" name="email" id="mail" class="form-control" value="<?php echo $email?>"></td>
                        </tr>
                        <tr>
                                <th><label for="mail">Telefono </label></th>
                                <td><input type="text" name="TextTelefono" id="telefono" class="form-control "value="<?php echo $telefono?>"></td>
                        </tr
                        <tr>
                                <td colspan="2">
                                    <input type="submit" value="Guardar cambios" class="btn btn-primary" />
                
            </td>
                        </tr>
                </table>
        </form>
        <?php
                }else{
                $message = "Debe elegir un registro a eliminar";
                echo "<script>alert('$message'); window.location='mostrar_usuario.php';</script>";
        }
        ?>
        <!--<script src="js/main.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>

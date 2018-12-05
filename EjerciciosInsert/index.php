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
        
        <title>Tabla de Datos</title>
    </head>
    <body>
        <div class="row">
            <div class="col-12 text-center">
        <h2>Tabla de Datos</h2>
            </div>
        </div>
        <!-- Button trigger modal -->
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                  Insertar
                </button>
            </div>
        </div>
                <!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Ingresar Datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form action="Insertar.php" id="frmAgregar" name="frmAgregar" method="post">
                    <div class="col-12">      
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1">Usuario</label>
                            </div>        
                            <div class="col-12">
                                <input type="text" placeholder="Usuario" class="form-control" name="TextUsuario" id="TextUsuario" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1">Nombre</label>
                            </div>
                            <div class="col-12">
                                <input type="text" placeholder="Nombre" class="form-control" name="TextNombre" id="TextNombre" value="">
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1">Apellido</label>
                            </div>
                            <div class="col-12">
                                <input type="text" value="" class="form-control" placeholder="Apellido" name="TextApellido" id="TextApellido">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1">Telefono</label>
                            </div>
                            <div class="col-12">
                                <input type="text" placeholder="Telefono" class="form-control" value="" name="TextTelefono" name="TextTelefono">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="exampleInputEmail1">E-mail</label>
                            </div>
                            <div class="col-12">
                                <div>
                                    <input type="text" placeholder="ejemplo@correo.com" class="form-control" value="" name="email" id="email">
                                    <small id="emailHelp" class="form-text text-muted">Ingresar un Correo electronico valido</small>
                                </div>
                            </div>
                        </div>
                    </div>
                          <div class="modal-footer">
                    <button type="reset"  class="btn btn-danger">Borrar</button>
                    <button type="" class="btn btn-dark" value="Cancelar" data-dismiss="modal" >Cancelar</button>
                    <button type="submit" class="btn btn-success" value="Guardar">Guardar</button>
                  </div>
                </form>
                  </div>

                </div>
              </div>
            </div>
        <div class="container">
            <div class="row mt-3 border">              
                <div class="col-md-1 ">
                    ID
                </div>
                <div class="col-md-1">
                    Usuario
                </div>
                <div class="col-md-1">
                    Nombre
                </div>
                <div class="col-md-1">
                    Apellido
                </div>
                <div class="col-md-2">
                    Telefono
                </div>
                <div class="col-md-2">
                    E-Mail
                </div>
                <div class="col-md-2">
                    Fecha
                </div>
                <div class="col-md-1">
                    Acciones
                </div>
            </div>
        <?php
            include 'conexion.php';
            $link = conect();
            $stringQuery = "SELECT * FROM usuarios";
            $sql = mysqli_query($link, $stringQuery);
            while ($row = mysqli_fetch_array($sql))
                    {
                ?>
            <div class="row mt-3 border">              
                <div class="col-md-1 ">
                    <?php echo utf8_decode($row['Id'])?>
                </div>
                <div class="col-md-1">
                    <?php echo utf8_decode($row['Usuario'])?>
                </div>
                <div class="col-md-1">
                    <?php echo utf8_decode($row['Nombre'])?>
                </div>
                <div class="col-md-1">
                    <?php echo utf8_decode($row['Apellido'])?>
                </div>
                <div class="col-md-2">
                    <?php echo utf8_decode($row['Telefono'])?>
                </div>
                <div class="col-md-2">
                    <?php echo utf8_decode($row['Email'])?>
                </div>
                <div class="col-md-2">
                    <?php echo utf8_decode($row['Fecha'])?>
                </div>
                <div class="col-mb-1">
                    <?php 
                        echo '<a href="modificar.php?Id='.$row['Id'].'"class="btn-sm btn-dark center">Modificar</a>';
                        echo '<a href="eliminar.php?Id='.$row['Id'].'"class="btn-sm btn-danger">Eliminar</a>';
                    
                    
                    ?>
                </div>
            </div>
            <?php
                    }
        ?>
            <div class="row">
                <div class="col-12 text-center">
                    Total Registros:
                    <?php
                    echo mysqli_num_rows($sql);
                    ?>
                </div>
                
            </div>
        </div>
        <?php
                    //include 'insertar.php';
        ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>

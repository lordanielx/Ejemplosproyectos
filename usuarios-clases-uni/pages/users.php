<!DOCTYPE html>
<!--
Págiina web para gestionsar los de laBD
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../config/configuration.php';
        $con->connect();
        include '../queries/userRead.php';
        ?>
        <h1>Usuarios</h1>
        <div>
            <table border="1">
                <caption align="bottom">
                    Total registros:
                    <span class="">
                        <?php
                            echo $nreg
                        ?>
                    </span>
                </caption>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th>Fecha hora registro</th>
                    <th>Eliminar</th>
                </tr>
                  <?php
                        $result =$con->getQuery();
                        while ($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . utf8_encode($row['nombre']) . "</td>";
                            echo "<td>" . $row['correo'] . "</td>";
                            echo "<td>";
                            echo "<img src='../assets/images/" . $row['foto'] . "'whidth='50' height='50'/>";
                            echo "</td>";
                            echo "<td>" . $row['fecha_hora_registro'] . "</td>";
                            echo "<td>";
                            echo "<a href='../queries/deleteRecord.php?table=usuario&id=" .$row['id'] ."'
                                title='Eliminar a" .$row['nombre'] . "' oncklic='return confirm(\"Está seguro?\");'>Eliminar</a>";
                            echo "</td>";
                            echo "</tr>"; 
                        }
                  ?>
            </table>
        </div>
        <?php
            $con->freeQuery();
            $con->closeConnection();
            
         
        ?>
      
    </body>
</html>

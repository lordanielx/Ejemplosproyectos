<?php
 include '../class/masterPage.php';
 $template = new masterPage();
?>
<!DOCTYPE html>
<!--
Página de inicio
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

            <article id="content">
              <h2>Inicio</h2>

              <p>
                Bienvenido a la aplicacion de usuarios
              </p>

                
                <div id="dialog" title="Mensaje del sistema"></div>
                
            </article>
        </main>
         <?php
         $template->getScripts();
         ?>
        
       
            </script>

    </body>
</html>

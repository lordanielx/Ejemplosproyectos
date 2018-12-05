<?php 
    include '../class/MasterPage.php';
    $page =  new MasterPage();
 ?>
<!doctype html>
<html lang="es">
    <head>
        <?php $page->getHead(); ?>
    </head>
    <body>
        <main id="main" class="">
            
        
            <!-- Gestion de datos con AJaX -->
            <header id="header" class="">
    			<div class="row pt-3 pb-3">
    				<div class="col-12 text-center">
    					<?php $page->getHeader(); ?>
    				</div>
    			</div>
            </header>
            <nav id="mainMenu" class="text-center">
                <?php $page->getNav(); ?>
            </nav>
            <article id="content" class="container">
                <h2 class="text-center">Usuarios</h2>
                <div class="tableBody">
                    <h3 class="text-center">Bienvenido a mi sitio web</h3>
                </div>
    			<div id="resultRecords" class="tableBody">
    				
    			</div>
                <div id="dialog" title="Mensaje.">
                    
                </div>
    		</article>
        </main>

        <?php $page->getScripts(); ?>
        
    </body>
</html>



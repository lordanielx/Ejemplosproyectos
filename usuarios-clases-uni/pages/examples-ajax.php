<?php
   include '../class/masterPage.php';
   $template = new masterPage();
?>
<!DOCTYPE html>
<!--ejemlos AJAX Y PHP
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
                  <h2>Ejemlos AJAX Y PHP</h2>
        <div>
            
                <form name="frmData" id="frmData">
                    <label for="txtNumber1">Número 1</label>
                    <input type="text" name="txtNumber1" id="txtNumber1">
                    <br>
                    <label for="txtNumber2">Número 2</label>
                    <input type="text" name="txtNumber2" id="txtNumber2">
                    <br>
                    <label for="txtResult">Resultado</label>
                    <input type="text" name="txtResult" id="txtResult" readonly="">
                    <br>
                    <input type="button" name="btnSum" id="btnSum" value="SUMAR" class="btn-primary">
                    <input type="button" name="btnSubstraction" id="btnSubstraction" value="RESTA" class="btn-success">
                </form>
            
                 <div id = "edad"></div>
                 <div id = "resultRecords"></div>
                 <div id = "result2"></div>
            </div>
        </div>
          </article>
        </main>
        
        
       
        
     <script src="../assets/js/jquery-3.3.1.js"></script>
     <script type="text/javascript">
                    $(function(){
                        helloWorld();
                        helloWorld2();
                        
                        $('#btnSum').click(function(){
                            var number1 = $('#txtNumber1').val();
                            var number2 = $('#txtNumber2').val();
                            $.ajax({
                                'url': '../queries/sum-ajax.php',
                                'type': 'POST',
                                'data': {'number1': number1, 'number2': number2},
                                'dataType': 'json',
                                'success': function(data){
                                    $('#txtResult').val(data.result);
                                    
                                }
                            });
                        });
                         $('#btnSubstraction').click(function(){
                            $.ajax({
                                'url': '../queries/substraction-ajax.php',
                                'type': 'POST',
                                'data': $('#frmData').serialize(),
                                'dataType': 'json',
                                'success': function(data){
                                    $('#txtResult').val(data.result);
                                    
                                }
                            });
                        });
                    });
                    
                    

                    function helloWorld(){
                        $.ajax({
                            'url': '../queries/hello-world.php',
                            'type': 'POST',
                            'dataType': 'json',
                            'success': function(data){
                                $('#resultRecords').html(data.message + "<br>Fecha:" + data.date);
                            }
                        });

                    }
                     function helloWorld2(){
                        $.ajax({
                            'url': '../queries/hello-world2.php',
                            'type': 'POST',
                            'success': function(data){
                                $('#result2').html(data);
                            }
                        });

                    }
                    function edad(){
                        $.ajax({
                            'url': '../queries/edad.php',
                            'type': 'POST',
                            'dataType': 'json',
                            'success': function(data){
                                $('#edad').html(data.nombre + "<br>Edad:" + data.edad + "<br>" + data.mayor);
                            }
                        });

                    }
                     
            </script>
            
    </body>
</html>

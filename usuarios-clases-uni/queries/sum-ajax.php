<?php

/* 
 * Sumar dos números ingresados por formulario
 */
if (!empty($_POST['number1']) && !empty($_POST['number2'])){
    $number1 =$_POST['number1'];
    $number2 =$_POST['number2'];
    $result = $number1 + $number2;
}
else
{
    $result = "Ingrese los números";
}
 echo json_encode (['result'=> $result]);


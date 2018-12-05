<?php

/* 
 * 
 */
if (!empty($_POST['txtNumber1']) && !empty($_POST['txtNumber2'])){
    $number1 =$_POST['txtNumber1'];
    $number2 =$_POST['txtNumber2'];
    $result = $number1 - $number2;
}
else
{
    $result = "Ingrese los números";
}
 echo json_encode (['result'=> $result]);


<?php

/* 
 * 
 */
if(!empty($_POST['txtName']) && !empty($_POST['txaText'])){
    $fileName = '../assets/files/'. $_POST['txtName'].'.txt';
    $fileContent = $_POST['txaText'];
    $file = fopen ($fileName, 'w+');
    fwrite($file, $fileContent);
    fclose($file);
    $message = "Archivo creado correactamente.";
    
}
else{
    $message = "no suministró datos suficientes para crear el archivo";
}
echo json_encode(['message' => $message]);
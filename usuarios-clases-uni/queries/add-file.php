<?php

/* 
 * 
 */
if(!empty($_POST['txtName']) && !empty($_POST['txaText'])){
    $fileName = '../assets/files/'. $_POST['txtName'].'.txt';
   
    if(file_exists($fileName)){
    $fileContent = "\n".$_POST['txaText'];
    $file = fopen ($fileName, 'a+');
    fwrite($file, $fileContent);
    fclose($file);
    $message = "Archivo modificado correactamente.";
    }else{
        $message ="El archivo modificado no existe.";
    }

}else{
    $message = "no suministró datos suficientes para crear el archivo";
}
echo json_encode(['message' => $message]);

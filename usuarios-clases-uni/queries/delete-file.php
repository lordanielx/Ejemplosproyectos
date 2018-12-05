<?php

/* 
 * 
 */
if (!empty($_POST['fileName'])){
    if(unlink('../assets/files/'. $_POST['fileName'])){
         $message = "Archivo eliminado correactamente.";
        }else{
    $message = "no se pudo eliminar el archivo";
}
}else{
    $message = "no suministró datos suficientes para eliminar el archivo";
}
echo json_encode(['message' => $message]);


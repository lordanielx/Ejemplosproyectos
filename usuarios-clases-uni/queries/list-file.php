<?php

/* 
 * 
 */
$options = "";
$totalFiles =0;
$dir = opendir("../assets/files");
while ($file=readdir($dir)){
    if($file !='.' && $file != '..'){
    
        $options .= "<option value='$file'>" . $file . "</option>";
        $totalFiles ++;
        }
}
    
    $arrayResult = [
        'options' => $options,
        'numberFiles' => $totalFiles
    
    ];
    
    echo json_encode($arrayResult);
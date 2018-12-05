<?php

/* 
 *Modelo para consultar  la tabla usuario
 */
$query = "SELECT *
          FROM usuario";

$con->setQuery($query);
$nreg = $con->totalRecords();    
        


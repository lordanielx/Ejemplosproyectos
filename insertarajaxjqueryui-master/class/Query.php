<?php

/*
 * Clase Query para hacer consultas a las base de datos 
 * heredad de Connection
 */

/**
 * Description of Query
 *
 * @author JHON
 * @version 1.0
 * @creation_date 26/09/2018
 * @package usuarios-clases
 * @class Query
 */
include 'Connection.php';
class Query  extends Connection
{ 
    //Propiedades de la clase
    private $query;
    //Métodos de la clase
     public function __construct() 
    {
         parent::__construct();
         $this->query ="";
    }
    
    public function __destruct()
    {
        parent::__destruct();
    }
    
    function getQuery()
    {
        return $this->query;
    }
    public function getArrayRecord(){
        return mysqli_fetch_array($this->query);
    }
    function setQuery ($query)
    {
        $this->query = mysqli_query($this->getlink(), $query);
    }
    
    public function totalRecords()
    {
        return mysqli_num_rows($this->query);
    }
    
    public function freeQuery()
    {
       mysqli_free_result($this->query);
    }
}

<?php

/**
 * Descripcion clase Query
 *  realizar consultas  ala base de datos  hereda conexionBD
 * @author Gloria
 * @class query
 */
class Query extends  conexionBD
{
    //atributo o propiedad  de la clase 
     private $query;
     
     public function __construct() 
     {
         parent::__construct();
            $this->query="";
     }//fin  del constructor
    
    public function __destruct() 
    {
        parent::__destruct();
    }//fin dedl destructor
    
    // Inicio de la funcion  del get y set
    function getQuery() {
        return $this->query;
    }

    function setQuery($query) {
        $this->query = mysqli_query($this->getLink(), $query);
    }
     //fin de la funcion de  get y set 
    
    public function TotalRecords() 
    {
        return mysqli_num_rows($this->query);    
    }// fin de metodo
    
    public function FreeQuery() 
    {
        mysqli_free_result($this->query); 
    }//fin del metodo
}//fin de la clase 

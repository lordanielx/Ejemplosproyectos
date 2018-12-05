<?php

/**
 * Descripcion para la conexion para la base de datos 
 *  con MySql
 * @class conexionBD
 * @author  Gloria 
 * @date 26 sept 2018
 * @copyright
 */
class conexionBD 
{
    //propiedades o atributo de la clase
    
    private $host;
    private $user;
    private $password;
    private $dataBase;
    private $port;
    private $socket;
    private $link;
    
    //construuctor
    public function __construct() 
    {
        
        $this->host="";
        $this->user="";
        $this->password="";
        $this->dataBase="";
        $this->port="";
        $this->socket="";
        $this->link="";

    }//fin del constructor
    
    //destructor
    public function __destruct() 
    {
        ;
    }//fin de desctutor
    
    // creacion de get y set  de las variables 
    function getHost() {
        return $this->host;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getDataBase() {
        return $this->dataBase;
    }

    function getPort() {
        return $this->port;
    }

    function getSocket() {
        return $this->socket;
    }

    function getLink() {
        return $this->link;
    }

    function setHost($host) {
        $this->host = $host;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDataBase($dataBase) {
        $this->dataBase = $dataBase;
    }

    function setPort($port) {
        $this->port = $port;
    }

    function setSocket($socket) {
        $this->socket = $socket;
    }

    function setLink($link) {
        $this->link = $link;
    }
    //fin de los get y set
    
    public function conexion()
    {
        if(!($this->link=mysqli_connect($this->host, $this->user, $this->password, $this->dataBase, $this->port, $this->socket))){
            echo 'NO SE PUEDE CONECTAR CON EL SERVIDOR';
            exit();
        }//fin de condicional 
        if(!mysqli_select_db($this->link,$this->dataBase)){
            echo 'BASE DE DATOS NO ES VALIDA  VERIFICAR';
            exit();
        }//fin de condicional
    }//fin de clase  conexion 
    
    
}//fin clase conexion

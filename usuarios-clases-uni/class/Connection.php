<?php

/*
 * Clase para conectar la base de datos MySQL
 */

/**
 * Description of Connection
 *
 * @author Jaime
 * @version 1.0
 * @creation_date 26/09/2018
 * @package usuarios-clases
 * @class Connection
 */
class Connection 
{
    // Propiedades de la clase
    private $host;
    private $user;
    private $password;
    private $dataBase;
    private $port;
    private $socket;
    private $link;
    
    
    // Métodos de la clase
    
    public function __construct() 
    {
        $this->host = "";
        $this->user = "";
        $this->password = "";
        $this->dataBase = "";
        $this->port = 0;
        $this->socket = "";
        $this->link = "";
    }
    
    public function __destruct() 
    {
        
    }
    
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

    public function connect()
    {
        if(!($this->link = 
                mysqli_connect($this->host, $this->user, 
                        $this->password, $this->dataBase, 
                        $this->port, $this->socket))){
            echo "No se puede conectar con el servidor";
            exit();
        }
        if(!mysqli_select_db($this->link, $this->dataBase)){
            echo "Base de datos no válida";
            exit();
        }
    }
    
    public function closeConnection() 
    {
        mysqli_close($this->link);
    }
}
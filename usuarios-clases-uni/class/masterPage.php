<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of masterPage
 *
 * @author User
 */
class masterPage
{
    public function __construct() {
        
    }
    public function __destruct() {
        
    }
    public function getHead() {
        include '../pages/templates/head.php';
    }
     public function getHeader() {
        include '../pages/templates/header.php';
    }
     public function getNav() {
        include '../pages/templates/nav.php';
    }
     public function getScripts() {
        include '../pages/templates/scripts.php';
    }
    
}

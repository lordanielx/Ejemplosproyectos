<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session_1 extends CI_Controller 
{

    /**
     * Controlador Session para manejar el inicio de sesión con CodeIgniter y controlar los accesos a las distintas páginas
     */

    private $arrayData;


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelDatabase_1');
    }


    public function __destruct()
    {

    }


    public function index()
    {
        $this->load->view('login', $this->arrayData);
    }
    
    public function validateSession()
    {
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'trim|required');
         $this->form_validation->set_rules('fecha_registro', 'fecha_hora_registro', 'trim|required');
         
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $arrayDataform = [
               'field' => $this->input->post('enterUser'), 
               
                        
            ];
            $arrayResult = $this->ModelDatabase_1->validateLogin($arrayDataform);
            if($arrayResult->num_rows() == 0){
                $this->arrayData['messageConnection'] = "Descripción inválida";
                $this->index();
            }else{
                $this->arrayData['messageConnection'] = "Acceso exitoso. Bienvenido a la aplicación";
              //$this->session->set_user($arrayDataform);
                $this->arrayData['userName'] = $this->input->post('user');
            foreach ($arrayResult->result() as $row){               
                $this->arrayData['fullNameUser'] = $arrayResult->result()->descripcion;            
        } 
        include "Begin_1.php";
        $objBegin=new Begin_1();
        $objBegin->setArraydataSession_1($this->arrayData['userName']);
        $objBegin->setArraydataSession_1('fullNameUser',$this->arrayData['fulNameUser']);
        $objBegin->read();
      }    
     }    
    }
    
    public function closeSession_1()
    {
        $this->session->sess_destroy();
        $this->arrayData['closeDession_1'] = "Sesión finnalizada";
        $this->index();
    }
}
    
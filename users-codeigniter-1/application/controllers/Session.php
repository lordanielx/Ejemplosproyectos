<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller 
{

    /**
     * Controlador Session para manejar el inicio de sesión con CodeIgniter y controlar los accesos a las distintas páginas
     */

    private $arrayData;


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelDatabase');
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
        $this->form_validation->set_rules('user', 'Usuario', 'trim|required');
         $this->form_validation->set_rules('password', 'Contraseña', 'trim|required');
         
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $arrayDataform = [
               'field' => $this->input->post('enterUser'), 
               'data' => $this->input->post('user'),
               'password' => $this->input->post('password')         
            ];
            $arrayResult = $this->ModelDatabase->validateLogin($arrayDataform);
            if($arrayResult->num_rows() == 0){
                $this->arrayData['messageConnection'] = "Usuario o contraseña inválidos";
                $this->index();
            }else{
                $this->arrayData['messageConnection'] = "Acceso exitoso. Bienvenido a la aplicación";
              //$this->session->set_user($arrayDataform);
                $this->arrayData['userName'] = $this->input->post('user');
            foreach ($arrayResult->result() as $row){               
                $this->arrayData['fullNameUser'] = $arrayResult->result()->nombre;            
        } 
        include "Begin.php";
        $objBegin=new Begin();
        $objBegin->setArraydataSession($this->arrayData['userName']);
        $objBegin->setArraydataSession('fullNameUser',$this->arrayData['fulNameUser']);
        $objBegin->read();
      }    
     }    
    }
    
    public function closeSession()
    {
        $this->session->sess_destroy();
        $this->arrayData['closeDession'] = "Sesión finnalizada";
        $this->index();
    }
}
    
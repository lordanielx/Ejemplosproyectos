<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
}











































<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Begin extends CI_Controller {

	/**
	 * Controlador Begin para manejar el CRUD de la aplicación de usuario con CodeIgniter
	 */
    
        public function __construct() {
            parent::__construct();
        }
        
        public function __destruct() {
            
            
        }

        
        public function index()
	{
		
	}
        
        
        public function read()
        {
            $fieldsArray = ['*'];
            $arrayData['resultQuery'] = $this->ModelDatabase->read('usuario', $fieldsArray);
            $this->load->view('users', $arrayData);
        }
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Begin extends CI_Controller {

	/**
	 * Controlador Begin para manejar el CRUD de la aplicación de usuario con CodeIgniter
	 */
        private $arrayData;


        public function __construct() {
            parent::__construct();
            $this->load->model('ModelDatabase');
        }
        
        public function __destruct() {
            
            
        }

        
        public function index()
	{
		
	}
        
        
        public function read()
        {
            $fieldsArray = ['*'];
            $this->arrayData['resultQuery'] = $this->ModelDatabase->read('usuario', $fieldsArray);
            $this->arrayData['totalRows'] = $this->ModelDatabase->totalRecords('usuario');
            $this->load->view('users', $this->arrayData);
        }
        
        public function delete($table="", $id=-1)
        {
            $arrayClause = ['id' => $id];
            if($this->ModelDatabase->delete($table, $arrayClause)){
            $this->arrayData['messageDelete'] = "<b>Registro eliminado</b>";
            
        }else 
            {            
            $this->arrayData['messageDelete'] = "<b>El registro no pudo ser eliminado</b>";    
        }
        $this->read();
    }
    
    public function find($table, $id)
    {
        $arrayRecord = $this->ModelDatabase->find($table, $id);
        
        if($arrayRecord->num_rows() > 0)
            {
            $this->arrayData['record'] = $arrayRecord;
            
        }else{
            $this->arrayData['messageUpdate'] = "<i>El registro solicitado no existe en la base de datos</i>";
    }
    $this->read();
}
}

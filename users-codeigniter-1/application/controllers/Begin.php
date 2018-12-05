<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Begin extends CI_Controller 
{

    /**
     * Controlador Begin para manejar el CRUD de la aplicación de usuario con CodeIgniter
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

    }
    
    public function setArraydataSession($user, $name)
    {
        $this->arrayData[$user] = $name;
    }

        public function read()
    {
        //configuración de la paginación
        $pagination = 8;
        $config['base_url'] = base_url() . "index.php/begin/read";
        $config['total_rows'] = $this->ModelDatabase->totalRecords('usuario');
        $config['num_links'] = 2;
        $config['per_page'] = $pagination;
        $config['first_link'] = "<< Primero";
        $config['prev_link'] = "< Anterior";
        $config['next_link'] = " Siguiente";
        $config['last_link'] = " Último>>";
        $config['full_tag_open'] = "<div id='pagination' style='color:gray;'>";
        $config['full_tag_close'] = "</div>";
        
        $this->pagination->initialize($config);
        
        $this->arrayData['pagination'] = $this->pagination->create_links();
        
    	$fieldsArray = ['*'];
    	$this->arrayData['resultQuery'] = $this->ModelDatabase->read('usuario', $fieldsArray, $pagination, $this->uri->segment(3));
        $this->arrayData['totalRows'] = $this->ModelDatabase->totalRecords('usuario');
    	$this->load->view('users', $this->arrayData);
    }


    public function delete($table="", $id=-1)
    {
        $arrayClause = ['id' => $id];
        if($this->ModelDatabase->delete($table, $arrayClause)){
            $this->arrayData['messageDelete'] = "<b>Registro eliminado</b>";
        }else{
            $this->arrayData['messageDelete'] = "<b>El registro no pudo ser eliminado</b>";
        }
        $this->read();
    }


    public function find($table="", $field="", $value="")
    {
        $arrayRecord = $this->ModelDatabase->find($table, $field, $value);

        if($arrayRecord->num_rows() > 0){
            $this->arrayData['record'] = $arrayRecord;
        }else{
            $this->arrayData['messageUpdate'] = "<i>El registro solicitado no existe en la base de datos</i>";
        }
        $this->read();
    }


    public function save()
    {
        $this->form_validation->set_rules('user', 'Usuario', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('name', 'Nombre', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'Correo', 'trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|min_length[3]|max_length[30]|matches[passwordConfirm]');
        $this->form_validation->set_rules('passwordConfirm', 'Confirmar contraseña', 'trim|required|min_length[3]|max_length[30]');

        if($this->form_validation->run() != FALSE){
            $arrayRecord = [
                'usuario' => $this->input->post('user'),
                'nombre' => $this->input->post('name'),
                'correo' => $this->input->post('email'),
                'clave' => $this->input->post('password')
            ];
            if($this->input->post('id') == ""){
                //Insert
                $arrayRecordFind = $this->ModelDatabase->find('usuario', 'usuario', $this->input->post('user'));
                if($arrayRecordFind->num_rows() > 0){
                    $this->arrayData['messageSave'] = '<i>Este usuario ya se encuentra registrado</i>';
                }else{
                    if($this->ModelDatabase->insert('usuario', $arrayRecord)){
                        $this->arrayData['messageSave'] = '<b>Se insertó el registro correctamente</b>';
                    }else{
                        $this->arrayData['messageSave'] = '<b>No se pudo guardar el registro</b>';
                    }
                }

                
            }else{
                //Update
                if($this->ModelDatabase->update('usuario', $arrayRecord, $this->input->post('id'))){
                    $this->arrayData['messageSave'] = '<b>Se actualizó el registro correctamente</b>';
                }else{
                    $this->arrayData['messageSave'] = '<b>No se pudo guardar el registro</b>';
                }
            }
        }
        $this->read();
    }


}

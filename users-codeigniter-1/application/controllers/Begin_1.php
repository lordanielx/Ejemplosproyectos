<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Begin_1 extends CI_Controller 
{

    /**
     * Controlador Begin para manejar el CRUD de la aplicación de usuario con CodeIgniter
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

    }
    
    public function setArraydataSession_1($fecha_hora_registro, $fecha_registro)
    {
        $this->arrayData[$fecha_hora_registro] = $fecha_registro;
    }

        public function read1()
    {
        //configuración de la paginación
        $pagination = 3;
        $config['base_url'] = base_url() . "index.php/begin_1/read1";
        $config['total_rows'] = $this->ModelDatabase_1->totalRecords('perfil');
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
    	$this->arrayData['resultQuery'] = $this->ModelDatabase_1->read1('perfil', $fieldsArray, $pagination, $this->uri->segment(3));
        $this->arrayData['totalRows'] = $this->ModelDatabase_1->totalRecords('perfil');
    	$this->load->view('users_1', $this->arrayData);
    }


    public function delete1($table="", $id=-1)
    {
        $arrayClause = ['id' => $id];
        if($this->ModelDatabase_1->delete1($table, $arrayClause)){
            $this->arrayData['messageDelete'] = "<b>Registro eliminado</b>";
        }else{
            $this->arrayData['messageDelete'] = "<b>El registro no pudo ser eliminado</b>";
        }
        $this->read1();
    }


    public function find($table="", $field="", $value="")
    {
        $arrayRecord = $this->ModelDatabase_1->find($table, $field, $value);

        if($arrayRecord->num_rows() > 0){
            $this->arrayData['record'] = $arrayRecord;
        }else{
            $this->arrayData['messageUpdate'] = "<i>El registro solicitado no existe en la base de datos</i>";
        }
        $this->read1();
    }


    public function save1()
    {
        $this->form_validation->set_rules('description', 'descripcion', 'trim|required|min_length[8]|max_length[200]');
        $this->form_validation->set_rules('fecha_registro', 'fecha_registro', 'trim|required|min_length[6]|max_length[20]');
        

        if($this->form_validation->run() != FALSE){
            $arrayRecord = [
                'descripcion' => $this->input->post('description'),
                'fecha_hora_registro' => $this->input->post('fecha_registro'),
                
            ];
            if($this->input->post('id') == ""){
                //Insert
                $arrayRecordFind = $this->ModelDatabase_1->find('perfil', 'descripcion','fecha_hora_registro', $this->input->post('description','fecha-registro'));
                if($arrayRecordFind->num_rows() > 0){
                    $this->arrayData['messageSave'] = '<i>Este ya se encuentra registrado</i>';
                }else{
                    if($this->ModelDatabase_1->insert('perfil', $arrayRecord)){
                        $this->arrayData['messageSave'] = '<b>Se insertó el registro correctamente</b>';
                    }else{
                        $this->arrayData['messageSave'] = '<b>No se pudo guardar el registro</b>';
                    }
                }

                
            }else{
                //Update
                if($this->ModelDatabase_1->update('perfil', $arrayRecord, $this->input->post('id'))){
                    $this->arrayData['messageSave'] = '<b>Se actualizó el registro correctamente</b>';
                }else{
                    $this->arrayData['messageSave'] = '<b>No se pudo guardar el registro</b>';
                }
            }
        }
        $this->read1();
    }


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Modelo para realizar consultas a la base de datos
 */

/**
 * Description of ModelDatabase
 *
 * @author 209
 */
class ModelDatabase extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }


    public function __destruct()
    {

    }


    public function index()
    {

    }


    public function read($table, $fieldsArray,
            $pagination, $segment)
    {
    	$this->db->select($fieldsArray);
    	$this->db->from($table);
        $this->db->limit($pagination, $segment);
    	return $this->db->get();
    }


    public function totalRecords($table)
    {
        return $this->db->get($table)->num_rows();
    }


    public function delete($table, $arrayClause)
    {
        return $this->db->delete($table, $arrayClause);
    }


    public function find($table, $field, $value)
    {
        $this->db->where("UPPER($field)", strtoupper($value));
        return $this->db->get($table);
    }


    public function update($table, $record, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $record);
    }


    public function insert($table, $record)
    {
        return $this->db->insert($table, $record);
    }
    
    public function validateLogin($arrayRecord)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where($arrayRecord['field'], $arrayRecord['data']);
        $this->db->where('clave', $arrayRecord['password']);
        
        return $this->db->get();
    }

}

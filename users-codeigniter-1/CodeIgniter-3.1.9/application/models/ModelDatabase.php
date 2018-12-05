<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 Modelo para realizar consultas 
 */

/**
 * Description of ModelDatabase
 *
 * @author 209
 */
class ModelDatabase extends CI_Model{
    
    public function __construct() {
            parent::__construct();
        }
        
        public function __destruct() {
            
            
        }

        
        public function index()
	{
		
	}
        
        
        public function read($table, $fieldsArray)
        {
            $this->db->select($fieldsArray);
            $this->db->from($table);
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
        
        public function find($table, $id) 
        {
            $this->db->where('id', $id);//where id= '$id'
            return $this->db->get($table);
            
        }
        
        public function update($table, $record, $id)
        {
            $this->where('id', $id);
            return $this->update($table, $record);
        }
}

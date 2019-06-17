<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_model extends CI_Model {


	function InsertDB($Table,$data){   //Insert Data into Database
		$Id=$this->db->insert($Table,$data);
		if($Id>0){
				return $this->db->insert_id();
	   }else{
			 return 0;
		 }
	}
	function GetAllData($Table,$limit = NULL, $start = NULL){   //Insert Data into Database
	 	$this->db->select("*");
	   $this->db->from($Table);
		 $this->db->limit($limit, $start);
	   $query = $this->db->get();
		 if ($query->num_rows() > 0 ){
		   return $query->result_array();
		 }else{
			 return false;
		 }
	}
	public function get_count($Table) {
        return $this->db->count_all($Table);
    }

}

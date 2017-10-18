<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }
}

/**
 * Custom model for CRUD.
 * 
 * @author John Benedict Cruz Legaspi
 */
class MY_CRUD_Model extends CI_Model {
  public function __construct(){
		parent::__construct();
	}

	public function fetch($table,$where="",$limit="",$offset="",$order="",$join=""){
			if (!empty($where)) {
				$this->db->where($where);	
			}
			if (!empty($join)) {
				foreach ($join as $key => $value) {
					$this->db->join($key,$value);	
				}
			}
			if (!empty($limit)) {
				if (!empty($offset)) {
					$this->db->limit($limit, $offset);
				}else{
					$this->db->limit($limit);	
				}
			}
			if (!empty($order)) {
				$this->db->order_by($order); 
			}

			$query = $this->db->get($table);
			if ($query->num_rows() > 0) {
				return $query->result();
			}else{
				return FALSE;
			}
		}

	public function insert($table,$data){
		$result = $this->db->insert($table,$data);
		if (isset($result)) {
				return TRUE;
			}else{
				return FALSE;
			}
	}

	public function update($table,$data,$where=""){
		if($where!=""){
				$this->db->where($where);
			}
		$result = $this->db->update($table,$data);
		if (isset($result)) {
				return TRUE;
			}else{
				return FALSE;
			}
	}

	public function delete($table,$where=""){
		if($where!=""){
				$this->db->where($where);
			}
	 	$result = $this->db->delete($table); 
	 		if (isset($result)) {
				return TRUE;
			}else{
				return FALSE;
			}
	}

	 public function getCount($table,$where=""){
    		if (!empty($where)) {
				$this->db->where($where);	
			}

    		$query = $this->db->get($table);
			if ($query->num_rows() > 0) {
				return $query->num_rows();
			}else{
				return 0;
			}
    }
}

?>
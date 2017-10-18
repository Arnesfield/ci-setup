<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
}

/**
 * Custom model for CRUD.
 * 
 * @author John Benedict Cruz Legaspi
 * @author Jefferson Rylee
 */
class MY_CRUD_Model extends MY_Model {
  public function __construct(){
    parent::__construct();
  }

  /**
   * Reads from a table in the database.
   * 
   * $cond is an associative array with the following keys:
   * 'where', 'limit', 'offset', 'order_by', 'join'
   *
   * @param string $table Name of the table
   * @param array $cond An associative array
   * @return mixed Returns result_array() of query or FALSE if none
   */
  public function _read($table, $cond = array()) {
    // turn keys to variables
    foreach ($cond as $key => $value) {
      // only when $key is part of possibilities
      if (in_array(strtolower($key), array('where', 'limit', 'offset', 'order_by', 'join'), TRUE)) {
        $$key = $value;
      }
    }

    // add conditiona
    if (!empty($where)) {
      $this->db->where($where);
    }

    if (!empty($join)) {
      foreach ($join as $key => $value) {
        $this->db->join($key, $value);
      }
    }

    if (!empty($limit)) {
      $this->db->limit($limit, !empty($offset) ? $offset : 0);
    }

    if (!empty($order_by)) {
      $this->db->order_by($order_by[0], $order_by[1]);
    }

    // query
    $query = $this->db->get($table);
    return $query->num_rows() > 0 ? $query->result_array() : FALSE;
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
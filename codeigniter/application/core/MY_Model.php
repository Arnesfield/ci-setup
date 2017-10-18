<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
}

/**
 * Custom model for CRUD (create, read, update, delete).
 * 
 * @author John Benedict Cruz Legaspi
 * @author Jefferson Rylee
 */
class MY_CRUD_Model extends MY_Model {
  public function __construct(){
    parent::__construct();
  }

  /**
   * Inserts a row in a table in the database.
   *
   * @param string $table Name of table
   * @param array $data An associative array of insert values
   * @return bool TRUE if insert was successful; otherwise, FALSE
   */
  public function _create($table, $data = array()){
    return $this->db->insert($table, $data);
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

  /**
   * Updates a row in a table in the database.
   *
   * @param string $table Name of the table
   * @param array $data An associative array of update values
   * @param array $where An associative array of conditiona
   * @return bool TRUE if update was successful; otherwise, FALSE
   */
  public function _update($table, $data, $where = NULL) {
    return $this->db->update($table, $data, $where);
  }

  /**
   * Deletes a row from table(s) in the database.
   *
   * @param mixed $table The table(s) to delete from
   * @param string $where An associative array of conditions
   * @return bool TRUE if delete was successful; otherwise, FALSE
   */
  public function _delete($table, $where = '') {
    return $this->db->delete($table, $where) !== NULL;
  }

  /**
   * Get the number of rows based on a condition from a table in the database.
   *
   * @param string $table Name of the table
   * @param array $where An associative array of conditions
   * @return int Number of rows
   */
  public function _get_count($table, $where = NULL) {
    return $this->db->get_where($table, $where)->num_rows();
  }
}

?>
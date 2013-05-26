<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Payment_methods_model extends CI_Model {

  public $table_name = 'payment_methods';
 
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
 
  /**
   * This funtion takes id as a parameter and will fetch the record.
   * If id is not provided, then it will fetch all the records form the table.
   * @param int $id
   * @return mixed
   */
  public function get($id = null) {
    $this->db->select()->from($this->table_name);
 
    // where condition if id is present
    if ($id != null) {
      $this->db->where('id', $id);
    }
    else {
      $this->db->order_by('id');
    }
 
    $query = $this->db->get();
 
    if ($id != null) {
      return $query->row_array(); // single row
    }
    else {
      return $query->result_array(); // array of result
    }
  }

  public function get_payment_methods_dropdown() {
    $this->db->from($this->table_name);
    $this->db->order_by('id');
    $result = $this->db->get();
    $return = array();
    if($result->num_rows() > 0) {
      $return[''] = 'Please select...';
      foreach($result->result_array() as $row) {
        $return[$row['id']] = $row['name'];
      }
    }
      
    return $return;
  }
 
  /**
   * This function will delete the record based on the id
   * @param $id
   */
  public function remove($id) {
    $this->db->where('id', $id);
    $this->db->delete($this->table_name);
  }
 
  /**
   * This function will take the post data passed from the controller
   * If id is present, then it will do an update
   * else an insert. One function doing both add and edit.
   * @param $data
   */
  public function add($data) {
    if (isset($data['id'])) {
      $this->db->where('id', $data['id']);
      $this->db->update($this->table_name,$data); // update the record
    }
    else {
      $this->db->insert($this->table_name, $data); // insert new record
    }
  }
}
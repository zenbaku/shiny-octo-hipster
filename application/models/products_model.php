<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Products_model extends CI_Model {
 
  public $table_name = 'products';

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
    $this->db->select('
      products.id, products.name, products.description, products.price, products.stock,
      products.published_by,products.published_at,

      users.username AS provider_name
    ');
    $this->db->from('products');
    $this->db->join('users', 'users.id = products.published_by');

    // where condition if id is present
    if ($id != null) {
      $this->db->where('products.id', $id);
    }
    else {
      $this->db->order_by('products.id');
    }
 
    $query = $this->db->get();
 
    if ($id != null) {
      return $query->row_array(); // single row
    }
    else {
      return $query->result_array(); // array of result
    }
  }
 
  /**
   * This function will delete the record based on the id
   * @param $id
   */
  public function remove($id) {
    $this->db->where('id', $id);
    $this->db->delete('products');
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
      $this->db->update('products',$data); // update the record
    }
    else {
      $this->db->insert('products', $data); // insert new record
    }
  }
}
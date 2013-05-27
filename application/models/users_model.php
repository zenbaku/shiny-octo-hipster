<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Users_model extends CI_Model {

  public $table_name = 'users';
  public $provider_id = 1;
  public $client_id = 3;
  public $admin_id = 7;
 
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
      users.id, users.username, users.email, users.firstname, users.lastname,
      users.rut, users.address, users.phone, users.registered_at, users.accessed_at,
      
      user_types.id AS user_type_id, user_types.name AS user_type_name
    ');
    $this->db->from('users');
    $this->db->join('user_types', 'user_types.id = users.user_type_id');
 
    // where condition if id is present
    if ($id != null) {
      $this->db->where('users.id', $id);
    }
    else {
      $this->db->order_by('users.id');
    }
 
    $query = $this->db->get();
 
    if ($id != null) {
      return $query->row_array(); // single row
    }
    else {
      return $query->result_array(); // array of result
    }
  }

  public function get_providers_dropdown() {
    $this->db->from($this->table_name);
    $this->db->order_by('id');
    // ehhh
    $this->db->where('users.user_type_id', $this->provider_id);
    $result = $this->db->get();
    $return = array();
    if($result->num_rows() > 0) {
      $return[''] = 'Please select...';
      foreach($result->result_array() as $row) {
        $return[$row['id']] = $row['username'];
      }
    }
      
    return $return;
  }

  public function get_clients_dropdown() {
    $this->db->from($this->table_name);
    $this->db->order_by('id');
    // ehhh
    $this->db->where('users.user_type_id', $this->client_id);
    $result = $this->db->get();
    $return = array();
    if($result->num_rows() > 0) {
      $return[''] = 'Please select...';
      foreach($result->result_array() as $row) {
        $return[$row['id']] = $row['username'];
      }
    }
      
    return $return;
  }

  public function login($username, $password)
  {
    $this->db->select('id, username, password, user_type_id, firstname, lastname, email');
    $this->db->from('users');
    $this->db->where('username', $username);
    $this->db->where('password', MD5($password));
    $this->db->limit(1);

    $query = $this -> db -> get();
    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }
 
  /**
   * This function will delete the record based on the id
   * @param $id
   */
  public function remove($id) {
    $this->db->where('id', $id);
    $this->db->delete('users');
  }
 
  /**
   * This function will take the post data passed from the controller
   * If id is present, then it will do an update
   * else an insert. One function doing both add and edit.
   * @param $data
   */
  public function add($data) {
    $data['password'] = MD5($data['password']);
    if (isset($data['id'])) {
      $this->db->where('id', $data['id']);
      $this->db->update('users',$data); // update the record
    }
    else {
      $this->db->insert('users', $data); // insert new record
    }
  }
}
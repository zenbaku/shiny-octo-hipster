<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Sales_model extends CI_Model {
 
  public $table_name = 'sales';
  
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
      sales.id, sales.user_id, sales.payment_method_id, sales.created_at,

      users.username AS client,
      payment_methods.name AS payment_method
    ');
    $this->db->from('sales');
    $this->db->join('users', 'users.id = sales.user_id');
    $this->db->join('payment_methods', 'payment_methods.id = sales.payment_method_id');

    // where condition if id is present
    if ($id != null) {
      $this->db->where('sales.id', $id);
    }
    else {
      $this->db->order_by('sales.id');
    }
 
    $query = $this->db->get();

    $result = null;

    if ($id != null) {
      $result = $query->row_array(); // single row
    }
    else {
      $result = $query->result_array(); // array of result
    }

    // Second hit... we need to check performance for this one
    if ($id != null) {
      $result['products'] = $this->get_products_for_sale($id);
    } else {
      foreach ($result as $i => $sale) {
        $result[$i]['products'] = $this->get_products_for_sale($sale['id']);
      }
    }

    return $result;
  }

  public function get_products_for_sale($sale_id)
  {
    $this->db->select('sale_id, product_id, products.name, products_sales.quantity');
    $this->db->join('products', 'products.id = products_sales.product_id');
    $this->db->where('sale_id', $sale_id);
    return $this->db->get('products_sales')->result_array();    
  }
 
  /**
   * This function will delete the record based on the id
   * @param $id
   */
  public function remove($id) {
    $this->db->where('id', $id);
    $this->db->delete('sales');
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
      $this->db->update('sales', $data); // update the record
    }
    else {
      $this->db->insert('sales', $data); // insert new record
    }
  }
}
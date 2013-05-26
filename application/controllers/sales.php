<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Sales extends CI_Controller {
 
  // calling the constructor
  public function __construct() {
    parent::__construct();
    $this->load->model('sales_model', 'sales');
    $this->load->model('users_model', 'users');
    $this->load->model('payment_methods_model', 'payment_methods');
    
    $this->load->model('products_model', 'products');
  }
 
  public function index() {
    redirect('sales/listing');
  }
 
  /**
   * This function will display the list of sales
   * data coming from the model
   */
  public function listing() {
    $data['header']['title'] = 'Sales listing';
    $data['view_name'] = 'sales/sales_listing_view';

    $sales = $this->sales->get();
    $data['view_data'] = $sales;
 
    $this->load->helper('sales_helper');
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form to add a new sale
   */
  public function add() {
    $data['header']['title'] = 'Add a new product';
    $data['view_name'] = 'sales/sales_add_view';
    $data['view_data']['clients'] = $this->users->get_clients_dropdown();
    $data['view_data']['payment_methods'] = $this->payment_methods->get_payment_methods_dropdown();
    $data['view_data']['products'] = $this->products->get();;

    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form for editing a sale
   * the get function used to fetch the sale info
   * [If no id, then it should display error]
   * @param int $id
   */
  public function modify($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $data['header']['title'] = 'Edit a sale';
      $data['view_name'] = 'sales/sales_edit_view';
      $data['view_data'] = $this->sales->get($id);
      $data['view_data']['clients'] = $this->users->get_clients_dropdown();
      $data['view_data']['payment_methods'] = $this->payment_methods->get_payment_methods_dropdown();
      $data['view_data']['products_list'] = $this->products->get();


      $this->load->view('page_view', $data);
    }
  }
 
  /**
   * This function deletes a sale from the database
   * and redirects back to the listing
   * @param int $id
   */
  public function remove($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      // BEGIN TRANSACTION
      $this->db->trans_start();
      $this->db->delete('products_sales', array('sale_id' => $id)); 
      $this->sales->remove($id);

      $this->db->trans_complete();

      if ($this->db->trans_status() === false) {
        show_error('Transaction failed', 500);
      }

      redirect('sales/listing'); // back to the listing
    }
  }
 
  /**
   * This function will call the model add function
   * and add the new sale.
   */
  public function save() {
    if (isset($_POST) && $_POST['save'] == 'Add') {
      $this->load->helper('sales_helper');

      // BEGIN TRANSACTION
      $this->db->trans_start();

      // Save the sale....
      $data['user_id'] = $this->input->post('user_id');
      $data['payment_method_id'] = $this->input->post('payment_method_id');
      $this->sales->add($data);

      // And the products
      $products = filter_out_zero_products($this->input->post('products'));
      $products_data = array();
      foreach ($products as $product_id => $quantity) {
        $products_data[] = array(
          'product_id' => $product_id,
          'sale_id' => $this->db->insert_id(),
          'quantity' => $quantity
        );
      }

      $this->db->insert_batch('products_sales', $products_data);

      // END TRANSACTION
      $this->db->trans_complete();

      if ($this->db->trans_status() === false) {
        echo 'Error :(';
        die();
      }

      redirect('sales/listing'); // back to the add form
    }
    else {
      redirect('sales/listing');
    }
  }
 
  /**
   * This function will update the info of the existing user type
   */
  public function update() {
    if (isset($_POST) && $_POST['save'] == 'Save') {
      $this->load->helper('sales_helper');

      // BEGIN TRANSACTION
      $this->db->trans_start();

      // First, we need to edit the sale...
      $data['id'] = $this->input->post('id');
      $data['user_id'] = $this->input->post('user_id');
      $data['payment_method_id'] = $this->input->post('payment_method_id');
      $this->sales->add($data);

      // Then, update its products, for this, we first delete all the products of the sale, and the
      // the new ones
      $this->db->delete('products_sales', array('sale_id' => $data['id'])); 

      // And add the products again
      $products = filter_out_zero_products($this->input->post('products'));
      $products_data = array();
      foreach ($products as $product_id => $quantity) {
        $products_data[] = array(
          'product_id' => $product_id,
          'sale_id' => $data['id'],
          'quantity' => $quantity
        );
      }

      $this->db->insert_batch('products_sales', $products_data);

      // END TRANSACTION
      $this->db->trans_complete();

      if ($this->db->trans_status() === false) {
        echo 'Error :(';
        die();
      }

      redirect('sales/listing'); // back to the add form
    }
    else {
      die();
      redirect('sales/listing');
    }
  }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Payment_methods extends CI_Controller {
 
  // calling the constructor
  public function __construct() {
    parent::__construct();
    $this->load->model('payment_methods_model', 'payment_methods');
  }
 
  public function index() {
    redirect('payment_methods/listing');
  }
 
  /**
   * This function will display the list of payment methods
   * data coming from the model
   */
  public function listing() {
    $data['header']['title'] = 'Payment Methods listing';
    $data['view_name'] = 'payment_methods/payment_methods_listing_view';
    $data['view_data'] = $this->payment_methods->get();
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form to add a new payment method
   */
  public function add() {
    $data['header']['title'] = 'Add a new payment method';
    $data['view_name'] = 'payment_methods/payment_methods_add_view';
    $data['view_data'] = '';
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form for editing a payment method
   * the get function used to fetch the payment method
   * [If no id, then it should display error]
   * @param int $id
   */
  public function modify($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $data['header']['title'] = 'Edit a payment method';
      $data['view_name'] = 'payment_methods/payment_methods_edit_view';
      $data['view_data'] = $this->payment_methods->get($id);
 
      $this->load->view('page_view', $data);
    }
  }
 
  /**
   * This function deletes a payment method from the database
   * and redirects back to the listing
   * @param int $id
   */
  public function remove($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $this->payment_methods->remove($id);
      redirect('payment_methods/listing'); // back to the listing
    }
  }
 
  /**
   * This function will call the model add function
   * and add the new payment method.
   */
  public function save() {
    if (isset($_POST) && $_POST['save'] == 'Add') {
      $data['name'] = $this->input->post('name');
 
      $this->payment_methods->add($data);
      redirect('payment_methods/listing'); // back to the add form
    }
    else {
      redirect('payment_methods/listing');
    }
  }
 
  /**
   * This function will update the info of the existing payment method
   */
  public function update() {
    if (isset($_POST) && $_POST['save'] == 'Save') {
      $data['id'] = $this->input->post('id');
      $data['name'] = $this->input->post('name');
 
      $this->payment_methods->add($data);
      redirect('payment_methods/listing'); // back to the add form
    }
    else {
      redirect('payment_methods/listing');
    }
  }
}
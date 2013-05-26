<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class User_types extends CI_Controller {
 
  // calling the constructor
  public function __construct() {
    parent::__construct();
    $this->load->model('user_types_model', 'user_types');
  }
 
  public function index() {
    redirect('user_types/listing');
  }
 
  /**
   * This function will display the list of user types
   * data coming from the model
   */
  public function listing() {
    $data['header']['title'] = 'User Types listing';
    $data['view_name'] = 'user_types/user_types_listing_view';
    $data['view_data'] = $this->user_types->get();
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form to add a user type
   */
  public function add() {
    $data['header']['title'] = 'Add a new user type';
    $data['view_name'] = 'user_types/user_types_add_view';
    $data['view_data'] = '';
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form for editing a user type
   * the get function used to fetch the user type info
   * [If no id, then it should display error]
   * @param int $id
   */
  public function modify($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $data['header']['title'] = 'Edit a user type';
      $data['view_name'] = 'user_types/user_types_edit_view';
      $data['view_data'] = $this->user_types->get($id);
 
      $this->load->view('page_view', $data);
    }
  }
 
  /**
   * This function deletes a user type from the database
   * and redirects back to the listing
   * @param int $id
   */
  public function remove($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $this->user_types->remove($id);
      redirect('user_types/listing'); // back to the listing
    }
  }
 
  /**
   * This function will call the model add function
   * and add the new user type.
   */
  public function save() {
    if (isset($_POST) && $_POST['save'] == 'Add') {
      $data['name'] = $this->input->post('name');
 
      $this->user_types->add($data);
      redirect('user_types/listing'); // back to the add form
    }
    else {
      redirect('user_types/listing');
    }
  }
 
  /**
   * This function will update the info of the existing user type
   */
  public function update() {
    if (isset($_POST) && $_POST['save'] == 'Save') {
      $data['id'] = $this->input->post('id');
      $data['name'] = $this->input->post('name');
 
      $this->user_types->add($data);
      redirect('user_types/listing'); // back to the add form
    }
    else {
      redirect('user_types/listing');
    }
  }
}
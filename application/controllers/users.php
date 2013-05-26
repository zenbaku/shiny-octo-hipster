<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Users extends CI_Controller {
 
  // calling the constructor
  public function __construct() {
    parent::__construct();
    $this->load->model('users_model', 'users');
    $this->load->model('user_types_model', 'user_types');
  }
 
  public function index() {
    redirect('users/listing');
  }
 
  /**
   * This function will display the list of users
   * data coming from the model
   */
  public function listing() {
    $data['header']['title'] = 'Users listing';
    $data['view_name'] = 'users/users_listing_view';

    $users = $this->users->get();
    $data['view_data'] = $users;
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form to add a new user
   */
  public function add() {
    $data['header']['title'] = 'Add a new user';
    $data['view_name'] = 'users/users_add_view';
    $data['view_data']['user_types'] = $this->user_types->get_user_types_dropdown();
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form for editing a user
   * the get function used to fetch the user info
   * [If no id, then it should display error]
   * @param int $id
   */
  public function modify($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $data['header']['title'] = 'Edit a user';
      $data['view_name'] = 'users/users_edit_view';
      $data['view_data'] = $this->users->get($id);
      $data['view_data']['user_types'] = $this->user_types->get_user_types_dropdown();
 
      $this->load->view('page_view', $data);
    }
  }
 
  /**
   * This function deletes a user from the database
   * and redirects back to the listing
   * @param int $id
   */
  public function remove($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $this->users->remove($id);
      redirect('users/listing'); // back to the listing
    }
  }
 
  /**
   * This function will call the model add function
   * and add the new user.
   */
  public function save() {
    if (isset($_POST) && $_POST['save'] == 'Add') {

      $data['user_type_id'] = $this->input->post('user_type_id');
      $data['username'] = $this->input->post('username');
      $data['password'] = $this->input->post('password');
      $data['email'] = $this->input->post('email');
      $data['firstname'] = $this->input->post('firstname');
      $data['lastname'] = $this->input->post('lastname');
      $data['rut'] = $this->input->post('rut');
      $data['address'] = $this->input->post('address');
      $data['phone'] = $this->input->post('phone');
 
      $this->users->add($data);
      redirect('users/listing'); // back to the add form
    }
    else {
      redirect('users/listing');
    }
  }
 
  /**
   * This function will update the info of the existing user type
   */
  public function update() {
    if (isset($_POST) && $_POST['save'] == 'Save') {
      $data['id'] = $this->input->post('id');

      $data['username'] = $this->input->post('username');
      $data['email'] = $this->input->post('email');
      $data['firstname'] = $this->input->post('firstname');
      $data['lastname'] = $this->input->post('lastname');
      $data['rut'] = $this->input->post('rut');
      $data['address'] = $this->input->post('address');
      $data['phone'] = $this->input->post('phone');
      $data['registered_at'] = $this->input->post('registered_at');
      $data['accessed_at'] = $this->input->post('accessed_at');
 
      $this->users->add($data);
      redirect('users/listing'); // back to the add form
    }
    else {
      redirect('users/listing');
    }
  }
}
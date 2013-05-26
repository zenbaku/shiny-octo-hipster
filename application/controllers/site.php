<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Site extends CI_Controller {

  // calling the constructor
  public function __construct() {
    parent::__construct();    
    $this->load->model('users_model', 'users');
  }
 
  // this is the home page
  public function index() {
    if($this->session->userdata('logged_in')) {
      redirect('home');
    } else {
      //If no session, redirect to login page
      redirect('site/login');
    }
  }

  public function login() {
    $data['header']['title'] = 'Login';
    $data['view_name'] = 'login';
    $data['view_data'] = array();

    $this->load->helper(array('form'));

    $this->load->view('login', $data);
  }

  public function verifylogin() {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

    if($this->form_validation->run() == false) {
      //Field validation failed.  User redirected to login page
      $this->load->view('login');
    } else {
      //Go to private area
      redirect('home');
    }
  }

  public function logout() {
    $this->session->unset_userdata('logged_in');
    session_destroy();
    redirect('site/login');
  }

  public function check_database($password) {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');

    //query the database
    $result = $this->users->login($username, $password);

    if (is_array($result)) {
      $result = $result[0];
    }

    if ($result) {
      $session_array = array();
      $session_array = array(
        'id' => $result->id,
        'user_type_id' => $result->user_type_id,
        'username' => $result->username,
        'firstname' => $result->firstname,
        'lastname' => $result->lastname,
        'email' => $result->email
      );
      $this->session->set_userdata('logged_in', $session_array);
      $regr = $this->session->userdata('logged_in');
      return true;
    } else {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    } 
  }
}
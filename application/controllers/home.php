<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $con = $this->router->fetch_class(); // class = controller
    $act = $this->router->fetch_method();
  }
 
  // this is the home page
  public function index() {

    if($this->session->userdata('logged_in')) {
      $session_data = $this->session->userdata('logged_in');
      $data['user'] = $user = $session_data;

      $data['header']['title'] = 'Home page';
      $data['footer']['scripts']['homescript.js'] = 'home';

      // CLIENT
      // SACAR ESTE TRUE
      if (true || $user['user_type_id'] == 3) {
        $this->load->model('products_model', 'products');
        $data['products'] = $this->products->get();
      }

      // PROVIDER
      // SACAR ESTE TRUE
      if (true || $user['user_type_id'] == 1) {
        // Load something?
      }

      $data['view_name'] = 'home';
      $data['view_data'] = array();

      $this->load->view('page_view', $data);
    } else {
      //If no session, redirect to login page
      redirect('site/login', 'refresh');
    }
  }

}
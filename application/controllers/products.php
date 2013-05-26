<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Products extends CI_Controller {
 
  // calling the constructor
  public function __construct() {
    parent::__construct();
    $this->load->model('products_model', 'products');
    $this->load->model('users_model', 'users');
  }
 
  public function index() {
    redirect('products/listing');
  }

  public function show($id) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $data['header']['title'] = 'Product Details';
      $data['view_name'] = 'products/products_show_view';
      $data['view_data'] = $this->products->get($id);
      // $data['view_data']['providers'] = $this->users->get_providers_dropdown();
 
      $this->load->view('page_view', $data);
    }
  }
 
  /**
   * This function will display the list of products
   * data coming from the model
   */
  public function listing() {
    $data['header']['title'] = 'products listing';
    $data['view_name'] = 'products/products_listing_view';

    $products = $this->products->get();
    $data['view_data'] = $products;
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form to add a new product
   */
  public function add() {
    $data['header']['title'] = 'Add a new product';
    $data['view_name'] = 'products/products_add_view';
    $data['view_data']['providers'] = $this->users->get_providers_dropdown();
 
    $this->load->view('page_view', $data);
  }
 
  /**
   * This function will display the form for editing a product
   * the get function used to fetch the product info
   * [If no id, then it should display error]
   * @param int $id
   */
  public function modify($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $data['header']['title'] = 'Edit a product';
      $data['view_name'] = 'products/products_edit_view';
      $data['view_data'] = $this->products->get($id);
      $data['view_data']['providers'] = $this->users->get_providers_dropdown();
 
      $this->load->view('page_view', $data);
    }
  }
 
  /**
   * This function deletes a product from the database
   * and redirects back to the listing
   * @param int $id
   */
  public function remove($id = null) {
    if ($id == null) {
      show_error('No identifier provided', 500);
    }
    else {
      $this->products->remove($id);
      redirect('products/listing'); // back to the listing
    }
  }
 
  /**
   * This function will call the model add function
   * and add the new product.
   */
  public function save() {
    if (isset($_POST) && $_POST['save'] == 'Add') {

      $data['published_by'] = $this->input->post('published_by');
      $data['name'] = $this->input->post('name');
      $data['description'] = $this->input->post('description');
      $data['price'] = $this->input->post('price');
      $data['stock'] = $this->input->post('stock');
       
      $this->products->add($data);
      redirect('products/listing'); // back to the add form
    }
    else {
      redirect('products/listing');
    }
  }
 
  /**
   * This function will update the info of the existing product
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
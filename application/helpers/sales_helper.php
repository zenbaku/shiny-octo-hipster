<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('products_summary')) {
  function products_summary($products) {
    $str = array();
    foreach ($products as $product) {
      $str[] = $product['name'] . ' (' . $product['quantity'] . ')';
    }
    return implode(', ', $str);
  }
}

if (!function_exists('filter_zero_products')) {
  function filter_zero_products($product_quantity) {
    return $product_quantity > 0;
  }
}

if (!function_exists('filter_out_zero_products')) {
  function filter_out_zero_products($products) {
    return array_filter($products, 'filter_zero_products');
  }
}
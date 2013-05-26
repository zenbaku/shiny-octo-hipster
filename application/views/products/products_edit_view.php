<?php
$this->load->helper('form');
echo form_open('products/update');

echo form_fieldset('Edit product');

echo form_label('Provider: ');
echo form_dropdown('published_by',$view_data['providers'], $view_data['published_by']);

echo form_label('Name: ');
echo form_input('name', $view_data['name']);

echo form_label('Description: ');
echo form_input('description', $view_data['description']);

echo form_label('Price: ');
echo form_input('price', $view_data['price']);

echo form_label('Stock: ');
echo form_input('stock', $view_data['stock']);

echo form_label('Published At: ');
echo form_input('published_at', $view_data['published_at']);

echo form_hidden('id', $view_data['id']);

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
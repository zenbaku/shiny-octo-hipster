<?php
$this->load->helper('form');
echo form_open('products/save');

echo form_fieldset('Add a new product');

echo form_label('Provider: ');
echo form_dropdown('published_by',$view_data['providers']);

echo form_label('Name: ');
echo form_input('name', '');

echo form_label('Description: ');
echo form_input('description', '');

echo form_label('Price: ');
echo form_input('price', '');

echo form_label('Stock: ');
echo form_input('stock', '');

echo form_label();
echo form_submit('save','Add', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
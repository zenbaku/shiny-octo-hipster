<?php
$this->load->helper('form');
echo form_open('user_types/update');

echo form_fieldset('Edit user type');

echo form_label('Name: ');
echo form_input('name', $view_data['name']);

echo form_hidden('id', $view_data['id']);

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
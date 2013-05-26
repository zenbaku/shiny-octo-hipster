<?php
$this->load->helper('form');
echo form_open('user_types/save');

echo form_fieldset('Add a new user type');

echo form_label('Name: ');
echo form_input('name', '');

echo form_label();
echo form_submit('save','Add', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
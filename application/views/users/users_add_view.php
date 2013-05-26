<?php
$this->load->helper('form');
echo form_open('users/save');

echo form_fieldset('Add a new user');

echo form_label('User type: ');
echo form_dropdown('user_type_id',$view_data['user_types']);

echo form_label('Username: ');
echo form_input('username', '');

echo form_label('Password: ');
echo form_input('password', '');

echo form_label('Email: ');
echo form_input('email', '');

echo form_label('First Name: ');
echo form_input('firstname', '');

echo form_label('Last Name: ');
echo form_input('lastname', '');

echo form_label('RUT: ');
echo form_input('rut', '');

echo form_label('Address: ');
echo form_input('address', '');

echo form_label('Phone: ');
echo form_input('phone', '');

echo form_label();
echo form_submit('save','Add', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
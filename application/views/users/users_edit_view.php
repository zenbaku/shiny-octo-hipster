<?php
$this->load->helper('form');
echo form_open('users/update');

echo form_fieldset('Edit user');

echo form_label('User type: ');
echo form_dropdown('user_type_id',$view_data['user_types'], $view_data['user_type_id']);

echo form_label('Username: ');
echo form_input('username', $view_data['username']);

echo form_label('Email: ');
echo form_input('email', $view_data['email']);

echo form_label('First Name: ');
echo form_input('firstname', $view_data['firstname']);

echo form_label('Last Name: ');
echo form_input('lastname', $view_data['lastname']);

echo form_label('RUT: ');
echo form_input('rut', $view_data['rut']);

echo form_label('Address: ');
echo form_input('address', $view_data['address']);

echo form_label('Phone: ');
echo form_input('phone', $view_data['phone']);

echo form_label('Registered At: ');
echo form_input('registered_at', $view_data['registered_at']);

echo form_label('Last Access: ');
echo form_input('accessed_at', $view_data['accessed_at']);

echo form_hidden('id', $view_data['id']);

echo form_label();
echo form_submit('save','Save', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
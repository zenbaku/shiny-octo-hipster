<?php
$this->load->helper('form');
echo form_open('payment_methods/save');

echo form_fieldset('Add a new payment method');

echo form_label('Name: ');
echo form_input('name', '');

echo form_label();
echo form_submit('save','Add', 'class="btn btn-success btn-large"');

echo form_fieldset_close();

echo form_close();
?>
<?php $this->load->helper('form'); ?>
<?php echo form_open('sales/save', 'class="form-horizontal"'); ?>

<?php echo form_fieldset('Add a new sale'); ?>

 <div class="control-group">
    <?php echo form_label('Client: ', 'user_id', array('class' => 'control-label')); ?>
    <div class="controls">
      <?php echo form_dropdown('user_id', $view_data['clients']); ?>
    </div>
</div>

 <div class="control-group">
    <?php echo form_label('Payment Method: ', 'payment_method_id', array('class' => 'control-label')); ?>
    <div class="controls">
      <?php echo form_dropdown('payment_method_id', $view_data['payment_methods']);?>
    </div>
</div>

<?php foreach ($view_data['products'] as $product): ?>
  <?php $id = $product['id'] ?>
  <div class="control-group">
    <?php echo form_label($product['name'] .': ', "products[$id]", array('class' => 'control-label')); ?>
    
    <div class="controls">
        <?php echo form_input("products[$id]", 0); ?>
    </div>
  </div>
<?php endforeach; ?>


<div class="form-actions">
  <?php echo form_submit('save','Add', 'class="btn btn-success btn-large"'); ?>
  <?php echo anchor('sales', 'Cancel', 'class="btn btn-large"'); ?>
</div>

<?php echo form_fieldset_close(); ?>

<?php echo form_close(); ?>
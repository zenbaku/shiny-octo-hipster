<?php $this->load->helper('form'); ?>
<?php echo form_open('sales/update', 'class="form-horizontal"'); ?>

<?php echo form_fieldset('Edit sale'); ?>

 <div class="control-group">
    <?php echo form_label('Client: ', 'user_id', array('class' => 'control-label')); ?>
    <div class="controls">
      <?php echo form_dropdown('user_id', $view_data['clients'], $view_data['user_id']); ?>
    </div>
</div>

 <div class="control-group">
    <?php echo form_label('Payment Method: ', 'payment_method_id', array('class' => 'control-label')); ?>
    <div class="controls">
      <?php echo form_dropdown('payment_method_id', $view_data['payment_methods'], $view_data['payment_method_id']);?>
    </div>
</div>

<?php foreach ($view_data['products_list'] as $product): ?>
  <?php $id = $product['id'] ?>
  <div class="control-group">
    <?php echo form_label($product['name'] .': ', "products[$id]", array('class' => 'control-label')); ?>
    
    <div class="controls">
        <?php $quantity = 0; ?>
        <?php foreach ($view_data['products'] as $sale_product): ?>
          <?php if ($sale_product['product_id'] == $id): ?>
            <?php $quantity = $sale_product['quantity'] ?>
          <?php endif ?>
        <?php endforeach ?>
        <?php echo form_input("products[$id]", $quantity); ?>
    </div>
  </div>
<?php endforeach; ?>

<?php echo form_hidden('id', $view_data['id']); ?>

<div class="form-actions">
  <?php echo form_submit('save','Save', 'class="btn btn-success btn-large"'); ?>
  <?php echo anchor('sales', 'Cancel', 'class="btn btn-large"'); ?>
</div>

<?php echo form_fieldset_close(); ?>

<?php echo form_close(); ?>
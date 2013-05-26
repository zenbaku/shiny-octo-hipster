<h2>Listing of the sales</h2>

<div class="row-fluid">
  <div class="span12">
    <table class="table table-bordered table-condensed table-striped">
      <tr class="info">
        <td><strong>ID</strong></td>
        <td><strong>Client</strong></td>
        <td><strong>Payment Method</strong></td>
        <td><strong>Products Summary</strong></td>
        <td><strong>Created At</strong></td>
        <td><strong>Edit / Delete</strong></td>
      </tr>
      <?php foreach ($view_data as $key => $data): ?>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['client']; ?></td>
        <td><?php echo $data['payment_method']; ?></td>
        <td><?php echo products_summary($data['products']); ?></td>
        <td><?php echo $data['created_at']; ?></td>
        <td><?php echo anchor('sales/modify/'.$data['id'], 'Edit')
          . ' / '
          . anchor('sales/remove/'.$data['id'], 'Delete'); ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <?php echo anchor('sales/add', 'Add new sale', 'class="btn btn-primary"'); ?>
  </div>
</div>


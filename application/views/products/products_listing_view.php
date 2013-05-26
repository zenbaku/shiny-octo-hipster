<h2>Listing of the products</h2>

<div class="row-fluid">
  <div class="span12">
    <table class="table table-bordered table-condensed table-striped">
      <tr class="info">
        <td><strong>ID</strong></td>
        <td><strong>Provider</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Description</strong></td>
        <td><strong>Price</strong></td>
        <td><strong>Stock</strong></td>
        <td><strong>Published At</strong></td>
        <td><strong>Edit / Delete</strong></td>
      </tr>
      <?php foreach ($view_data as $key => $data): ?>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['provider_name']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['description']; ?></td>
        <td><?php echo $data['price']; ?></td>
        <td><?php echo $data['stock']; ?></td>
        <td><?php echo $data['published_at']; ?></td>
        <td><?php echo anchor('products/modify/'.$data['id'], 'Edit')
          . ' / '
          . anchor('products/remove/'.$data['id'], 'Delete'); ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <?php echo anchor('products/add', 'Add new product', 'class="btn btn-primary"'); ?>
  </div>
</div>
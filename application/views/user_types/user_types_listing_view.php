<h2>Listing of the user types</h2>

<div class="row-fluid">
  <div class="span8">
    <table class="table table-bordered table-condensed table-striped">
      <tr class="info">
        <td><strong>ID</strong></td>
        <td><strong>Name</strong></td>
        <td><strong>Edit / Delete</strong></td>
      </tr>
      <?php foreach ($view_data as $key => $data): ?>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo anchor('user_types/modify/'.$data['id'], 'Edit')
          . ' / '
          . anchor('user_types/remove/'.$data['id'], 'Delete'); ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <?php echo anchor('user_types/add', 'Add new user type', 'class="btn btn-primary"'); ?>
  </div>
</div>
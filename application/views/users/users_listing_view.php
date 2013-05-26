<h2>Listing of the users</h2>

<div class="row-fluid">
  <div class="span12">
    <table class="table table-bordered table-condensed table-striped">
      <tr class="info">
        <td><strong>ID</strong></td>
        <td><strong>User Type</strong></td>
        <td><strong>Username</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>First Name</strong></td>
        <td><strong>Last Name</strong></td>
        <td><strong>RUT</strong></td>
        <td><strong>Address</strong></td>
        <td><strong>Phone</strong></td>
        <td><strong>Registered At</strong></td>
        <td><strong>Last Access</strong></td>
        <td><strong>Edit / Delete</strong></td>
      </tr>
      <?php foreach ($view_data as $key => $data): ?>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['user_type_name']; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['firstname']; ?></td>
        <td><?php echo $data['lastname']; ?></td>
        <td><?php echo $data['rut']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php echo $data['phone']; ?></td>
        <td><?php echo $data['registered_at']; ?></td>
        <td><?php echo $data['accessed_at']; ?></td>
        <td><?php echo anchor('users/modify/'.$data['id'], 'Edit')
          . ' / '
          . anchor('users/remove/'.$data['id'], 'Delete'); ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<div class="row-fluid">
  <div class="span12">
    <?php echo anchor('users/add', 'Add new user', 'class="btn btn-primary"'); ?>
  </div>
</div>
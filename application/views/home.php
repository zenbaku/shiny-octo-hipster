<h1>Home</h1>
<p>Hacer arreglos acá para que se vea "bonito" y en la onda "emprendimiento"</p>
<?php $user = $this->session->userdata('logged_in') ?>

<p>ID tipo de usuario actual: <?php echo $user['user_type_id']; ?></p>

Meter IFs acá

<h1>Clientes (ID tipo: 3)</h1>
<p>Bienvenido, <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>!</p>
<p>Ha iniciado sesión como cliente</p>

<h3>Our Products!</h3>

<div class="row-fluid">
  <?php foreach ($products as $product): ?>
    <div class="span4">
      <h4><?php echo $product['name'] ?></h4>
      <p><?php echo $product['description'] ?></p>
      <p>
        <?php echo anchor('products/show/' . $product['id'], 'View details »', 'class="btn"'); ?>
      </p>
    </div><!--/span-->
  <?php endforeach ?>
</div>

<hr>

<h1>Proveedores (ID tipo: 1)</h1>
<p>Bienvenido, <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>!</p>
<p>Ha iniciado sesión como proveedor</p>

Una página de bienvenida para proveedores donde se salude al usuario por su nombre
y se le indique que ha iniciado sesión como tipo proveedor, además que se
describa el proceso de compra de productos por parte de su emprendimiento.

<h3>Proceso...?</h3>
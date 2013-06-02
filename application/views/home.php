<h1 style="text-align:center;">Home</h1>
<hr>
<?php $user = $this->session->userdata('logged_in') ?>

<?php if($user['user_type_id'] == 3){ ?>
<div class="hero-unit" style="text-align:center;">
	<p>Bienvenido, <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>!</p>
	<p>Ha iniciado sesión como cliente</p>

	<h3>Our Products!</h3>

	<div class="row-fluid">
	  <?php foreach ($products as $product): ?>
	    <div class="span4">
	      <h4><?php echo $product['name'];?></h4>
	      <img class="img-polaroid" src="../img/<?php echo $product['img_src'];?>">
	      <p><?php echo $product['description'];?></p>
	      <span class="badge badge-info">$<?php echo $product['price']; ?></span>
	      <p>
	        <?php echo anchor('products/show/' . $product['id'], 'View details »', 'class="btn"');?>
	      </p>
	    </div><!--/span-->
	  <?php endforeach ?>
	</div>
</div>
<?php }	elseif($user['user_type_id'] == 7 || $user['user_type_id'] == 1){ ?>
<div class="hero-unit" style="text-align:center">
	<h1 style="text-align:center;">Sitio Proveedores</h1>
	<p style="margin-top:10px;">Bienvenido, <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>!</p>
	<p>Ha iniciado sesión como proveedor</p>

	<h3>Para agregar un producto a nuestro cat&aacute;logo, debe seguir los siguientes pasos:</h3>
	<ol>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ol>
</div>
<?php } ?>
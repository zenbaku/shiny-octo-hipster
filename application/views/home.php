<h1 style="text-align:center;">Home</h1>
<hr>
<?php $user = $this->session->userdata('logged_in') ?>

<?php if($user['user_type_id'] == 3){ ?>
<div class="hero-unit" style="text-align:center;">
	<p>Bienvenido, <?php echo $user['firstname'] . ' ' . $user['lastname']; ?>!</p>
	<p>Ha iniciado sesión como cliente</p>

	<h3>Our Products!</h3>

	<div style="margin-left:20px;" class="row-fluid">
	  <?php foreach ($products as $product): ?>
	    <div style="margin-left:0px;" class="span4">
	      <h4><?php echo $product['name'];?></h4>
	      <img width="90%" height="90%" class="img-polaroid" src="../img/<?php echo $product['img_src'];?>">
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
		<li>Entra a Contacto y llena el formulario para Proovedores. Esto nos permitir&aacute; activar
			tu cuenta para que puedas ingresar productos a nuestro sitio, además de obtener y verificar
			tu informaci&oacute;n.</li>
		<li>Se te envirar&aacute; un correo de verificaci&oacute;n. Debes seguir los pasos indicados
			en &eacute;l para que podamos activar los servicios de tu cuenta.</li>
		<li>En el momento que un cliente confirme una compra en nuestro sitio, enviaremos un despachador
			para retirar tu producto al domicilio indicado en el formulario, donde debes cancelar el total
			por el cual nos vendes tu producto, que es el 80% del precio publicado en nuestro sitio, para
			luego ser despachado al domicilio del cliente.</li>
	</ol>
	<h4>¡&Eacute;xito con tus ventas!</h4>
</div>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Tarea 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="<?php echo base_url(); ?>css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.1/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="hero-unit">
            <h1>Chan!</h1>
            <p>
              Chan! es una tienda on-line de ropa, que nace para brinder la oportunidad a diseñadores
              de vestuario emergentes de exhibir y vender sus colecciones en nuestra tienda virtual a cambio
              de un porcentaje de la compra.
            </p>
            <p>
              <ol>
                <li>
                  El cliente puede explotar los cat&aacute;logos de los diseñadores y elegir productos para su compra.
                </li>
                <li>
                  Luego de que el cliente ha concluido la transacci&oacute;n, le avisamos al diseñador que se ha realizado
                  una compra para que prepare el producto.
                </li>
                <li>
                  Retiramos el producto de su lugar de fabricaci&oacute;n con la ayuda de un despachador que provee Chan!
                </li>
                <li>
                  Despachamos el producto al domicilio indicado por el cliente.
                </li>
              </ol>
            </p>
            <div id="qsomos" style="margin:0 auto; display:table;">
              <h2 style="text-align:center;">Quienes Somos</h2>
              <ul class="thumbnails">
                <li class="span3">
                  <div class="thumbnail">
                    <img src="../../img/alfredi.jpg" alt="">
                    <h3>Alfredo Emiliano Vega</h3>
                    <p>Estudiante Ing. Civil Industrial</p>
                  </div>
                </li>
                <li class="span3">
                  <div class="thumbnail">
                    <img src="../../img/manolo.jpg" alt="">
                    <h3>Jos&eacute; Manuel Aguilera</h3>
                    <p>Estudiante Ing. en ciencias de la computaci&oacute;n</p>
                  </div>
                </li>
                <li class="span3">
                  <div class="thumbnail">
                    <img src="../../img/poni.jpg" alt="">
                    <h3>Jonathan Urz&uacute;a</h3>
                    <p>Estudiante Ing. en ciencias de la computaci&oacute;n</p>
                  </div>
                </li>
              </ul>
            </div>
      </div>
    </div>
    <div class="container">
      <?php echo form_open('site/verifylogin', 'class="form-signin"'); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php echo validation_errors(); ?>
        <input type="text" class="input-block-level" placeholder="Username" id="username" name="username" />
        <input type="password" class="input-block-level" placeholder="Password" id="passowrd" name="password">
        <button class="btn btn-block btn-large btn-primary" type="submit">
          <i class="icon-arrow-right icon-white"></i> Sign in
        </button>
      </form>
    </div> <!-- /container -->
  </body>
</html>
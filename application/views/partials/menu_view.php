<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="#">Tarea 4</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li><?php echo anchor('/', 'Home'); ?></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>

        <?php if ($this->session->userdata('logged_in')): ?>
        <?php $user = $this->session->userdata('logged_in') ?>
          <p class="navbar-text pull-right">
              Logged in as <?php echo $user['username']; ?>
              |
              <?php echo anchor('site/logout', 'Logout', 'class="navbar-link"'); ?>
          </p>
        <?php endif ?>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
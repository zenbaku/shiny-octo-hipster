<?php 
if (isset($header) && is_array($header)) {
  $this->load->view('partials/header_view', $header);
} else {
  $this->load->view('partials/header_view');
}
?>

<?php $this->load->view('partials/menu_view'); ?>

<?php $user = $this->session->userdata('logged_in') ?>
<?php if ($user && $user['user_type_id'] == 7): ?>
    <?php $this->load->view('partials/admin_view'); ?>
<?php endif ?>

<div class="container">
  <?php $this->load->view($view_name, $view_data); ?>
</div> <!-- /container -->

<?php 
if (isset($footer) && is_array($footer)) {
  $this->load->view('partials/footer_view', $footer);
} else {
  $this->load->view('partials/footer_view');
}
?>
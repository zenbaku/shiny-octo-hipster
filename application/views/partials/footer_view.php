<?php if (isset($scripts)): ?>
  <?php foreach ($scripts as $filename => $folder): ?>
    <script type="text/javascript" src="<?php echo base_url() . 'js/' . $folder . '/' . $filename; ?>"></script>
  <?php endforeach; ?>
<?php endif ?>
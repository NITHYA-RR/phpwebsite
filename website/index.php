<?php
include 'libs/load.php';
Session::renderpage();
?>
<!doctype html>
<html lang="en">
  <?php
  load_templates('head');
  ?>
  <body>
  <header>
  
<?php 
  load_templates('header');
?>

</header>
<main>

 <?php
  load_templates('content');
 ?>
 <?php
 load_templates('photos')
 ?>
</main>
<?php
load_templates('footer')
?>
<script src="/website/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

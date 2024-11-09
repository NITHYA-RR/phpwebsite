<?php
include 'libs/load.php';
?>
<!doctype html>
<html lang="en">
<head>
<link href="/website/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
  load_templates('head');
?>
</head>
<body>
<?php 
  load_templates('header');
?>
<?php 
  load_templates('signup');
?>
<?php
 load_templates('footer');
?>
<script src="/website/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
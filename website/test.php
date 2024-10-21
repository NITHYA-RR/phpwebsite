<?php
include 'libs/load.php'
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="NITHYA">
    <meta name="generator" content="Hugo 0.84.0">
    <title>TRAINING PHP</title>
  <!-- Bootstrap core CSS -->
<link href="/website/assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/website/assets/dist/css/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
    </style>

    
  </head>
  <body>
  <main class="form-signin">
  <?php 
  load_templates('login');
  ?>
 </main>

 <?php
 load_templates('footer');
 ?>
 <script src="/website/assets/dist/js/bootstrap.bundle.min.js"></script>
 </body>
</html>
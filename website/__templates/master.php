<!doctype html>
<html lang="en">
  <?php
  load_templates('head');
  ?>
  <body>
  <?php
  load_templates('header');
  ?>
  <?php
  load_templates('content');
  ?>
  <main>
  <?php
  load_templates(Session::currentScript());
  ?>
  </main>
  <?php
  load_templates('footer');
  ?>
  <script src="/website/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

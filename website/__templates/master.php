<!doctype html>
<html lang="en">
  <?php
   Session::load_templates('head');
  ?>
  <body>
  <?php
   Session::load_templates('header');
  ?>
  <?php
   if(Session::isAuthenticated()){
    Session::load_templates('index/content');
    }
    else{
        Session::load_templates('index/login');
    }
    
  ?>

  <main>
  <?php
  if(Session::get('error_page')){
    Session::load_templates('error');
    Session::set('error_page',false);
  }else{
  load_templates(Session::currentScript());
  }
  ?>
  </main>
  <?php
    Session::load_templates('footer');
        
  ?>
  <script src="/website/assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

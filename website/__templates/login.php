<?php
//$username = $_POST ['Nithya'];
//$password = $_POST ['nithya@20004'];
//$result = validate_credentials($username,$password);
//if($result){
 // print("<center><h1><b>login successfull</b></h></center>");
//}
//else{
  ?>
<main class="form-signin">
<form method="post" action="login.php">
    <img class="mb-4" src="/home/sathis/Downloads/phplogo" alt="" width="72" height="50">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name="username" type="username" class="form-control" id="floatingInput" placeholder="">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    
  </form>
</main>
<?php
//}
?>

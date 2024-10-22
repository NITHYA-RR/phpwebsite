<?php

$username = $_POST ['name'];
$passward = $_POST ['passward'];
$result = validate_contion($username,$passward);
if($result){
  print("login successfull");
}
else{

?>


<main class="form-signin">
<form method="post" action="index.php">
    <img class="mb-4" src="/home/sathis/Downloads/phplogo" alt="" width="72" height="50">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name="name" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input name="passward" type="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
<?php
}
?>

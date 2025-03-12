<?php

$login = false;
if( isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$error = User::login($username , $password);
$login = true;
}
?>
<?php
if($login){

  if(!$error){
    // Attempt login only if there is no active session
    $result = User::login($username, $password);
  
    //Store session data
        Session::set('is_loggedin', true);
        Session::set('session_username', $username);

        // Print only "Login Success 'username'" when login is successful
        echo "Login Success '$username'";
  }
else{
// // Logout handling
if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>Login again</a>");
}
if (Session::get('is_loggedin')) {
      $username = Session::get('session_username');
      $userobj = new User($username);
      print("Welcome back, " . $userobj->getFirstname());
  } else {
  // Print message only if login fails
      print("No active session found. Trying to log in now.<br>");
      print("Login failed, $username<br>");
    }
}
}
?>
// $username = "Santhiya";
// $password = isset($_GET['password']) ? $_GET['password'] : '';

// // Logout handling
// if (isset($_GET['logout'])) {
//     Session::destroy();
//     die("Session destroyed, <a href='logintest.php'>Login again</a>");
// }

// // Check if a session is active
// if (Session::get('is_loggedin')) {
//     $username = Session::get('session_username');
//     $userobj = new User($username);
//     print("Welcome back, " . $userobj->getFirstname());
// } else {
//     // Attempt login only if there is no active session
//     $result = User::login($username, $password);

//     if ($result) {
//         // Store session data
//         Session::set('is_loggedin', true);
//         Session::set('session_username', $username);

//         // Print only "Login Success 'username'" when login is successful
//         echo "Login Success '$username'";
//     } else {
//         // Print message only if login fails
//         print("No active session found. Trying to log in now.<br>");
//         print("Login failed, $username<br>");
//     }
    
// }
?>
<main class="form-signin">
<form method="post" action="login.php">
    <img class="mb-4" src="/home/sathis/Downloads/phplogo" alt="" width="72" height="50">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input name="username" type="username" class="form-control" id="floatingInput" placeholder="username">
      <label for="floatingInput">Username</label>
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

?>

<?php

/*
s1 :check if section_token is available.
s2 :if yes , constract user session and see if it's successfull.
s3:check if section is valid one 
s4: if valis print "session validated"
s5:Else print " session unvalid" and ask user to login.
*/

// require_once "Session.class.php";
// require_once "User.class.php";

// session_start(); // Ensure session is started

// $username = "Nithya";
// $password = isset($_GET['password']) ? $_GET['password'] : '';

// // Logout handling
// if (isset($_GET['logout'])) {
//     if (Session::get('is_loggedin')) { // Only destroy if session exists
//         Session::destroy();
//         session_unset(); // Unset all session variables
//         session_destroy(); // Destroy the session
//     }
    
//     // Redirect to logintest.php with a logout message
//     header("Location: logintest.php?message=logout");
//     exit(); // Stop script execution
// }

// // Check if a session is active
// if (Session::get('is_loggedin')) {
//     $username = Session::get('session_username');
//     $userobj = new User($username);

//     echo "Welcome back, " . $userobj->getFirstname();
// } else {
//     // Attempt login only if there is no active session
//     if (User::login($username, $password)) {
//         // Store session data
//         Session::set('is_loggedin', true);
//         Session::set('session_username', $username);

//         // Print only "Login Success 'username'" when login is successful
//         echo "Login Success '$username'";
//     } else {
//         // Print message only if login fails
//         echo "No active session found. Trying to log in now.<br>";
//         echo "Login failed, $username<br>";
//     }
// }

// // Display logout message if redirected after logout
// if (isset($_GET['message']) && $_GET['message'] === 'logout') {
//     echo "Session destroyed, <a href='logintest.php'>Login again</a>";
// }

// echo '<br><br> <a href="logintest.php?logout">Logout</a>';
?>
<!-- <main class="form-signin">
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
    
  </form> -->
<!-- </main> -->



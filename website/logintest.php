<?php
include 'libs/load.php';

$username = "Ramasamy";
$password = isset($_GET['password']) ? $_GET['password'] : '';

// Logout handling
if (isset($_GET['logout'])) {
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>Login again</a>");
}

// Check if a session is active
if (Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    $userobj = new User($username);
    print("Welcome back, " . $userobj->getFirstname());
} else {
    // Attempt login only if there is no active session
    $result = User::login($username, $password);

    if ($result) {
        // Store session data
        Session::set('is_loggedin', true);
        Session::set('session_username', $username);

        // Print only "Login Success 'username'" when login is successful
        echo "Login Success '$username'";
    } else {
        // Print message only if login fails
        print("No active session found. Trying to log in now.<br>");
        print("Login failed, $username<br>");
    }
}

// echo '<br><br> <a href="logintest.php?logout">Logout</a>'
/*
s1 :check if section_token is available.
s2 :if yes , constract user session and see if it's successfull.
s3:check if section is valid one 
s4: if valis print "session validated"
s5:Else print " session unvalid" and ask user to login.
*/
// Check if user is already logged in



?>
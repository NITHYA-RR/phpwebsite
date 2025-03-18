<?php
require_once __DIR__ ."/../libs/includes/Session.class.php";  
require_once __DIR__ . "/../libs/includes/User.class.php";

// session_start(); // Ensure session is started

// Handle logout request
if (isset($_GET['logout'])) {
    if (Session::get('is_loggedin')) { // Only destroy if session exists
        Session::destroy();
        session_unset(); // Unset all session variables
        session_destroy(); // Destroy the session
    }
    
    // Redirect to login.php with a logout message
    header("Location: login.php?message=logout");
    exit(); // Stop script execution
}

// If session is active, redirect user to welcome page
if (Session::get('is_loggedin')) {
    $username = Session::get('session_username');
    $userobj = new User($username);
    echo "Welcome back, " . $userobj->getFirstname();
    echo '<br><br> <a href="login.php?logout">Logout</a>';
    exit();
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Attempt login
    if (User::login($username, $password)) {
        // Store session data
        Session::set('is_loggedin', true);
        Session::set('session_username', $username);

        // Redirect to avoid resubmission on refresh
        header("Location: login.php");
        exit();
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add Bootstrap or custom CSS -->
</head>
<body>
    <main class="form-signin">
        <form method="post" action="login.php">
            <img class="mb-4" src="/home/sathis/Downloads/phplogo" alt="" width="72" height="50">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <?php if (isset($error_message)) : ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <?php if (isset($_GET['message']) && $_GET['message'] === 'logout') : ?>
                <p style="color: green;">You have been logged out successfully.</p>
            <?php endif; ?>

            <div class="form-floating">
                <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
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
</body>
</html>


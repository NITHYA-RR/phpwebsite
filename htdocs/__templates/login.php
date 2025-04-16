<?php
require_once __DIR__ . "/../libs/includes/Session.class.php";  
require_once __DIR__ . "/../libs/includes/User.class.php";
require_once __DIR__ . "/../libs/includes/UserSession.class.php";

//Check if session is already active before calling session_start()
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle logout request
if (isset($_GET['logout'])) {
    if (Session::get('is_loggedin')) { 
        Session::destroy();
        session_unset();
        session_destroy();
    }
    
    // Redirect to login.php with a logout message
    header("Location: login.php?message=logout");
    exit();
}

// If the user is already logged in, show "Welcome back"
if (Session::get('is_loggedin')) {
    if (Session::get('is_loggedin')) {
        // Already logged in? Just go to index.php
        header("Location: index.php");
        exit();
    }
    
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
        header("Location: index.php");
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
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <main class="form-signin">
        <form method="post" action="login.php">
            <img class="mb-4" src="/home/sathis/Downloads/phplogo" alt="" width="72" height="50">
            <h1 class="h3 mb-3 fw-normal">LOGIN</h1>

            <?php if (isset($error_message)) : ?>
                <p style="color: red;"><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
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



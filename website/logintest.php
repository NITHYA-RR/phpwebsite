<?php
include 'libs/load.php';


$username = "Nithya";
$password = isset($_GET['password']) ? $_GET['password'] :'';
$result = null;
if(isset($_GET['logout'])){
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>Login again</a>");
}
if(Session::get('is_loggedin')){
    $username = Session::get('session_username');
    $user = new User($username);
    print("Welcome back," .$user->getUsername());
    $result = $user;
}else{
    print("No session is not found.. Trying to login now.<br>");
    $result = User::login($username,$password);
if($result){
    print("Login success $username");
    Session::set('is_loggedin',true);
    Session::set('session_user',$result);
}
else{
    print("Login failed..$user<br>");
}
}
echo <<<EGO
<br><br> <a href="logintest.php?logout">Logout</a>
EGO;


?>
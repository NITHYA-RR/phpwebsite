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
    $userdata = Session::get('session_user');
    print("Welcome back, $userdata[username]");
    $result = $userdata;
}else{
    print("No session is not found.. Trying to login now.<br>");
    $result = User::login($username,$password);
if($result){
    print("Login success $result[username]");
    Session::set('is_loggedin',true);
    Session::set('session_user',$result);
}
else{
    print("Login failed..$username<br>");
}
}
echo <<<EGO
<br><br> <a href="logintest.php?logout">Logout</a>
EGO;


?>
<?php
include 'libs/load.php';

$username = "Nithya";
$password = isset($_GET['password']) ? $_GET['password'] :'';
$result = null;
if(isset($_GET['logout'])){
    Session::destroy();
    die("Session destroyed, <a href='logintest.php'>Login again</a>");
}
/*
s1 :check if section_token is available.
s2 :if yes , constract user session and see if it's successfull.
s3:check if section is valid one 
s4: if valis print "session validated"
s5:Else print " session unvalid" and ask user to login.
*/
if(Session::get('is_loggedin')){
    //$this->$userobj = null;
    $username = Session::get('session_username');
    $userobj = new User($username);
    print("Welcome back," .$userobj->getFirstname());
   // print("<br>," .$userobj->getBio());
}
else{
    print("No session is not found.. Trying to login now.<br>");
    $result = User::login($username,$password);

if($result){
    $userobj = New User($username);
    echo "Login Success <br>",$userobj->getUsername();
    Session::set('is_loggedin',true);
    Session::set('session_username',$result);
}

else{
    print("Login failed..$username<br>");
}
}

echo <<<EGO
<br><br> <a href="logintest.php?logout">Logout</a>
EGO;


?>
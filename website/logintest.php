<?php
include 'libs/load.php';

$username = "Nithya";
$password = "Nithya";
$result = User::login($username,$password);

if($result){
    print("Login success ,  $result[username]");

}
else{
    print("Failed login..");
}


?>
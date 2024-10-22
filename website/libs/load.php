<?php
function load_templates($name){
    include __DIR__."/../__templates/$name.php";
}

function validate_function($username,$password){
 
    if($username=="nithya@gmail.com" and $password=="password"){
        return true;
    }
    else{
        return false;
    }
}
?>

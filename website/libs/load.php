<?php
function load_templates($name){
    include __DIR__."/../__templates/$name.php";
}

function validate_contion($username,$passward){
 
    if($username=="nithya@gmail.com" and $passward=="passward"){
        return true;
    }
    else{
        return false;
    }
}
?>

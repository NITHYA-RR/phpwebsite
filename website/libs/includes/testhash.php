<?php 

$password = isset($_GET['password']) ? $_GET['password'] : "get the oru hash value.";
echo md5(($password));
?>
<?php 

$pass = isset($_GET['pass']) ? $_GET['pass'] : "get the oru hash value.";
echo md5(($pass));
?>
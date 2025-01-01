<?php 

$pass = isset($_GET['pass']) ? $_GET['pass'] : "get the oru hash.";
echo md5(($pass));
?>
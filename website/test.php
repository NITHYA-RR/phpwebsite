<?php
echo "Error: No such file or directory...!";
include 'libs/load.php';
Session::renderpage();
Session::load_templates('error');
?>
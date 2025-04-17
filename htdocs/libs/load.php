<?php

ini_set('max_execution_time', 0); // Set unlimited execution time
ini_set('memory_limit', '512M');

include_once 'libs/includes/Session.class.php';
include_once 'libs/includes/User.class.php';
include_once 'libs/includes/Database.class.php';
include_once 'libs/includes/UserSession.class.php';
include_once 'libs/includes/WebAPI.class.php';


global $__site__config;
$__site__config = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '\Automation\photogramconfig.json');
$__site__config = json_decode($__site__config, true);
Session::start();

function get_config($key, $default=null){
    global $__site__config;
    if(isset($__site__config[$key])){
        return $__site__config[$key];
    } else {
        return $default;
    }
}
function load_templates($name) {
    $path = __DIR__ . "/../__templates/$name.php";
    include $path;
}

function validate_credentials($username, $password) {
      if ($username == "Nithya" and $password == "nithya@2004") {
        return true;
        print("super");
    } else {
        return false;
    }
}
function signup($user, $pass, $email, $phone) {
   
    $conn = Database::getConnection();
}


































// // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
// } else {

  // echo "Error: " . $sql . "<br>" . $conn->error;
 

// $conn->close();
// }
// }

































// // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
// } else {

  // echo "Error: " . $sql . "<br>" . $conn->error;
 

// $conn->close();
// }
// }

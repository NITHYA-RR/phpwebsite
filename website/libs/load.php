<?php
include_once 'libs/includes/Session.class.php';
include_once 'libs/includes/Mic.class.php';
include_once 'libs/includes/User.class.php';
include_once 'libs/includes/Database.class.php';
include_once 'libs/includes/UserSession.class.php';
include_once 'libs/includes/WebAPI.class.php';


global $__site__config;
$__site__config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/./photogramconfig.json');

session::start();

function get_config($key, $default=null){
    global $__site__config;
    $array = json_decode($__site__config,true);
    if(isset($array[$key])){
        return $array[$key];
}
else{
    return $default;
}

}

function load_templates($name) {
    include __DIR__ . "/../__templates/$name.php";
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

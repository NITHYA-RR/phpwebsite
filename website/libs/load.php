<?php
include_once 'libs/includes/Session.class.php';
include_once 'libs/includes/Mic.class.php';
include_once 'libs/includes/User.class.php';
include_once 'libs/includes/Database.class.php';

session::start();

function load_templates($name) {
    include __DIR__ . "/../__templates/$name.php";
}

function validate_credentials($username, $password) {
    if ($username == "Nithya" and $password == "password") {
        return true;
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

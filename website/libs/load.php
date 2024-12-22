<?php
function load_templates($name) {
    include __DIR__ . "/../__templates/$name.php";
}

function validate_function($username, $password) {
    if ($username == "nithya@gmail.com" and $password == "password") {
        return true;
    } else {
        return false;
    }
}
function signup($user, $pass, $email, $phone) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "php";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //Add logic to insert the data into a database table
    //Example:
    $sql = "INSERT INTO `collect the data` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
     VALUES ('$user', '$pass', '$email', '$phone', '0','0');";
    $result = false;
    if ($conn->query($sql) === true) {
        $result = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $result = false;
     }

    $conn->close();
    return $result;
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

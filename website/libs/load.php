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
function signup($username, $password, $email, $phone){
   $servername = "phpMyAdimn";
   $username = "root";
   $password = "3306";
   $dbname = "collect the data";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
}else{
  print("success"); 
}


// // $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
// } else {

  // echo "Error: " . $sql . "<br>" . $conn->error;
 

// $conn->close();
// }
}

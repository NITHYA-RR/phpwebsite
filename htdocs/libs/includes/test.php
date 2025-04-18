<?php
echo "Error: No such file or directory...!";
// include 'libs/load.php';
// Session::renderpage();
// Session::load_templates('error');


// include_once "Database.class.php";
// include_once "User.class.php";
// include_once "Session.class.php";
// $conn = Database::getConnection();  

// if(!$conn) { 
//     die("Connection failed: "); 
// }
// $username = "sapna";
// $password = "sapna";
//         // Verify user credentials         
//         $userId = User::login($username, $username);                  

//         if (!$userId) {             
//             return false; // Authentication failed   
//             echo "hooo noooo"      ;
//         } else{
//             echo "super";
//         }  

//         // Fetch user details         
//         $user = new User($userId);         

//         // Generate secure session token         
//         $ip = $_SERVER['REMOTE_ADDR'];         
//         $agent = $_SERVER['HTTP_USER_AGENT'];         
//         $token = md5(rand(0, 9999999) . $ip . $agent . time());         

//         // Store session in database         
//         $login_time = date("Y-m-d H:i:s"); // Current timestamp         
//         $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`)                  
//                 VALUES ('$user->id', '$token', '$login_time', '$ip', '$agent', '1')";         

//         if ($conn->query($sql)) {             
//             Session::set('session_token', $token); // Store token in session             
//             return $token;         
//         } else {          
//             echo "SQL Error: " . $conn->error;  
//             return false;         
//         }     

// ?>
$session = false;
if( isset($_POST['uid']) and isset($_POST['token']) and isset($_POST['login_time']) and isset($_POST['ip']) and isset($_POST['user_agent']) and isset($_POST['active'])){
$uid = $_POST['uid'];
$token = $_POST['token'];
$login_time = $_POST['login_time'];
$ip = $_POST['ip'];
$user_agent = $_POST['user_agent'];
$active = $_POST['active'];

$error = User::session($uid, $token, $login_time, $ip, $user_agent, $active);
$session = true;
 }
 `uid`, `token`, `login_time`, `ip`, `user_agent`, `active`
<?php
class UserSession {
    public $token;
    public $conn;
    public $uid;
    public $data;

    public static function authenticate($username, $password) {
        $conn = Database::getConnection();

        // Verify user credentials
        $userId = User::login($username, $password);
        
        if (!$userId) {
            return false; // Authentication failed
        }

        // Fetch user details
        $user = new User($userId);

        // Generate secure session token
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $token = md5(rand(0, 9999999) . $ip . $agent . time());

        // Store session in database
        $login_time = date("Y-m-d H:i:s"); // Current timestamp
        $sql = "INSERT INTO `session` (`uid`, `token`, `login_time`, `ip`, `user_agent`, `active`) 
                VALUES ('$user->id', '$token', '$login_time', '$ip', '$agent', '1')";
        if ($conn->query($sql)) {
            Session::set('session_token', $token); // Store token in session
            return $token;
        } else {
            return false;
        }
    }
    
        // public static function authorize($token){
        //         $sees = new UserSession($token);
        //             $conn = Database::getConnection();
                    
        //             // Validate input token
        //             $token = $conn->real_escape_string($token);
                
        //             // Query to check if the token exists and is active
        //             $sql = "SELECT * FROM session WHERE token = '$token' AND active = 1 LIMIT 1";
        //             $result = $conn->query($sql);
                
        //             if ($result->num_rows > 0) {
        //                 $row = $result->fetch_assoc();
        //                 return new User($row['uid']);  // Return the authenticated user object
        //             } else {
        //                 return false;  // Token is invalid or session expired
        //             }
        //         }
                
        
        public function __construct($id)
        {
        $this->conn = Database::getConnection();
        $ip = $_SERVER['REMOTE_ADDR'];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $token = md5(rand(0, 9999999). $ip.$agent.time());
        $this->token = $token;
        $sql = "SELECT * FROM `session` WHERE `token`= '$this->token' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->data = $row;
            $this->uid = $row['uid'];
        }
        else{
            throw new Exception("Session is invalid.....");
            
        }
    }
        public static function getUser(){

        }

        public static function getIp(){

        }

        public static function isValid(){

        }

        public static function getUserAgent(){

        }

        public static function deactive(){
            
        }

}



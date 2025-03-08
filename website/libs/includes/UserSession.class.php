<?php
class UserSession{
        public $token;
        public $conn;
        public $uid;
        public $data;
        /*
        This function will return a session id if username and password in correct..
        */

        public static function authenticate($username, $password){
            
            $username = User::login($username, $password);
            $user = new User($username);

            if($username){
                $conn = Database::getConnection();
                $ip = $_SERVER['REMOTE_ADDR'];
                $agent = $_SERVER['HTTP_USER_AGENT'];
                $token = md5(rand(0, 9999999). $ip.$agent.time());
                $sql = "INSERT INTO `session` (`id`, `uid`, `token`, `login_time`, `ip`, `user_agent`, `active`) 
                VALUES ('$user->'id', '$token', '2025-01-07 21:27:26', '$ip', '$agent', '1')";
                if($conn->query($sql)){
                    Session::set('session_token', $token);
                    return $token;
                }
                else{
                    return false;
                }
            }else{
                return false;

            }

        }
        public static function authorize($token){
                // $sees = new UserSession($token);
                //     $conn = Database::getConnection();
                    
                //     // Validate input token
                //     $token = $conn->real_escape_string($token);
                
                //     // Query to check if the token exists and is active
                //     $sql = "SELECT * FROM session WHERE token = '$token' AND active = 1 LIMIT 1";
                //     $result = $conn->query($sql);
                
                //     if ($result->num_rows > 0) {
                //         $row = $result->fetch_assoc();
                //         return new User($row['uid']);  // Return the authenticated user object
                //     } else {
                //         return false;  // Token is invalid or session expired
                //     }
                }
                
        
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


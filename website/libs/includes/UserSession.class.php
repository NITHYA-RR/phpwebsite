<?php
class UserSession{
        public $id;
        public $conn;
        public $uid;
        public $data;
        /*
        This function will return a session id if username and password in correct..
        */

        public static function authenticate($username, $password){
            
            $username = User::login($username, $password);

            if($username){
                //$this->conn = Database::getConnection();
            }else{
                return false;

            }

    
        }


        public function __construct($id)
        {
        $this->conn = Database::getConnection();
        $this->id = $id;
        $sql = "SELECT * FROM `session` WHERE `id`= $id LIMIT 1";
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
}


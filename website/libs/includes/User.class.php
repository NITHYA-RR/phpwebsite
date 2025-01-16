<?php
class User
{
    private $conn;
    public static function signup($username, $password, $email, $phone)
    {
        $options = [
            'cost'=>9,
        ];
    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    $conn = Database::getConnection();
    $sql = "INSERT INTO `collect the data` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
     VALUES ('$username', '$password', '$email', '$phone', '0','0');";
    $error = false;
    if ($conn->query($sql) === true) {
        $error = false;
    } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        $error = $conn->error;
     }

    //$conn->close();
    return $error;
    }
    public static function login($username, $password){
        $query = "SELECT * FROM `collect the data` WHERE `username`='$username'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
       if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            ///if($rows['password']==$password){ 
            if(password_verify($password, $row['password'])){
            return $row;
            }else{
                return false;
            }
        }
        else{
            return false;
        }
        
    }
        public function __construct($username){
        $this->conn = Database::getConnection();
        $this->conn->query();
    }

    public function authenticate(){
    }

    public function setBio(){

    }

    public function getBio(){

    }

    public function setAvatar(){

    }

    public function getAvatar(){

    }
    
        
    
}
?>
<?php
require_once "Database.class.php";

class User
{
    private $conn;
    public $username;
    public $id;

    public function __call($name, $arguments)
    {
        $property = preg_replace("/[^0-9a-zA-Z]/", "",substr($name,3));
        $property = strtolower(preg_replace('/\B[A-Z]/','_$1',$property));

        if(substr($name, 0, 3) == "get"){
            return $this->_get_data($property);

        }elseif(substr($name, 0, 3) == "set"){
            return $this->_set_data($property, $arguments[0]);

    }else{
        throw new Exception("User::call() -> $name, function unavailable.");
    }
}
    public static function signup($user, $pass, $email, $phone)
    {
        $options = [

            'cost'=>9,
        ];
    $password = password_hash($pass, PASSWORD_BCRYPT, $options);
    $conn = Database::getConnection();
    $sql = "INSERT INTO `collect the data` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
     VALUES ('$user', '$password', '$email', '$phone', '0','0');";
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
            return $row['username'];
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
        $this->username = $username;
        $sql = "SELECT `id` FROM `collect the data` WHERE `username`='$username' OR `id` = 'username' LIMIT 1";
        $result = $this->conn->query($sql);
        if($result->num_rows) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
        }
        else{
            throw new Exception("Username dosn't exist..!");
            
        }
    }
    private function _get_data($var){
        if(!$this->conn){
            $this->conn = Database::getConnection();
        }
        $sql = "SELECT `$var` FROM `users` WHERE `id`= $this->id";
        $result = $this->conn->query($sql);
        if($result and $result->num_rows == 1){
            return $result->fetch_assoc()["$var"];
        }
        else{
            return null;
        }
        
    }

    private function _set_data($var, $data){
        if(!$this->conn){
            $this->conn = Database::getConnection();
        }
        $sql = "UPDATE `users` SET `$var`='$data' WHERE `id`= $this->id";
        $result = $this->conn->query($sql);
        if($result->num_rows == 1){
            return true;
        }
        else{
            return false;
        }
        
    }

    public function getUsername(){
        return $this->username;
    }
   // private function authenticate(){
   // }

   // public function __set($bio){
      //  return $this->__set('Bio',$bio);

   // }

    //public function __get($bio){
     //   return $this->__get('Bio',$bio);

    //}

    //public function setAvatar($link){
     //   return $this->__set('Avatar', $link);

   // }

   // public function getAvatar($link){
      //  return $this->__get('Avatar', $link);


   // }
    //public function setFirstname($name){
     //   return $this->__set('First name',$name);
    //}

    //public function getFirstname($name){
    //    return $this->__get('First name');
    //}

    //public function setLastname($name){
    //    return $this->__set('Last name',$name);
   // }

   // public function getLastname($name){
   //     return $this->__get('Last name');
   // }

   // public function setDob($year, $month, $date){
   //     if(checkdate($year, $month, $date)){
   //         return $this->__set('Data of Birth',$year.$month.$date);
   //     }else{
   //         return false;
   //     }
   // }
   // public function getDob(){
   //     $this->__get('Data of Birth');
   // }  

   // public function setInstagram($link){
   //     $this->__set('Instagram',$link);

  //  }
  //  public function getInstagram(){
    //    $this->__get('Instagram');

  //  }
  //  public function setFacebook($link){
      //  $this->__set('Facebook',$link);

   // }
    //public function getFacebook(){
     //   $this->__get('Instagram');

   // }
   // public function setTwitter($link){
      //  $this->__set('Twitter',$link);
    //}

    //public function getTwitter(){
       // $this->__get('Twitter');
    
       // }
    }
    

    



?>
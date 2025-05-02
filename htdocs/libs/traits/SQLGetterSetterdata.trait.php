<?php

trait SQlGetterSetter{

public function __call($name, $arguments)
{
    $property = preg_replace("/[^0-9a-zA-Z]/", "",substr($name,3));
    $property = strtolower(preg_replace('/\B[A-Z]/','_$1',$property));

    if(substr($name, 0, 3) == "get"){
        return $this->_get_data($property);

    }elseif(substr($name, 0, 3) == "set"){
        return $this->_set_data($property, $arguments[0]);

}else{
    throw new Exception("Post::call() -> $name, function unavailable.");
}
}
 
private function _get_data($var){
    if(!$this->conn){
        $this->conn = Database::getConnection();
    }
    $sql = "SELECT `$var` FROM `post` WHERE `id`= $this->id";
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
    $sql = "UPDATE `post` SET `$var`='$data' WHERE `id`= $this->id";
    $result = $this->conn->query($sql);
    if($result->num_rows == 1){
        return true;
    }
    else{
        return false;
    }
    
}
}
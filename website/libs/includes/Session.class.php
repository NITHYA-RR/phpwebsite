<?php
class session{
    public static function start(){
        session_start();
    }

    public static function unset()
    {
        session_unset();

    }
    
    public static function destroy(){
        session_destroy();

    }
    public static function set($key,$value){
        $_SESSION[$key] = $value;
    }
    public static function delete($key){
        unset($_SESSION[$key]);
    }
    public static function isset($key){
       return isset($_SESSION[$key]);
    }

    public static function get($key , $default=false){
        if(Session::isset($key)){
        return ($_SESSION[$key]);
        }
        else{
            return $default;
        }
     }

    public static function load_templates($name) {
        include $_SERVER['DOCUMENT_ROOT'] . "/website/__templates/$name.php";
    }
    
     public static function renderpage(){
        Session::load_templates('master');
        Session::load_templates('master1');

     }
     
}
?>


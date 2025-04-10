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
        include __DIR__ . "/../__templates/$name.php";
    }
    
     public static function renderpage($page = 'index.php'){
        if(Session::isset('user')){
            include_once 'website/__templates/__main.php';
        }else{
            include_once 'website/login.php';
        }
}
}
?>


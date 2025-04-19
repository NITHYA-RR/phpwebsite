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
        static $errorCalled = false; // Prevents infinite loop
    
        $script = $_SERVER['DOCUMENT_ROOT'] . "/htdocs/__templates/$name.php";
        if (is_file($script)) {
            include $script;
        } else {
            if (!$errorCalled) {
                $errorCalled = true;
                Session::load_templates($name); // only one retry
            } else {
                echo "Template '$name' not found. Error template also missing.";
            }
        }
    }
    public static function renderpage(){
        Session::load_templates('master');
        
    }
     public static function currentScript(){
        return basename($_SERVER['SCRIPT_NAME'],'.php');
        

     }
     public static function isAuthenticated(){
        return true;
     }
}
?>


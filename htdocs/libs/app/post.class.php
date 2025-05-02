<?php
include_once __DIR__ ."/../traits/SQlGetterSetterdata.trait.php";
class Post{
    
    private $id;
    private $conn;
    private $table;
    use SQlGetterSetter;
    public static function registerPost($text, $image_tmp){
        if(isset($_FILES['post_image']) and isset($_POST['post_text']))
        
        {
    $author = Session::getUser()->getEmail();
        $image_name = md5($author.time()) . ".jpg";
        $image_path = get_config('upload_path') . $image_name;
       if( move_uploaded_file($image_tmp, $image_path)){
        
        $insert_command = "INSERT INTO `post` (`post_text`, `image_url`, `like_count`, `uploaded_time`, `owner`)
        VALUES ('$text', 'https://stock.adobe.com/in/search?k=happy+birthday+cat', '0', now(), '$author')";
        $db = Database::getConnection();
        if($db->query($insert_command)){
            $id = mysqli_insert_id($db);
            return new Post($id);
        }
            else{
                return false;

            }
        }
    }
         else{
         throw new Exception("Image not Registered.");
    }
}

public function __construct($id)
{
    $this->id = $id;
    $this->conn = Database::getConnection();
    $this->table = "post";
    



    }
}

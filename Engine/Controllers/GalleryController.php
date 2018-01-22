<?php
// include "./Models/GalleryItemModel.php"
include "./Models/GalleryModel.php";
class GalleryController{
    private const $___debug___ = true;
    private $__db_host, $__db_user, $__db_pass, $__db_name;
    private $__db_connection, $__db_connection_error;
    private $__gallery_model;

    function _cunstruct($_db_host, $_db_user, $_db_pass, $_db_name = "ZOZMB_PERSONAL_GALLERY"){
        $__db_host = $_db_host;
        $__db_user = $_db_user;
        $__db_pass = $_db_pass;
        $__db_name = $_db_name;
    }

    public function initialize(){
        $__db_connection = new mysqli($__db_host, $__db_user, $__db_pass);
        if ($__db_connection->connect_error) {
            $__db_connection_error = $__db_connection->error_get_last;
            return false;
        }

        $sql = "CREATE DATABASE IF NOT EXISTS ".$__db_name;
        if ($__db_connection->query($sql) === TRUE) {
            $sql = "CREATE TABLE GalleryItems (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(64) NOT NULL,imgfile VARCHAR(64) NOT NULL,description VARCHAR(2048) NOT NULL)";
            if ($__db_connection->query($sql) === FALSE) {
                $__db_connection_error = $__db_connection->error_get_last;
                return false;
            }
        }
        else{
            //do srawdzenia co i kiedy zwraca $sql = "CREATE DATABASE IF NOT EXISTS ZOZMB_PERSONAL_GALLERY";
            $__db_connection_error = $__db_connection->error_get_last;
            return false;
        }

        $__db_connection->close();
        $__db_connection = new mysqli($__db_host, $__db_user, $__db_pass, $__db_name);
        if ($__db_connection->connect_error) {
            $__db_connection_error = $__db_connection->error_get_last;
            return false;
        }

        $sql = "SELECT * FROM GalleryItems";
        $result = $__db_connection->query($sql);
        if ($result->num_rows > 0) {
            $__gallery_model = new GalleryModel();
            while($row = $result->fetch_assoc()) {
                if($___debug___){
                    echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
                    echo "<pre>".$row["description"]."</pre><hr>";
                }
                $item = new GalleryItemModel($row["imgFile"],$row["name"],$row["description"]);
                $__gallery_model->insert($item);
            }
        } else {
            if($___debug___){
                echo "0 results";
            }
        }
        $__db_connection->close();

        return true;
    }

    public function db_connection_error(){
        return $__db_connection_error;
    }

    public function gallery(){
        return $__gallery_model;
    }
}
?>
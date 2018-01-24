<?php
// include "./Models/GalleryItemModel.php"
include "./Models/GalleryModel.php";
class GalleryController{
    private $__db_host, $__db_user, $__db_pass, $__db_name, $__db_table;
    private $__db_connection, $__db_connection_error;
    private $__gallery_model;

    function _cunstruct($_db_host, $_db_user, $_db_pass, $_db_name, $_db_table){
        $__db_host = $_db_host;
        $__db_user = $_db_user;
        $__db_pass = $_db_pass;
        $__db_name = $_db_name;
        $__db_table = $_db_table;
    }

    public function initialize(){

        $__db_connection = new mysqli($__db_host, $__db_user, $__db_pass, $__db_name);
        if ($__db_connection->connect_error) {
            $__db_connection_error = $__db_connection->error_get_last;
            return false;
        }

        $sql = "SELECT * FROM ".$__db_table;
        $result = $__db_connection->query($sql);
        if ($result->num_rows > 0) {
            $__gallery_model = new GalleryModel();
            while($row = $result->fetch_assoc()) {
                $item = new GalleryItemModel($row["imgFile"],$row["name"],$row["description"]);
                $__gallery_model->insert($item);
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

    public function addNewItemToDatabase($newItem){
        $__db_connection = new mysqli($__db_host, $__db_user, $__db_pass, $__db_name);
        if ($__db_connection->connect_error) {
            $__db_connection_error = $__db_connection->error_get_last;
            return false;
        }

        $sql = "SELECT * FROM ".$__db_table;
        $result = $__db_connection->query($sql);
        return $result;
    }
}
?>
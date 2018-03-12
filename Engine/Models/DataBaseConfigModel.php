<?php
class DataBaseConfigModel{
    private const $__db_host = "localhost";
    private const $__db_name = "Gallery";
    private const $__db_user = "root";
    private const $__db_pass = "";
    private const $__db_table = "GalleryTable";

    public function initialize(){
        // $__db_connection = new mysqli($__db_host, $__db_user, $__db_pass);
        // if ($__db_connection->connect_error) {
        //     $__db_connection_error = $__db_connection->error_get_last;
        //     return false;
        // }
        //
        // $sql = "CREATE DATABASE IF NOT EXISTS ".$__db_name;
        // if ($__db_connection->query($sql) === TRUE) {
        //     $sql = "CREATE TABLE GalleryItems (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name VARCHAR(64) NOT NULL,imgfile VARCHAR(64) NOT NULL,description VARCHAR(2048) NOT NULL)";
        //     if ($__db_connection->query($sql) === FALSE) {
        //         $__db_connection_error = $__db_connection->error_get_last;
        //         return false;
        //     }
        // }
        // else{
        //     //do srawdzenia co i kiedy zwraca $sql = "CREATE DATABASE IF NOT EXISTS ZOZMB_PERSONAL_GALLERY";
        //     $__db_connection_error = $__db_connection->error_get_last;
        //     return false;
        // }
        // $__db_connection->close();
    }

    public function host(){
        return $__db_host;
    }

    public function name(){
        return $__db_name;
    }

    public function user(){
        return $__db_user;
    }

    public function pass(){
        return $__db_pass;
    }

    public function table(){
        return $__db_table;
    }
}

?>
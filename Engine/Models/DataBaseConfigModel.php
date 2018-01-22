<?php
class DataBaseConfigModel{
    private const $__db_host = "localhost";
    private const $__db_name = "Gallery";
    private const $__db_user = "root";
    private const $__db_pass = "root";
    private const $__db_table = "GalleryTable";

    public function initialize(){
        //create table if not exist
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
}

?>
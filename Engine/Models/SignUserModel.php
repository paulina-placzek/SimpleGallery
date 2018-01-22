<?php
class SignUserModel{
    private const $__defaultUser = "root";
    private const $__defaultPass = "root";

    function _construct(){

    }

    public function user(){
        return $__defaultUser;
    }

    public function password(){
        return $__defaultPass;
    }
}
?>
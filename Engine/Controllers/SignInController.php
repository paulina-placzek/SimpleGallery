<?php
include "./Views/SignInView.php"
class SignInController{
    function _construct(){
    }

    public function initialize($signInPageUrl){
        session_start();
        if(isUserSignedIn()){
            return true;
        }
        else{
            if(isset($_POST["signin"])){
                if(signIn()){
                    return true;
                }
            }
            $view = new SignInView($signInPageUrl);
            return false;
        }
    }

    public function isUserSignedIn(){
        return isset($_SESSION["uisi"]);
    }

    private function signIn(){
        if(isset($_POST["user"]) && isset($_POST["pass"])){
            $default_user = new SignUserModel();
            if($_POST["user"] == $default_user->user() && $_POST["pass"] == $default_user->password()){
                $_SESSION["uisi"] = 1;
                return true;
            }
        }
        return false;
    }
}
?>
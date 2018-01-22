<?php
include "SignInController.php"
include "GalleryController.php"
include "./Models/GalleryItemModel.php"
include "./Views/GalleryAddItemView.php"


class GalleryAddItemController{
    function _construct(){
        session_start();
        $signInController = new SignInController();
        if(!$signInController->isUserSignedIn()){
            echo '<div class="acces-denied>Brak uprawnień do oglądania tej strony</div>';
        }
        else if(isset($_POST["additem"])){
            //upload file
            //create gallery item
            //add item to gallery
            //update database
        }
        else{
            $view = new GalleryAddItemView();
        }
    }

    private function parseNewGalleryItem(){
    }
}
?>
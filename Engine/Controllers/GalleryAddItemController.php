<?php
include "SignInController.php"
include "GalleryController.php"
include "./Models/GalleryItemModel.php"
include "./Models/DataBaseConfigModel.php"
include "./Views/GalleryAddItemView.php"


class GalleryAddItemController{
    function _construct(){
        session_start();
        $signInController = new SignInController();
        if(!$signInController->isUserSignedIn()){
            echo '<div class="acces-denied>Brak uprawnień do oglądania tej strony.</div>';
        }
        else if(isset($_POST["additem"])){
            parseNewGalleryItem();
        }
        else{
            $view = new GalleryAddItemView();
        }
    }

    private function parseNewGalleryItem(){
        $img = uploadImage();
        if($img){
            $name = verifyValue($_POST["name"]);
            $description = verifyValue($_POST["description"]);
            $dbConfig = new DataBaseConfigModel();
            $galleryController = new GalleryController($dbConfig->host(), $dbConfig->user(), $dbConfig->pass(), $dbConfig->name());
            if(!$galleryController->addNewItemToDatabase(new GalleryItemModel($img,$name,$description))){
                echo '<div class="gallery_errir">'.$galleryController->db_connection_error().'</div>';
            }
        }
    }

    private function uploadImage(){
        $maxFileSize = 1024*1024;
        if (is_uploaded_file($_FILES["file"]["tmp_name"]){
            if($_FILES["file"]["size"]>$maxFileSize){
                echo '<div class="image-upload-oversize">Przesyłany plik jest zbyt duży. Maksymalny rozmiar to 10MB.</div>';
                return false;
            }
            else{
                if(isset($_FILES["file"]["type"])){
                    if(!($_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"]loadfile_type == "image/png")){
                        echo '<div class="image-upload-wrong-type">Przesyłany plik musi być plikem graficznym (JPG/PNG).</div>';
                        return false;
                    }
                    else{
                        $fileNewName = time();
                        $filePath = $_SERVER["DOCUMENT_ROOT"].'/upload/'.$fileNewName.'.'.$_FILES["file"]["type"];
                        move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);
                        return $filePath;
                    }
                }
                else{
                    echo '<div class="image-upload-error">Błąd podczas przesyłania pliku.</div>';
                    return false;
                }
            }
        }
    }

    private function verifyValue($text){
        /*
        string htmlspecialchars ( string $string [, int $flags = ENT_COMPAT | ENT_HTML401 [, string $encoding = ini_get("default_charset") [, bool $double_encode = true ]]] )
        Available flags constants
            Constant Name	Description
            ENT_COMPAT	Will convert double-quotes and leave single-quotes alone.
            ENT_QUOTES	Will convert both double and single quotes.
            ENT_NOQUOTES	Will leave both double and single quotes unconverted.
            ENT_IGNORE	Silently discard invalid code unit sequences instead of returning an empty string. Using this flag is discouraged as it » may have security implications.
            ENT_SUBSTITUTE	Replace invalid code unit sequences with a Unicode Replacement Character U+FFFD (UTF-8) or &#xFFFD; (otherwise) instead of returning an empty string.
            ENT_DISALLOWED	Replace invalid code points for the given document type with a Unicode Replacement Character U+FFFD (UTF-8) or &#xFFFD; (otherwise) instead of leaving them as is. This may be useful, for instance, to ensure the well-formedness of XML documents with embedded external content.
            ENT_HTML401	Handle code as HTML 4.01.
            ENT_XML1	Handle code as XML 1.
            ENT_XHTML	Handle code as XHTML.
            ENT_HTML5	Handle code as HTML 5.
        */
        return htmlspecialchars($text);
    }
}
?>
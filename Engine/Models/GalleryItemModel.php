<?php
class GalleryItemModel {
    private $__img_path;
    private $__name;
    private $__description;

    function _construct($_img_path,$_name,$_description){
            $__img_path = $_img_path;
            $__name = $_name;
            $__description = $_description;
    }

    public function img_path(){
        return $__img_path;
    }

    public function name(){
        return $__name;
    }

    public function description(){
        return $__description;
    }
}
?>
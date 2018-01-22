<?php
include "GalleryItemModel.php";
class GalleryModel{
    private $__items, $__size;

    function _construct(){
        $__size = 0;
    }

    public function instertItem($_item){
        $__items[$__size] = $_item;
        $__size++;
    }

    public function items(){
        return $__items;
    }

    public function itemAt($_index){
        if($_index < $__size){
            return $__items[$_index];
        }
        else{
            return -1;
        }
    }

    public function size(){
        return $__size;
    }
}
?>
<?php
include "./Controllers/GalleryController.php";
include "./Models/DataBaseConfigModel.php"

class GalleryView{
    function _cunstruct(){
        $__db_config = new DataBaseConfigModel();
        $__gallery_controller = new GalleryController($__db_config->host(), $__db_config->user(), $__db_config->pass(), $__db_config->name());
        if(!$__gallery_controller->initialize()){
            echo '<div class="gallery_error">'.$__gallery_controller->db_connection_error().'</div>';
        }
        else{
            $__gallery = $__gallery_controller->gallery();
            foreach ($__gallery as $item) {
                echo '<div class="gallery-item"><div class="image">';
                echo $item->img_path();
                echo '</div><div class="name">';
                echo $item->name();
                echo '</div><div class="description">';
                echo $item->description();
                echo '</div></div>';
            }
        }
    }
}
?>
<?php
include "../Controllers/GalleryController.php";

class GalleryView{
    function _cunstruct(){
        $__gallery_controller = new ("_db_host", "_db_user", "_db_pass", "ZOZMB_PERSONAL_GALLERY_GLOBAL_TEST");
        if(!$db_connection_error->initialize()){
            echo '<div class="gallery_global_test_result">'.$__gallery_controller->db_connection_error().'</div>';
        }
        else{
            $__gallery = $db_connection_error->gallery();
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
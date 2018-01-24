To use this application you should insert
<?php include "Engine/Views/GalleryView.php"; $_gv_ = new GalleryView(); ?>
into your php file.

The gallery item has structure as bellow:
<div class="gallery-item">
    <div class="image" style="background-image: url('/* ITEM IMG PATH */');">
    </div>
    <div class="name">
        <!-- ITEM NAME -->
    </div>
    <div class="description">
        <!-- ITEM DESCRIPTION -->
    </div>
</div>
<?php
  include_once "Layouts/Customer/header.php"
?>

<div class="fashion_section">
    <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
                include "DatabaseConfigurations/Lists.php";
                PrepareProductMenu();
            ?>
        </div>
        <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>



<?php
  include_once "Layouts/Customer/footer.php"
?>
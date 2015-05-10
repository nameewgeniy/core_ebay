<?php
    $id = 2;
    $count_item = 3;
?>
    <div class="oneslide">
        <div id="carousel-generic-latest-one-<?php echo $id; ?>" data-wrap="true" class="carousel slide" data-interval="false" data-ride="carousel">
            <div class="cat-zag ">
                <h3 class="oneslide-h  "><span class="icons icon-magic"></span>SPECIAL</h3>
                <div class="carousel-arrows">
                    <a class="icons icon-left-dir " href="#carousel-generic-latest-one-<?php echo $id; ?>" data-slide="prev"></a>
                    <a class="icons icon-right-dir" href="#carousel-generic-latest-one-<?php echo $id; ?>" data-slide="next"></a>
                </div>
            </div>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <?php ViewProducts($id, 1 ) ?>
                </div>
                <?php
                for($i = 0; $i < $count_item-1; $i++):
                    ?>
                    <div class="item ">
                        <?php ViewProducts($id, 1 ) ?>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

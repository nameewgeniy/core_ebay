<?php
$args = array(
    'post_type'      => 'news_ebay',
    'posts_per_page' => $count,
);

$result = new WP_Query( $args );
$items = $result->posts;


?>
<div class="oneslide">
    <div id="carousel-generic-latest-one-<?php echo $id; ?>" data-wrap="true" class="carousel slide" data-interval="false" data-ride="carousel">
        <div class="cat-zag ">
            <h3 class="oneslide-h  "><span class="icons icon-magic"></span>LATEST NEWS</h3>
            <div class="carousel-arrows">
                <a class="icons icon-left-dir " href="#carousel-generic-latest-one-<?php echo $id; ?>" data-slide="prev"></a>
                <a class="icons icon-right-dir" href="#carousel-generic-latest-one-<?php echo $id; ?>" data-slide="next"></a>
            </div>
        </div>
        <div class="carousel-inner" role="listbox">
            <?php
            if (count($items))
                foreach ($items as $item){
                    $i++;
                    $class = ($i == 1) ? 'active' : '';
                    ?>
                    <div class="item <?=$class?> ">
                      <div class="one_news">
                        <?php
                            echo '<h4><a href="'. get_permalink($item->ID) .'">' . $item->post_title . '</a></h4>';
                            echo '<p>' . MaepCore::MoreContent($item->post_content, 20) . '</p>' ;
                        ?>
                      </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>



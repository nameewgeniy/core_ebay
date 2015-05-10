<?php

    $args = array(
        'post_type'      => 'maep_products',
        'posts_per_page' => 3,
        'orderby' => 'rand'
    );
    
    $result = new WP_Query( $args );
    $items = $result->posts;
?>
<div class="review-product">
    <div id="carousel-generic-latest-review-<?php echo $id; ?>" data-wrap="true" class="carousel slide" data-interval="4000" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php
            $class = 'active';
            if (count($items)):
                foreach ($items as $item):
                    $products = new Product($item->ID);?>
                    <div class="item <?php echo $class ?>">
                        <div class="cont-rev">
                            <h5 class="description-product rev-h"><a href="<?php echo get_permalink($item->ID); ?>"><?php echo MaepCore::MoreContent($products->get_title(), 7) ; ?></a></h5>
                            <a class="but-rev" href="<?php echo $products->get_link(); ?>" target="_blank">Buy Now</a>
                        </div>
                        <div class="img-rev">
                            <img src="<?php echo $products->get_thumbnail(); ?>" alt="<?php echo MaepCore::MoreContent($products->get_title(), 12) ; ?>"/>
                        </div>
                    </div>
                <?php
                    if (isset($class))
                        unset($class);
                endforeach; endif;?>
        </div>
    </div>
</div>
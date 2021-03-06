<?php get_header(); ?>
<?php
$term = $wp_query->queried_object;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'maep_products',
    'posts_per_page' => 18,
    'orderby'        => 'date',
    'paged'          => $paged,
    'tax_query' => array(
        array(
            'taxonomy' => 'catproducts',
            'field' => 'id',
            'terms' => $term->term_id,
        )
    ),
);
$result = new WP_Query( $args );
$items = $result->posts;
?>

        <div class="border col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
        <ol class="breadcrumb">
            <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
        </ol>
        <div class="row text-center">
            <h1 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; padding-bottom: 34px; border-bottom: 3px dotted #ccc;" ><?php single_cat_title() ?></h1>
            <?php if(count($items)): ?>
                <?php $i = 0; foreach($items as $item):
                    $products = new Product($item->ID);
                    ?>
                    <div class="product col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="<?php echo get_permalink($item->ID); ?>" class="thumbnail">
                            <img src="<?php echo $products->get_thumbnail(); ?>" alt="...">
                            <span class="cost"><?php echo $products->get_cost().' '. $products->get_currency() ?></span>
                        </a>
                        <p class="description-product"><a href="<?php echo get_permalink($item->ID); ?>"><?php echo MaepCore::MoreContent($products->get_title(), 7) ; ?></a></p>
                        <a href="<?php echo get_permalink($item->ID); ?>" class="buy-now">Buy Now</a>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="pagination">
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
        </div>

<?php get_footer(); ?>
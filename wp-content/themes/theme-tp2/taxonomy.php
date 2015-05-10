<?php get_header(); ?>
<?php
$term = $wp_query->queried_object;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'maep_products',
    'posts_per_page' => 10,
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

<div class="content page-single taxonomy">
    <ol class="breadcrumb">

        <?php if(function_exists('bcn_display')) { bcn_display(); } ?>

    </ol>
    <div class="categories-item col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <div class="items-cat">
            <?php get_sidebar('categories');  ?>
        </div>
        <?php get_sidebar('featured'); ?>
        <div  class="ebay-b" >
            <?php
            if ( function_exists('dynamic_sidebar') )
                dynamic_sidebar('side-banner');
            ?>

        </div>
    </div>
    <div class="main-img col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <h1 class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; padding-bottom: 34px;" ><?php single_cat_title() ?></h1>
        <?php if(count($items)): ?>
            <?php $i = 0; foreach($items as $item):
                $products = new Product($item->ID);
                ?>
                <div class="product">
                    <a href="<?php echo get_permalink($item->ID); ?>" class="thumbnail">
                        <img src="<?php echo $products->get_thumbnail(); ?>" alt="<?php echo MaepCore::MoreContent($products->get_title(), 7) ; ?>"/>
                    </a>
                    <div class="caption">
                        <h5 class="description-product"><a href="<?php echo get_permalink($item->ID); ?>"><?php echo MaepCore::MoreContent($products->get_title(), 7) ; ?></a></h5>
                        <h5 class="price"><?php echo $products->get_currency().$products->get_cost() ?></h5>
                        <p class="stars">
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon icon-star"></i>
                            <i class="icon-star-empty"></i>
                        </p>
                    </div>
                    <div class="prod-button">
                        <a class="detail" href="<?php echo get_permalink($item->ID); ?>"><span class="icons icon-docs"></span>DETAIL</a>
                        <a class="detail prod-buy-now" href="<?php echo $products->get_link(); ?>"><span class="icons icon-basket-2"></span></a>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="pagination" >
            <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
        </div>
    </div>
    <?php get_footer(); ?>

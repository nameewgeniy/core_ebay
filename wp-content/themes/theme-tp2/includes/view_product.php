<?php
// вывод товаров по id категории
function ViewProducts($term_id='', $count='4' )
{
    $args = array(
        'post_type'      => 'maep_products',
        'posts_per_page' => $count,
        'orderby' => 'rand'
    );
    if( !empty($term_id) )
    {
        $args = $args + array(
                'tax_query' => array(
                    array(
                        'taxonomy' => 'catproducts',
                        'field'    => 'id',
                        'terms'    => $term_id
                    )
                )
            );
    }

    $result = new WP_Query( $args );
    $items = $result->posts;

    if (count($items)):

        foreach ($items as $item):
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
        <?php endforeach; endif;
}
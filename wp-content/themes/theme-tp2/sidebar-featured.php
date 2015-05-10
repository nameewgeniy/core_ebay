<div class="sidebar-featured">
    <h3 class="head hCat "><span class="icons icon-award-2"></span>Featured</h3>
    <?php
    $count = 6;
    if(get_option('count_featured') != 0)
        $count = get_option('count_featured');

        $args = array(
            'post_type'      => 'maep_products',
            'posts_per_page' => $count,
            'orderby' => 'rand'
        );

        $result = new WP_Query( $args );
        $items = $result->posts;
        if (count( $items ))
            foreach($items as $post)
            {
               $products = new Product($post->ID);
               $html .= '<div href="'. get_permalink($post->ID) . '" class="thumbnail">';
               $html .= '<div class="min-img"><img src="'. $products->get_thumbnail() . '" alt="..."></div>';
               $html .= '<h5 class="description-product"><a href="' . get_permalink($item->ID) . '">' . MaepCore::MoreContent($products->get_title(), 7) .'</a></h5>';
               $html .= ' <span class="cost">' .  $products->get_cost().' '. $products->get_currency() . '</span></div>';
               echo $html;
               unset($html);
            }
    ?>
</div>



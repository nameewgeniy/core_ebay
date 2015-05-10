<div class="sidebar-featured">
    <a class="head">Featured</a>
    <?php
        $args = array(
            'post_type'      => 'maep_products',
            'posts_per_page' => 8,
            'orderby' => 'rand'
        );

        $result = new WP_Query( $args );
        $items = $result->posts;
        if (count( $items ))
            foreach($items as $post)
            {
               $products = new Product($post->ID);
               $html .= '<a href="'. get_permalink($post->ID) . '" class="thumbnail">';
               $html .= '<img src="'. $products->get_thumbnail() . '" alt="...">';
               $html .= ' <span class="cost">' .  $products->get_cost().' '. $products->get_currency() . '</span></a>';
               echo $html;
               unset($html);
            }
    ?>
</div>

<div class="sid">
	                                 <script type="text/javascript" src='http://adn.ebay.com/files/js/min/jquery-1.6.2-min.js'></script>
            <script type="text/javascript" src='http://adn.ebay.com/files/js/min/ebay_activeContent-min.js'></script>
            <script charset="utf-8" type="text/javascript">
                document.write('\x3Cscript type="text/javascript" charset="utf-8" src="http://adn.ebay.com/cb?programId=1&campId=5337604122&toolId=10026&keyword=n&catId=15032&width=150&height=600&font=1&textColor=000000&linkColor=0000AA&arrowColor=8BBC01&color1=709AEE&color2=[COLORTWO]&format=ImageLink&contentType=TEXT_AND_IMAGE&enableSearch=y&usePopularSearches=n&freeShipping=n&topRatedSeller=n&itemsWithPayPal=n&descriptionSearch=n&showKwCatLink=n&excludeCatId=&excludeKeyword=&disWithin=200&ctx=n&autoscroll=y&flashEnabled=' + isFlashEnabled + '&pageTitle=' + _epn__pageTitle + '&cachebuster=' + (Math.floor(Math.random() * 10000000 )) + '">\x3C/script>' );
            </script>
        
        
</div>


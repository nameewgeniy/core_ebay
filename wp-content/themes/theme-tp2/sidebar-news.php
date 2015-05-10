<?php
/*
 * Settings
 *
 */
$count = 2; ?>

<div id="carousel-generic-news" data-wrap="false" class="carousel slide" data-interval="false" data-ride="carousel">
    <div class="cat-zag">
        <h2>LATEST NEWS & REVIEWS</h2>
        <div class="carousel-arrows">
            <a class="icons icon-left-dir " href="#carousel-generic-news" data-slide="prev"></a>
            <a class="icons icon-right-dir" href="#carousel-generic-news" data-slide="next"></a>
        </div>
    </div>
    <div class="carousel-inner" role="listbox">
        <?php for($i = 1; $i < $count+1; $i++):

            $args = array(
                'post_type'      => 'reviews_ebay',
                'posts_per_page' => 2,
                'orderby' => 'rand'
            );

            $result = new WP_Query( $args );
            $items = $result->posts;
            ?>
            <div class="item <?php if ($i == 1) echo 'active'; ?>">
                <?php
            if (count( $items ))
                foreach($items as $post)
                {
                    $pattern = '(\<img(\/?[^\>]+)\>)';
                    $src_img = preg_match($pattern,$post->post_content,$matches);
                    ?>
                    <div class="new-one col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="img-news ">
                            <? echo $matches[0]; ?>
                        </div>
                        <div class="desc-news">
                            <h3><?php echo $post->post_title; ?></h3>
                            <a href="<?php echo get_permalink($post->ID); ?>" class="more-guide">More</a>
                        </div>
                    </div>
                    <?
                    unset($html);
                }
                ?>
            </div>
        <?php endfor; ?>
    </div>
</div>
<?php get_header(); ?>


        <ol class="breadcrumb">
            <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
        </ol>

            <?php
            $terms =  ghost_categories();
            if($terms) :
                foreach ( $terms as $term ) {
                    $link = get_term_link( $term, 'catproducts' );
                    if ($term->count > 0):
                        ?>
                        <a class="label label-info" href="<?php echo $link ?>"><?php echo $term->name ?>(<?php echo $term->count; ?>)</a>
                        <?php
                    endif;
                }
            endif;
            ?>
            <div class='clearfix' ></div>
            <div class="pagination">
                <?php echo b2_pagination( ceil(b2_get_count_post('catproducts') / 100) ); ?>
            </div>



<?php get_footer(); ?>
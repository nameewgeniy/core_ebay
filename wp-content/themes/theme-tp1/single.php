<?php get_header(); ?>    <div class="categories-item col-lg-3 col-md-3 col-sm-3 col-xs-3">        <div class="items-cat">            <?php get_sidebar('categories');  ?>        </div>        <?php get_sidebar('featured');  ?>    </div>    <div class="main-img col-lg-9 col-md-9 col-sm-9 col-xs-9">        <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>            <h4><?php the_title() ?></h4>            <?php the_content() ?>        <?php endwhile; endif; ?>    </div><?php get_footer(); ?>
<?php get_header('home') ?>
    <div class="clearfix"></div>
    <div class="padding-left col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <?php
            if (get_option('enable_slide') == 1)
                get_sidebar('review');?>
        <?php
            if (get_option('enable_news') == 1)
                get_sidebar('onenews');?>
        <?php
            if (get_option('enable_features') == 1)
                get_sidebar('featured');
        ?>
    </div>
    <div class="right-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <?PHP
            view_carusel(get_option('home_cat_1'), 3);
            view_carusel(get_option('home_cat_2'), 3);
            view_carusel(get_option('home_cat_3'), 3);
        ?>

    </div>
    <div  class="ebay-b" >
        <?php
        if ( function_exists('dynamic_sidebar') )
           dynamic_sidebar('center-banner');
        ?>

    </div>
    <div class="news">
        <?php get_sidebar('news'); ?>
    </div>
    <div class="offer-block items">
        <div class="item offer-block-1 stat-block">
            <h2>100% secure shopping</h2>
            <img src="http://petgroomingwebsite.com/wp-content/themes/metro/images/icon_secure.png">
            <p>Every one of our transactions is guaranteed to be secure. All orders processed safety and securely. We have made every effort to ensure we protect your personal information online</p>
        </div>
        <div class="item offer-block-2 stat-block">
            <h2>100% satisfaction</h2>
            <img src="http://petgroomingwebsite.com/wp-content/themes/metro/images/icon_satisfaction.png">
            <p>We Guarantee 100% satisfaction. We guarantee high quality accommodations, friendly and efficient service, and clean, comfortable surroundings</p>
        </div>
        <div class="item offer-block-3 item-last stat-block">
            <h2>100% money back</h2>
            <img src="http://petgroomingwebsite.com/wp-content/themes/metro/images/icon_moneyback.png">
            <p>If you're not completely satisfied, we don't expect you to pay. We are so confident; we give every client a 100% money back guarantee</p>
        </div>

        <div class="clear"></div>
    </div>

<?php get_footer() ?>


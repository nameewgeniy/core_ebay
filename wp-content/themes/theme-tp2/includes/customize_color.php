<?php

// кастомайз темы
function gen_add_css_color()
{
    ?>
    <style type="text/css">
        .color-1, .menu li:hover, li.blue-2, .cat-zag, a.label-info
        {
            background: <?php echo get_option('color-1') ?>;
        }

        .color-1-color,.slider li h3,.slider li p
        {
            color: <?php echo get_option('color-1') ?>;
        }

        .color-6, li.red-3, .hCat
        {
            background: <?php echo get_option('color-6') ?>;
        }

        .color-6-color, .slider, .cat-a a:hover
        {
            color: <?php echo get_option('color-6') ?>;
        }

        .color-2,.head, .text-my-bold, .returns, li.red
        {
            background: <?php echo get_option('color-2') ?>;
        }

        .color-3, li.blue, a.prod-buy-now, .more-guide, .stat-block:nth-child(even), .terms{
            background: <?php echo get_option('color-3') ?>;

        }

        .policy, li.red-2, .detail, .oneslide .cat-zag, .stat-block:nth-child(3)
        {
            background: <?php echo get_option('color-4') ?>;

        }
        .box-search .btn-default, li.green, .stat-block
        {
            background: <?php echo get_option('color-5') ?>;
        }

        .price
        {
            color: <?php echo get_option('color-price') ?>;
        }

        body {background: <?php echo get_option('body') ?>}

        .wrapper
        {
            background: <?php echo get_option('wrap') ?>;
        }


    </style>
<?php
}
add_action('wp_head', 'gen_add_css_color');


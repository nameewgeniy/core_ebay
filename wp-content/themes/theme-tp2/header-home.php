<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="verifyownership" content="c35c04abf8fc061261395f70675aecb3" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_option('favicon') ?>">
    <title>
        <?php
        global $page, $paged;
        wp_title( '|', true, 'right' );
        bloginfo( 'name' );
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'natura' ), max( $paged, $page ) );
        ?>
    </title>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php wp_head();?>
</head>
<body>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', '<?php echo get_option('google_analytics'); ?>', 'auto');
    ga('send', 'pageview');

</script>
<div class="wrapper">
    <div class="header">
        <div class="logo col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href="<?php bloginfo('url') ?>">
                <img src="<?php echo get_option('logo_top'); ?>" alt="">
            </a>
        </div>
        <div class="blocks col-lg-6 col-md-6 col-sm-12 col-xs-12 box-search">
            <form class="input-group" role="search" name="searchform" method="get" action="<?php bloginfo("url"); ?>">
                <input type="text" id="s" name="s" value=""  class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">SEARCH</button>
              </span>
            </form>
        </div>
        <div class="center-blocks">
            <?php include('includes/menu.php'); ?>
        </div>
    </div>
    <div class="content">
        <div class="cat-home col-lg-3 col-md-3 col-sm-12 col-xs-12">
           <?php get_sidebar('categories'); ?>
        </div>
        <div class="slider col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="main-img-cont">
                <ul class="rslides">
                    <li>
                        <img src="<? echo get_option('image_1'); ?>" alt=""/>
                        <h3>The Best Online Store</h3>
                        <p>Here you can find <span class="text-my-bold">most recent arrivals</span>, observe popular items and, of course, select and purchase all the products <span class="text-my-bold">you need!</span></p>
                    </li>
                    <li style="display: none;">
                        <img src="<? echo get_option('image_2'); ?>"  alt="header"/>
                        <h3>The Best Online Store</h3>
                        <p>Here you can find <span class="text-my-bold">most recent arrivals</span>, observe popular items and, of course, select and purchase all the products <span class="text-my-bold">you need!</span></p>
                    </li>
                    <li style="display: none;">
                        <img src="<? echo get_option('image_3'); ?>"  alt="header"/>
                        <h3>The Best Online Store</h3>
                        <p>Here you can find <span class="text-my-bold">most recent arrivals</span>, observe popular items and, of course, select and purchase all the products <span class="text-my-bold">you need!</span></p>
                    </li>
                </ul>
            </div>

        </div>

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
<div class="wrap">
    <div class="container main-content">
        <div class="header">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 logo"><a href="<?php bloginfo('url') ?>"><img src="<?php echo get_option('logo_top'); ?>" alt=""></a></div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 div-search">
                <form role="search" name="searchform" method="get" action="<?php bloginfo("url"); ?>" class="search-form">
                    <input type="text" id="s" name="s" value=""  class="search" >
                    <button type="submit" name="sub_search" class="sub-search">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </form>
            </div>
        </div>
        <div class="menu col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" >
                <div class="catalog">Categories</div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" >
                <ul class="ul-menu">
                    <?php wp_nav_menu( array('menu' => 'main_menu',  'container' => '', 'menu_class' => '', 'items_wrap' => '%3$s')); ?>
                </ul>
            </div>
        </div>
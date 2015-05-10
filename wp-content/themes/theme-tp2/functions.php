<?php
	include("includes/theme-config.php");
	include("includes/option.php");
	include("includes/core.php");
	include("includes/customize.php");
	include("includes/view_product.php");
	include("includes/init_style_js.php");
	include("includes/customize_color.php");



	// remove adminbar for subscribers
	if(is_user_logged_in() && !current_user_can("level_2")) add_filter('show_admin_bar', '__return_false'); 
	
	add_theme_support('post-thumbnails', array( 'post', 'product' ) );
	 
	/*
	*	Add thumbnails support in the theme
	*/
	add_image_size( "gaws-thumbnail", 278, 278, true );
	add_image_size( "theme-digital-thumbnail", 703, 200, true );
	
	
	//remove some meta at header
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // index link
	remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
	
	//remove container from all nav menu
	add_filter( 'wp_nav_menu_args', 'remove_nav_menu_args' );  
    function remove_nav_menu_args( $args = '' ){
        $args['container'] = false;  
        return $args;  
    }

	//register top menu
	register_nav_menus( array('main_menu' => 'Top Menu') );
	unregister_nav_menu( 'top_menu' );

    function new_excerpt_length($length) {
        return 80;
    }
    add_filter('excerpt_length', 'new_excerpt_length');



      // social button
	  function share_side () {
		$h_url = home_url( );
		$content = " 
						<li class='face'><a href='#'  onclick=\"window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),  'facebook-share-dialog',  'width=626,height=436');  return false;\" ></a></li>
						<li class='twit'><a href='https://twitter.com/share'  data-count=\"none\"  target='blank'></a></li>
						<li><a href='https://plus.google.com/share?url={$h_url}'    onclick=\"javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\"></a>	</li>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
		print ($content);
		}




        // вывод описания товара на страницу, для загрзуки во frame
        function url_frame()
        {
            if (strpos($_SERVER["REQUEST_URI"], 'id_description=') !== false )
            {
                $array = explode('=',$_SERVER["REQUEST_URI"]);
                $id = $array[1];
                $products = new Product($id);
                ?>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"  type="text/javascript"></script>
                <script type="text/javascript">
                    jQuery(function() {
                        var iframe = $('#ourframe', parent.document.body);
                        iframe.height($(document.body).height()+10);
                    });
                </script>
                <?php
                echo $products->get_description();
                exit;
            }
        }
        add_action('init', 'url_frame');

        // вывод имени или ссылки категории по id
        function category_name($id, $type = 'name')
        {
            $taxonomy = 'catproducts';
            $term = get_term( $id, $taxonomy );
            if ($type=='name')
                echo $term->name;
            elseif ($type=='link')
                echo get_term_link((int)$term->term_taxonomy_id, $taxonomy);


        }

        // ВЫВОД КАРУСЕЛИ ТОВАРОВ
        function view_carusel($id, $count_item, $count_product = 3)
        {?>
            <div id="carousel-generic-latest-<?php echo $id; ?>" data-wrap="false" class="carousel slide" data-interval="false" data-ride="carousel">
                <div class="cat-zag">
                    <h2><?php category_name($id); ?></h2>
                    <div class="carousel-arrows">
                        <a class="icons icon-left-dir " href="#carousel-generic-latest-<?php echo $id; ?>" data-slide="prev"></a>
                        <a class="icons icon-right-dir" href="#carousel-generic-latest-<?php echo $id; ?>" data-slide="next"></a>
                    </div>
                </div>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <?php ViewProducts($id, $count_product ) ?>
                    </div>
                    <?php
                        for($i = 0; $i < $count_item-1; $i++):
                    ?>
                        <div class="item ">
                            <?php ViewProducts($id, $count_product ) ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        <?}

        // sidebar для баннера
        function register_sidebar_banner(){
            register_sidebar( array(
                'name' => "Center banner",
                'id' => 'center-banner',
                'description' => 'Tsentraley banner on the home page ',
                'before_title' => '<div>',
                'after_title' => '</div>'
            ) );
            register_sidebar( array(
                'name' => "Sidebar banner",
                'id' => 'side-banner',
                'description' => 'Sidebar banner on pages ',
                'before_title' => '<div>',
                'after_title' => '</div>'
            ) );
        }
        add_action( 'widgets_init', 'register_sidebar_banner' );




        // view news
        function view_news($count)
        {
            $args = array(
                'post_type'      => 'news_ebay',
                'posts_per_page' => $count,
                'orderby' => 'rand'
            );

            $result = new WP_Query( $args );
            $items = $result->posts;

            if (count($items))
                foreach ($items as $item){
                    echo MaepCore::MoreContent($item->post_title, 7) ;
                    echo MaepCore::MoreContent($item->post_content, 20) ;
                }
        }

        // Вывод рейтинга товаров
        function view_stars($value=100)
        {
            switch (round($value/20)) {
                case 1:
                    $stars = '<p class="stars">';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon-star-empty"></i>';
                    $stars .= '<i class="icon-star-empty"></i>';
                    $stars .= '<i class="icon-star-empty"></i>';
                    $stars .= '</p>';
                    break;
                case 2:
                    $stars = '<p class="stars">';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon-star-empty"></i>';
                    $stars .= '<i class="icon-star-empty"></i>';
                    $stars .= '</p>';
                    break;
                case 3:
                    $stars = '<p class="stars">';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon-star-empty"></i>';
                    $stars .= '</p>';
                    break;
                case 4:
                    $stars = '<p class="stars">';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon-star-empty"></i>';
                    $stars .= '</p>';
                    break;
                case 5:
                    $stars = '<p class="stars">';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '<i class="icon icon-star"></i>';
                    $stars .= '</p>';
                    break;
            }
            return $stars;
        }

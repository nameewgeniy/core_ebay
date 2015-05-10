<?php
	include("includes/theme-config.php");
	include("includes/option.php");
	include("includes/core.php");
	include("includes/customize.php");

	add_action('wp_enqueue_scripts', 'gbase_enqueue_script');
	function gbase_enqueue_script(){
		wp_enqueue_script('bootstrapJS', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
        wp_enqueue_script('slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ) );
		wp_enqueue_script('script', get_template_directory_uri() . '/js/JSbase.js', array( 'jquery' ) );
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
		wp_enqueue_style( 'dashicons', home_url() . '/wp-includes/css/dashicons.min.css' );
		
		
	}


	
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

    // вывод товаров по id категории
	function ViewProducts($term_id='', $count='4' )
	{
		$args = array(
	      'post_type'      => 'maep_products',
	      'posts_per_page' => $count,
	      'orderby' => 'rand'
	    );
	    if( !empty($term_id) )
	    { 
	      $args = $args + array(
	        'tax_query' => array(
	          array(
	            'taxonomy' => 'catproducts',
	            'field'    => 'id',
	            'terms'    => $term_id
	          )
	        )
	      );
	    }

	    $result = new WP_Query( $args );
		$items = $result->posts;
        $term_name = get_term($term_id, 'catproducts' );

		 	if (count($items)):
              echo ' <div class="zag-cat"><a href="' .  get_term_link((int)$term_name->term_id,'catproducts') . '">' . $term_name->name . '</a></div>';
		      foreach ($items as $item):
		      	$products = new Product($item->ID);
		      ?>
              <div class="product col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <a href="<?php echo get_permalink($item->ID); ?>" class="thumbnail">
                      <img src="<?php echo $products->get_thumbnail(); ?>" alt="...">
                      <span class="cost"><?php echo $products->get_cost().' '. $products->get_currency() ?></span>
                  </a>
                  <p class="description-product"><a href="<?php echo get_permalink($item->ID); ?>"><?php echo MaepCore::MoreContent($products->get_title(), 7) ; ?></a></p>
                  <a href="<?php echo get_permalink($item->ID); ?>" class="buy-now">MORE</a>
              </div>
		    <?php endforeach; endif;
	  }

      // social button
	  function share_side () {
		$h_url = home_url( );
		$content = " 
						<li><a href='#'  onclick=\"window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),  'facebook-share-dialog',  'width=626,height=436');  return false;\" >Facebook</a></li>
						<li><a href='https://twitter.com/share'  data-count=\"none\"  target='blank'>Twitter</a></li>
						<li><a href='https://plus.google.com/share?url={$h_url}'    onclick=\"javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\">Google +</a>	</li>	
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
		print ($content);
		}

		function gen_add_css_color()
			{
			?>
			<style type="text/css">
                .catalog, .sidebar-featured a.head {background: <?php echo get_option('main_color') ?>; }
                .main-content {border-color: <?php echo get_option('main_color') ?>; }
                .footer {border-top-color : <?php echo get_option('main_color') ?>;}
                .sidebar-featured .head,  .zag-cat {color: <?php echo get_option('main_color') ?>;}

                .ul-menu li a:hover,.ul-menu li a:focus, .ul-menu li a:active{color: <?php echo get_option('gen_color_link') ?>;}
                .buttom-descr, .product .cost, .sub-search, a span.cost {background: <?php echo get_option('gen_color_link') ?> !important;}

                .buy-now  {background: <?php echo get_option('gen_color_button'); ?>  !important;}
                .buy-now:hover, .buy-now:active, .buy-now:focus {background: <?php echo get_option('gen_color_button_hover'); ?> !important;}


			</style>
			<?php
		}
		add_action('wp_head', 'gen_add_css_color');


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


?>
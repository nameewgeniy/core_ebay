<?php get_header(); ?>
<div class="categories-item col-lg-3 col-md-3 col-sm-3 col-xs-3">
    <div class="items-cat">
        <?php get_sidebar('categories');  ?>
    </div>
    <?php get_sidebar('featured');  ?>
    
	
	
</div >
<div class="main-img col-lg-9 col-md-9 col-sm-9 col-xs-9">
    <div class="main-img-cont">
        <ul class="rslides">
            <li> <img src="<? echo get_option('image_1'); ?>" alt="header"/></li>
            <li style="display: none;"> <img src="<? echo get_option('image_2'); ?>" alt="header"/></li>
            <li style="display: none;"> <img src="<? echo get_option('image_3'); ?>" alt="header"/></li>
        </ul>

    </div>
    <div class="cat-big-item">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="<?php category_name(get_site_option('main_cat_1'),'link'); ?>"><img src="<? echo get_option('cat_image_1');?>" alt=""/><span class="buttom-descr"><?php category_name(get_option('main_cat_1')); ?></span></a></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="<?php category_name(get_site_option('main_cat_2'),'link'); ?>"><img src="<? echo get_option('cat_image_2');?>" alt=""/><span class="buttom-descr"><?php category_name(get_option('main_cat_2')); ?></span></a></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"><a href="<?php category_name(get_site_option('main_cat_3'),'link'); ?>"><img src="<? echo get_option('cat_image_3');?>" alt=""/><span class="buttom-descr"><?php category_name(get_option('main_cat_3')); ?></span></a></div>
    </div>
    <div class="one-category">

        <?php ViewProducts(get_site_option('home_cat_1'),6); ?>
<div class="bin_hom">
		             <script type="text/javascript" src='http://adn.ebay.com/files/js/min/jquery-1.6.2-min.js'></script>
            <script type="text/javascript" src='http://adn.ebay.com/files/js/min/ebay_activeContent-min.js'></script>
            <script charset="utf-8" type="text/javascript">
                document.write('\x3Cscript type="text/javascript" charset="utf-8" src="http://adn.ebay.com/cb?programId=1&campId=5337615234&toolId=10026&keyword=n&catId=58058&width=600&height=100&font=1&textColor=000000&linkColor=0000AA&arrowColor=8BBC01&color1=709AEE&color2=[COLORTWO]&format=ImageLink&contentType=TEXT_AND_IMAGE&enableSearch=y&usePopularSearches=n&freeShipping=n&topRatedSeller=n&itemsWithPayPal=n&descriptionSearch=n&showKwCatLink=n&excludeCatId=&excludeKeyword=&disWithin=200&ctx=n&autoscroll=y&flashEnabled=' + isFlashEnabled + '&pageTitle=' + _epn__pageTitle + '&cachebuster=' + (Math.floor(Math.random() * 10000000 )) + '">\x3C/script>' );
            </script>
        </div>
             
        <?php ViewProducts(get_site_option('home_cat_2'),6); ?>
	           
        <?php ViewProducts(get_site_option('home_cat_3'),6); ?>
    </div>

</div>
<?php get_footer(); ?>
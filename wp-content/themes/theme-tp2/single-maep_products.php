<?php get_header(); ?>
<?php
$products = new Product(get_the_ID());
?>
<div class="content page-single-product">
    <ol class="breadcrumb">
        <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
    </ol>
    <div class="main-img col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <h1 class='title-product'><?php echo $products->get_title(); ?></h1>
        <div class="img-product col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <a href="<?php echo $products->get_thumbnail(); ?>" class="cloud-zoom">
                <img src="<?php echo $products->get_thumbnail(); ?>"   data-large="<?php echo $products->get_thumbnail(); ?>" width='100%' alt="">
            </a>
        </div>
        <div class="prod-buy col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
            <h4 class="sing-stars"><?php echo view_stars($products->get_positive_feedback_percent_seller()) ?></h4>
            <h3 class='cost-sing'><?php echo $products->get_cost().' '; echo $products->get_currency(); ?></h3>
            <div class="p-method"><img src='<?=get_bloginfo('template_directory')?>/image/index.png' alt="Payment method" /></div>
            <a href="<?php echo $products->get_link(); ?>"><img src="<?php bloginfo('template_directory'); ?>/image/ebtn.png" /></a>
        </div>
    </div>
    <div class="categories-item col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <div class="items-cat">
            <?php get_sidebar('categories');  ?>
        </div>
        <?php //get_sidebar('featured'); ?>
        <div  class="ebay-b" >
            <?php
            //if ( function_exists('dynamic_sidebar') )
               // dynamic_sidebar('side-banner');
            ?>

        </div>
    </div>
    <div role="tabpanel" class="desc-navs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" style="padding-left: 35px">
            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">DESCRIPTION</a></li>
            <li role="presentation" ><a href="#feature" aria-controls="feature" role="tab" data-toggle="tab">FEATURE</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane " id="feature"><?php echo $products->get_lists() ?></div>
            <div role="tabpanel" class="tab-pane active"  id="description">
                <iframe class="main-description-single" id="ourframe" scrolling="no"  src="id_description=<?=get_the_ID()?>" frameborder="0">
                </iframe>
            </div>
        </div>

    </div>

    <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12 recommend">
        <?php
        $id = ghost_id(get_the_ID());
         view_carusel($id, 3); ?>
    </div>

<?php get_footer(); ?>
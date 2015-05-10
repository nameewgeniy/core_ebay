<?php get_header(); ?>
<?php
$products = new Product(get_the_ID());
?>
    <div class="sigle">
        <ol class="breadcrumb">
            <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
        </ol>
        <div class="row single container ">
            <h1 class='title-product'><?php echo $products->get_title(); ?></h1>
            <div class="img-product col-lg-5 col-md-5 col-sm-5 col-xs-5"><a href="<?php echo $products->get_link(); ?>"><img src="<?php echo $products->get_thumbnail(); ?>" width='100%' alt=""></a>
            </div>
            <div class="prod-buy col-lg-7  col-md-7  col-sm-7 col-xs-7 ">
                <h4><b>Positive feedback:</b></h4>
                <div class="progress" >
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="<?=$products->get_positive_feedback_percent_seller() ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$products->get_positive_feedback_percent_seller()?>%;"><?=$products->get_positive_feedback_percent_seller()?>%</div>
                </div>
                <?php
                // echo '<h4><b>Listing Type:</b></h4>'.$products->get_listing_type();
                /*if ($products->get_payment_methods() && is_array($products->get_payment_methods()))
                {
                    echo "<h4><b>Payment methods:</b></h4>";
                    foreach ($products->get_payment_methods() as $value) {
                        if ($value == 'PayPal')
                            echo "<img src='" . get_bloginfo('template_directory') . "/image/index.png' alt=" . $value . " />";
                        else
                            echo '<p>' . $value .'</p>';
                    }
                }*/?>
                <h4><b>Payment methods:</b></h4>
                <img src='<?=get_bloginfo('template_directory')?>/image/index.png' alt="Payment method" />;
               
                <h3 class='cost-sing'><?php echo $products->get_cost().' '; echo $products->get_currency(); ?></h3>
                <?php
                if ($products->get_listing_status() == 'Active')
                   $img = ' - <img width="15px" src="' . get_bloginfo('template_directory') . '/image/fire.png" />';
                else
                    $img ='';
                 echo '<h4 style="padding: 20px 0;"><b>Listing status:</b> '.$products->get_listing_status() . $img .'</h4>';
                  
                ?>
                <a href="<?php echo $products->get_link(); ?>"><img src="<?php bloginfo('template_directory'); ?>/image/ebtn.png" /></a>

            </div>
            <div class="description col-lg-12  col-md-12  col-sm-12 col-xs-12">
                <?php echo "<h3>Feature</h3>"; echo $products->get_lists() ?>

                <h3>Product Description</h3>
                <iframe class="main-description-single" id="ourframe" scrolling="no"  src="id_description=<?=get_the_ID()?>" frameborder="0">
                </iframe>
                <div class="seo-content" style="display: none"><?php echo wp_strip_all_tags($products->get_description()) ?></div>
            </div>
            <div class="col-lg-12  col-md-12  col-sm-12 col-xs-12 row text-center">
                <?php
                $id = ghost_id(get_the_ID());
                ViewProducts($term_id=$id, $count='3', $type='new' ); ?>
            </div>
        </div>

        <!-- /.row -->
    </div>
    <!-- /.container -->
<?php get_footer(); ?>
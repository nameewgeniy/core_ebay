<?php get_header(); ?>
   <div class="container">
        <div class="border col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
        <ol class="breadcrumb">
          <?php if(function_exists('bcn_display')) { bcn_display(); } ?>
        </ol>
        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <h2 style='text-align: center; margin: 50px 0;' >Error 404 - Page None Found</h2>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<?php get_footer(); ?>

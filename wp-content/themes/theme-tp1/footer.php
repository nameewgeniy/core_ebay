</div>
<!-- /.container -->
</div>
<div id='footer'>
    <div class="footer">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="index.html"><img src="<?php echo get_option('logo_top'); ?>" alt=""></a>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <p class="foot-header">Menu</p>
            <ul class="foot-menu">
                <?php wp_nav_menu( array('menu' => 'main_menu',  'container' => '', 'menu_class' => '', 'items_wrap' => '%3$s')); ?>
            </ul>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
            <p class="foot-header">Follow us</p>
            <ul class="social">
               <?php share_side(); ?>
                <li><a href="/rss">RSS</a></li>
            </ul>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<script src="js/bootstrap.min.js" type='text/JavaScript' ></script>
</body>
</html>
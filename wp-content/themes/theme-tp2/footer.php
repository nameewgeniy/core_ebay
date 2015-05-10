    </div> <!-- Content -->
    <div class="footer">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 box-search">
            <form class="input-group" role="search" name="searchform" method="get" action="<?php bloginfo("url"); ?>">
                <input type="text" id="s" name="s" value=""  class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">SEARCH</button>
              </span>
            </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <ul class="social">
                    <?php share_side(); ?>
                </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 payments">
                <img src="<?php bloginfo('template_directory'); ?>/image/payment-icons.png" alt=""/>
            </div>
        </div>
    </div>
</div> <!-- wrapper -->
<?php wp_footer(); ?>
<script src="js/bootstrap.min.js" type='text/JavaScript' ></script>
</body>
</html>
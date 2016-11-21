<?php global $realtor_default_options; ?>
<!-- FOOTER -->
<footer>
    <?php wp_footer(); ?>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 logo-bottom wow fadeInLeft" data-wow-delay="300ms">

                    <?php dynamic_sidebar('Footer 1'); ?>
                </div>
                <div class="col-sm-3 wow fadeInLeft" data-wow-delay="400ms">
                    <?php dynamic_sidebar('Footer 2'); ?>
                </div>
                <div class="col-sm-3 wow fadeInLeft" data-wow-delay="500ms">
                    <h6>Hot Searches</h6>

                    <div class="footer-tag"><a href="javascript:;">Listing</a><a href="javascript:;">Property</a><a
                            href="javascript:;">Trending</a><a href="javascript:;">Hot</a><a href="javascript:;">Hot</a><a
                            href="javascript:;">Listing</a><a href="javascript:;">Property</a><a href="javascript:;">Trending</a><a
                            href="javascript:;">Listing</a><a href="javascript:;">Property</a><a href="javascript:;">Trending</a><a
                            href="javascript:;">Hot</a><a href="javascript:;">Hot</a><a
                            href="javascript:;">Listing</a><a href="javascript:;">Property</a><a href="javascript:;">Trending</a>
                    </div>
                </div>
                <div class="col-sm-3 wow fadeInLeft" data-wow-delay="600ms">
                    <h6>Flickr Widget</h6>

                    <div class="flicker-image">
                        <a href="javascript:;"><img src="images/sample-image.png" width="87" height="87" alt=""/></a><a
                            href="javascript:;"><img src="images/sample-image.png" width="87" height="87" alt=""/></a><a
                            href="javascript:;"><img src="images/sample-image.png" width="87" height="87" alt=""/></a><a
                            href="javascript:;"><img src="images/sample-image.png" width="87" height="87" alt=""/></a><a
                            href="javascript:;"><img src="images/sample-image.png" width="87" height="87" alt=""/></a><a
                            href="javascript:;"><img src="images/sample-image.png" width="87" height="87" alt=""/></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"
                     id="footer-left-content"><?php echo get_theme_mod('realtor_footer_left_content', $realtor_default_options['realtor_footer_left_content']); ?></div>
                <div
                    class="col-sm-6 footer-menu"><?php echo get_theme_mod('realtor_footer_right_content', $realtor_default_options['realtor_footer_right_content']); ?></div>
            </div>
        </div>
    </div>
</footer>


</body>
</html>
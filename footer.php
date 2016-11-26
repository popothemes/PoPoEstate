<?php global $poporealestate_default_options; ?>
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
                    <?php dynamic_sidebar('Footer 3'); ?>
                </div>
                <div class="col-sm-3 wow fadeInLeft" data-wow-delay="600ms">
                    <?php dynamic_sidebar('Footer 4'); ?>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"
                     id="footer-left-content"><?php echo get_theme_mod('poporealestate_footer_left_content', $poporealestate_default_options['poporealestate_footer_left_content']); ?></div>
                <div
                    class="col-sm-6 footer-menu"><?php echo get_theme_mod('poporealestate_footer_right_content', $poporealestate_default_options['poporealestate_footer_right_content']); ?></div>
            </div>
        </div>
    </div>
</footer>


</body>
</html>
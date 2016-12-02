<?php global $poporealestate_default_options; ?>
<section class="section-agent" id="agent">
    <div class="container">
        <h2 class="wow fadeInDown" data-wow-delay="300ms" id="cta_single_col_title"><?php echo esc_html(get_theme_mod('poporealestate_home_cta_single_col_title', $poporealestate_default_options['poporealestate_home_cta_single_col_title'] )); ?></h2>
        <p class="wow fadeInDown" data-wow-delay="400ms" id="cta_single_col_description">
            <?php echo wp_kses_post(get_theme_mod('poporealestate_home_cta_single_col_description', $poporealestate_default_options['poporealestate_home_cta_single_col_description'] )); ?>
        </p>
        <div id="poporealestate_home_cta_single_col_button">
        <a href="<?php echo esc_url(get_theme_mod('poporealestate_home_cta_single_col_button_url','#')) ?>" id="cta_single_col_button" class="btn btn-default wow fadeInDown" data-wow-delay="500ms">
            <i class="fa <?php echo esc_attr(get_theme_mod('poporealestate_home_cta_single_col_button_icon', $poporealestate_default_options['poporealestate_home_cta_single_col_button_icon']))?>" aria-hidden="true"></i>
            <?php echo esc_attr(get_theme_mod('poporealestate_home_cta_single_col_button_text', $poporealestate_default_options['poporealestate_home_cta_single_col_button_text']))?>
        </a>
        </div>
    </div>
</section>
<?php global $realtor_default_options; ?>
<section class="section-agent" id="agent">
    <div class="container">
        <h2 class="wow fadeInDown" data-wow-delay="300ms" id="cta_single_col_title"><?php echo get_theme_mod('realtor_home_cta_single_col_title', $realtor_default_options['realtor_home_cta_single_col_title'] ); ?></h2>
        <p class="wow fadeInDown" data-wow-delay="400ms" id="cta_single_col_description">
            <?php echo get_theme_mod('realtor_home_cta_single_col_description', $realtor_default_options['realtor_home_cta_single_col_description'] ); ?>
        </p>
        <a href="javascript:;" id="cta_single_col_button"class="btn btn-default wow fadeInDown" data-wow-delay="500ms">
            <i class="fa <?php echo get_theme_mod('realtor_home_cta_single_col_button_icon', $realtor_default_options['realtor_home_cta_single_col_button_icon'])?>" aria-hidden="true"></i>
            <?php echo get_theme_mod('realtor_home_cta_single_col_button_text', $realtor_default_options['realtor_home_cta_single_col_button_text'])?>
        </a>
    </div>
</section>
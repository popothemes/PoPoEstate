<?php global $poporealestate_default_options; ?>
<section class="section-localities intro intro-home js-parallax" id="intelead">
    <div class="">
        <div class="localities-head">
            <h2 class="wow fadeInDown" data-wow-delay="300ms" id="home-localities-title"><?php echo esc_attr(get_theme_mod('poporealestate_home_localities_title',$poporealestate_default_options['poporealestate_home_localities_title'])); ?></h2>
            <p class="wow fadeInDown" data-wow-delay="400ms" id="home-localities-description">
                <?php echo esc_html(get_theme_mod('poporealestate_home_localities_description',$poporealestate_default_options['poporealestate_home_localities_description'])); ?>
            </p>
        </div>
        <div class="row localities-item" id="poporealestate-home-localities">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw" id="poporealestate-localities-spinner"></i>

        </div>
        <div class="loading" id="poporealestate-localities-load-more"><span><i class="fa fa-spinner" aria-hidden="true"></i> <strong><?php _e('LOAD MORE','poporealestate'); ?></strong></span></div>
    </div>

</section>
<div class="divider"></div>
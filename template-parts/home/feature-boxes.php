<?php global $realtor_default_options; ?>
<section class="section-features" id="features">
    <div class="container">
        <div class="row" id="feature_boxes_home">
            <?php for ($i = 1; $i <= 6; $i++) { ?>
                <?php if (get_theme_mod('realtor_home_feature_box_'.$i.'_title') != "" && get_theme_mod('realtor_home_feature_box_'.$i.'_description') != '') {
                    ?>
                    <div class="col-sm-4">
                        <div class=" features-box">
                            <div class="features-icon wow fadeInLeft" data-wow-delay="200ms" id="home-featured-box-<?php echo $i ?>"><i
                                    class="fa <?php echo get_theme_mod('realtor_home_feature_box_'.$i.'_icon', $realtor_default_options['realtor_home_feature_box_'.$i.'_icon']); ?> fa-2"
                                    aria-hidden="true"></i></div>
                            <div class="features-text wow fadeInLeft" data-wow-delay="300ms"
                                 id="home-featured-box-<?php echo $i; ?>-text">
                                <h3><?php echo get_theme_mod('realtor_home_feature_box_'.$i.'_title'); ?></h3>

                                <p id="home-featured-box-<?php echo $i; ?>-description"><?php echo get_theme_mod('realtor_home_feature_box_'.$i.'_description'); ?></p>

                                <a href="<?php echo get_theme_mod('realtor_home_feature_box_'.$i.'_url'); ?>"><?php echo __('READ MORE', 'realtor'); ?>
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>


        </div>
    </div>
</section>
<div class="divider"></div>
<?php global $realtor_default_options; ?>
    <div class="container">
        <div class="localities-head">
            <h2 id="home-recent-properties-heading" class="wow fadeInDown" data-wow-delay="300ms"><?php echo get_theme_mod('realtor_home_recent_properties_title', $realtor_default_options['realtor_home_recent_properties_title'] ); ?></h2>
            <p id="home-recent-properties-description" class="wow fadeInDown" data-wow-delay="400ms">
                <?php echo get_theme_mod('realtor_home_recent_properties_description', $realtor_default_options['realtor_home_recent_properties_description'] ); ?>
            </p>
        </div>
        <div class="row">
            <?php

            $regular_posts_args = array(

                'post_type'         =>  'property',
                'posts_per_page'    => get_theme_mod('realtor_home_recent_properties_number', $realtor_default_options['realtor_home_recent_properties_number'])

            );

            ?>
            <?php query_posts($regular_posts_args); ?>
            <?php get_template_part("template-parts/properties-loop-three-col"); ?>
        </div>
    </div>
<?php global $poporealestate_default_options; ?>
    <div class="container">
        <div class="localities-head">
            <h2 id="home-recent-properties-heading" class="wow fadeInDown" data-wow-delay="300ms"><?php echo esc_attr(get_theme_mod('poporealestate_home_recent_properties_title', $poporealestate_default_options['poporealestate_home_recent_properties_title'] )); ?></h2>
            <p id="home-recent-properties-description" class="wow fadeInDown" data-wow-delay="400ms">
                <?php echo esc_html(get_theme_mod('poporealestate_home_recent_properties_description', $poporealestate_default_options['poporealestate_home_recent_properties_description'] )); ?>
            </p>
        </div>
        <div class="row">
            <?php

            $regular_posts_args = array(

                'post_type'         =>  'property',
                'posts_per_page'    => intval(get_theme_mod('poporealestate_home_recent_properties_number', $poporealestate_default_options['poporealestate_home_recent_properties_number']))

            );

            $the_query = new WP_Query( $regular_posts_args );
            require(locate_template( 'template-parts/properties-loop-three-col.php'));

            ?>
        </div>
    </div>
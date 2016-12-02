<?php global $poporealestate_default_options; ?>
<section class="section-localities intro intro-home js-parallax" id="intelead-2">
    <div class="container">
        <div class="localities-head">
            <h2 class="wow fadeInDown" data-wow-delay="300ms" id="home-featured-properties-title">
                <?php echo esc_html(get_theme_mod('poporealestate_home_featured_properties_title', $poporealestate_default_options['poporealestate_home_featured_properties_title'] )); ?>
            </h2>
            <p class="wow fadeInDown" data-wow-delay="400ms" id="home-featured-properties-description">
                <?php echo esc_html(get_theme_mod('poporealestate_home_featured_properties_description', $poporealestate_default_options['poporealestate_home_featured_properties_description'] )); ?>
            </p>
        </div>
        <div id="owl-demo" class="owl-carousel owl-theme properties-carousel">
            <?php

            $regular_posts_args = array(

                'post_type' => 'property',
                'paged'         =>  get_query_var('paged'),
                'meta_query' => array(

                    array(

                        'key' => 'featured',
                        'value' => '1',
                        'compare' => '=',
                        'type' => 'NUMERIC'
                    )

                ),



            );
            $the_query = new WP_Query( $regular_posts_args );
            require(locate_template( 'template-parts/properties-loop-carousel.php'));

            ?>
        </div>
    </div>

</section>
<div class="divider"></div>
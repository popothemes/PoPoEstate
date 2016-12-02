<?php
global $poporealestate_default_options;

$featured_posts_args = array(

    'post_type' => 'property',
    'meta_query' => array(

        array(

            'key' => 'featured',
            'value' => '1',
            'compare' => '=',
            'type' => 'NUMERIC'
        )

    ),

);
$the_query = new WP_Query($featured_posts_args);
?>
    <div class="left-container featured-properties" id="featured-sidebar">
        <h3><?php echo $instance['title']; ?></h3>

        <?php if ($the_query->have_posts()) : ?>

            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

                <a href="<?php the_permalink(); ?>">
                    <div class="s-property">
                        <div class="row">
                            <div class="col-xs-5"><img
                                    src="<?php
                                    if (has_post_thumbnail()) {
                                        echo the_post_thumbnail_url('poporealestate_featured_property_thumbnail');

                                    } else {
                                        echo esc_url('http://placehold.it/137x137');

                                    }

                                    ?>"
                                    width="137" height="137" alt="" class="img-responsive"></div>

                            <div class="col-xs-7 s-property-detail">
                                <h5><?php the_title(); ?></h5>
                <span
                    class="price">
                    <?php

                    if (empty(get_post_meta(get_the_id(), 'price')[0])) {
                        _e('N/A', 'poporealestate');
                    } else {

                        echo esc_html(get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix']).get_post_meta(get_the_id(), 'price')[0]);

                    }
                    ?></span>


                                <div class="r-property-space">
                                    <div class="row">
                                        <div class="col-sm-6"><i
                                                class="sqm"></i>
                                            <?php echo esc_attr(get_post_meta(get_the_id(), 'area', true)); ?>
                                            <?php echo esc_attr(get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix'])); ?>
                                        </div>
                                        <div class="col-sm-6"><i
                                                class="bed"></i><?php _e('Beds:', 'poporealestate') ?> <?php echo esc_html(get_post_meta(get_the_id(), 'beds', true)); ?>
                                        </div>
                                        <div class="col-sm-6"><i
                                                class="bath"></i><?php _e('Baths:', 'poporealestate') ?> <?php echo esc_html(get_post_meta(get_the_id(), 'baths', true)); ?>
                                        </div>
                                        <div class="col-sm-6"><i
                                                class="garage"></i><?php _e('Parking:', 'poporealestate') ?> <?php echo esc_html(get_post_meta(get_the_id(), 'parking', true)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>


            <?php endwhile; ?>


        <?php else: ?>

            <p><?php echo __('There are no featured properties.', 'poporealestate'); ?></p>

        <?php endif;
        ?>
        <a href="<?php echo esc_url($instance['listing_link']); ?>"
           class="property-link"><?php echo __('All Properties', 'poporealestate'); ?><i class="fa fa-caret-right"
                                                                                         aria-hidden="true"></i></a>
    </div>

<?php wp_reset_postdata(); ?>
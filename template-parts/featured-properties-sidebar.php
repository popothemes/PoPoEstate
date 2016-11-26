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
query_posts($featured_posts_args);

?>
    <div class="left-container">
        <h3><?php echo $instance['title']; ?></h3>


        <?php if (have_posts()) : ?>
                <?php while (have_posts()): the_post(); ?>


                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink();?>">
                        <div class="s-property">
                            <div class="row">
                                <div class="col-xs-5"><img
                                        src="<?php echo the_post_thumbnail_url('poporealestate_featured_property_thumbnail'); ?>"
                                        width="137" height="137" alt="" class="img-responsive"></div>

                                <div class="col-xs-7 s-property-detail">
                                    <h5><?php the_title(); ?></h5>
                                    <span class="price"><?php echo get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix']) ?><?php echo get_post_meta(get_the_id(), 'price')[0]; ?></span>

                                    <div class="r-property-space">
                                        <div class="row">
                                            <div class="col-sm-6"><i
                                                    class="sqm"></i><?php echo get_post_meta(get_the_id(), 'area', true); ?> <?php echo get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix']) ?>
                                            </div>
                                            <div class="col-sm-6"><i
                                                    class="bed"></i>Beds: <?php echo get_post_meta(get_the_id(), 'beds', true); ?>
                                            </div>
                                            <div class="col-sm-6"><i
                                                    class="bath"></i>Baths: <?php echo get_post_meta(get_the_id(), 'baths', true); ?>
                                            </div>
                                            <div class="col-sm-6"><i
                                                    class="garage"></i>Garage: <?php echo get_post_meta(get_the_id(), 'parking', true); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>


                        <?php
                    } else { ?>

                        <div class="s-property">
                            <div class="row">
                                <div class="col-xs-5"><img src="http://placehold.it/369x202" width="137" height="137"
                                                           alt="" class="img-responsive"></div>
                                <div class="col-xs-7 s-property-detail">
                                    <h5><?php the_title(); ?></h5>
                                    <span
                                        class="price"><?php echo get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix']) ?><?php echo get_post_meta(get_the_id(), 'price')[0]; ?></span>

                                    <div class="r-property-space">
                                        <div class="row">
                                            <div class="col-sm-6"><i
                                                    class="sqm"></i><?php echo get_post_meta(get_the_id(), 'area', true); ?> <?php echo get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix']) ?>
                                            </div>
                                            <div class="col-sm-6"><i
                                                    class="bed"></i>Beds: <?php echo get_post_meta(get_the_id(), 'beds', true); ?>
                                            </div>
                                            <div class="col-sm-6"><i
                                                    class="bath"></i>Baths: <?php echo get_post_meta(get_the_id(), 'baths', true); ?>
                                            </div>
                                            <div class="col-sm-6"><i
                                                    class="garage"></i>Garage: <?php echo get_post_meta(get_the_id(), 'parking', true); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        ?>


                    <?php } ?>


                <?php endwhile; ?>


        <?php else: ?>

            <p><?php echo __('There are no featured properties.', 'poporealestate'); ?></p>

        <?php endif;
        ?>
        <a href="<?php echo get_theme_mod('poporealestate_listing_page', ''); ?>"
           class="property-link"><?php echo __('All Properties', 'poporealestate'); ?><i class="fa fa-caret-right"
                                                                                  aria-hidden="true"></i></a>
    </div>

<?php wp_reset_query(); ?>
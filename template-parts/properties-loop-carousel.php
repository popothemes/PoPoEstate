<?php global $poporealestate_default_options; ?>
<?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

            <?php if (has_post_thumbnail()) { ?>

            <div class="item">
                <div class="property-box">
                    <div class="property-detail">
                        <div class="row">
                            <div class="col-sm-5"><img src="<?php echo the_post_thumbnail_url('poporealestate_property_thumb'); ?>" width="222" height="142" alt=""
                                                       class="img-responsive"/></div>
                            <div class="col-sm-7">
                                <div class="property-text">
                                    <h4><?php the_title(); ?></h4>


                                    <p><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?php echo esc_html(get_post_meta(get_the_id(), 'address')[0]); ?></p>
                            </div>
                        </div></div>
                        <span class="lable-tag">
                        <?php
                            $terms = get_the_terms(get_the_id(), 'property_statuses');

                            if ($terms && !is_wp_error($terms)) {

                                $statuses = array();

                                foreach ($terms as $term) {
                                    $statuses[] = $term->name;
                                }

                                $statuses = join(", ", $statuses);

                                echo $statuses;
                            }
                            ?>
</span></div>
                    <div class="property-space">
                        <div class="row">
                            <div class="col-sm-3">
                            <i class="sqm"></i>
                            <?php echo __('Area:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'area', true)); ?> <?php echo esc_attr(get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix'])); ?>
                            </div>
                            <div class="col-sm-3">
                            <i class="bath"></i>
                            <?php echo __('Baths:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'baths', true)); ?>
                            </div>
                            <div class="col-sm-3">
                            <i class="bed"></i>
                            <?php echo __('Beds:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'beds', true)); ?>
                            </div>
                            <div class="col-sm-3">
                            <i class="garage"></i>
                            <?php echo __('Parking:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'parking', true)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="property-price"><span class=""><?php echo esc_attr(get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix'])); ?>
                            <?php echo esc_attr(get_post_meta(get_the_id(), 'price')[0]); ?></span>
                        <a href="<?php the_permalink(); ?>"><?php _e('More Details', 'poporealestate'); ?><i
                                class="fa fa-caret-right" aria-hidden="true"></i></a></div>
                </div>
            </div>

                <?php
            } else {

                ?>

                <div class="item">
                    <div class="property-box">
                        <div class="property-detail">
                            <div class="row">
                                <div class="col-sm-5"><img src="http://placehold.it/222x142" width="222" height="142" alt=""
                                                           class="img-responsive"/></div>
                                <div class="col-sm-7">
                                    <div class="property-text">
                                        <h4><?php the_title(); ?></h4>


                                        <p><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?php echo esc_html(get_post_meta(get_the_id(), 'address')[0]); ?></p>
                                    </div>
                                </div></div>
                        <span class="lable-tag">
                        <?php
                        $terms = get_the_terms(get_the_id(), 'property_statuses');

                        if ($terms && !is_wp_error($terms)) {

                            $statuses = array();

                            foreach ($terms as $term) {
                                $statuses[] = $term->name;
                            }

                            $statuses = join(", ", $statuses);

                            echo $statuses;
                        }
                        ?>
</span></div>
                        <div class="property-space">
                            <div class="row">
                                <div class="col-sm-3">
                                    <i class="sqm"></i>
                                    <?php echo __('Area:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'area', true)); ?> <?php echo esc_attr(get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix'])); ?>
                                </div>
                                <div class="col-sm-3">
                                    <i class="bath"></i>
                                    <?php echo __('Baths:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'baths', true)); ?>
                                </div>
                                <div class="col-sm-3">
                                    <i class="bed"></i>
                                    <?php echo __('Beds:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'beds', true)); ?>
                                </div>
                                <div class="col-sm-3">
                                    <i class="garage"></i>
                                    <?php echo __('Parking:', 'poporealestate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'parking', true)); ?>
                                </div>
                            </div>
                        </div>
                        <div class="property-price"><span class=""><?php echo esc_attr(get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix'])); ?>
                                <?php echo esc_attr(get_post_meta(get_the_id(), 'price')[0]); ?></span>
                            <a href="<?php the_permalink(); ?>"><?php _e('More Details', 'poporealestate'); ?><i
                                    class="fa fa-caret-right" aria-hidden="true"></i></a></div>
                    </div>
            </div>

            <?php } ?>


        <?php endwhile; ?>


<?php else: ?>

    <div class="not-found">
        <h1><?php _e("No Properties Found", "poporealestate"); ?><h2/>
            <span><?php _e("Properties you are looking for were not found", "poporealestate"); ?> </span>
    </div>

<?php endif;
wp_reset_postdata(); ?>
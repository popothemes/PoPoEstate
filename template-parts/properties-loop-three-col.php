<?php global $realtor_default_options; ?>
<?php if (have_posts()) : ?>
    <div class="row">
        <?php while (have_posts()): the_post(); ?>


            <?php if (has_post_thumbnail()) { ?>

                <div class="col-sm-4" wow fadeInDown" data-wow-delay="100ms">
                    <div class="r-property-box">
                        <div class="r-property-detail">
                            <div class="r-property-text">
                                <h4><?php the_title(); ?></h4>

                                <p><i class="glyphicon glyphicon-map-marker"
                                      aria-hidden="true"></i><?php echo get_post_meta(get_the_id(), 'address')[0]; ?>
                                </p>
                            </div>

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

                                    </span>
                        </div>
                        <div class="r-property-image"><img
                                src="<?php echo the_post_thumbnail_url('realtor_property_thumb'); ?>" alt=""
                                class="img-responsive"/><a href="javascript:;"></a></div>
                        <div class="r-property-space">
                            <div class="row">
                                <div class="col-sm-3"><i
                                        class="sqm"></i><?php echo get_post_meta(get_the_id(), 'area', true); ?> <?php echo get_theme_mod('realtor_area_postfix', $realtor_default_options['realtor_area_postfix']) ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="bath"></i>Baths: <?php echo get_post_meta(get_the_id(), 'baths', true); ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="bed"></i>Beds: <?php echo get_post_meta(get_the_id(), 'beds', true); ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="garage"></i>Parking: <?php echo get_post_meta(get_the_id(), 'parking', true); ?>
                                </div>
                            </div>
                        </div>
                        <div class="r-property-price">
                            <span
                                class=""><?php echo get_theme_mod('realtor_currency_prefix', $realtor_default_options['realtor_currency_prefix']) ?><?php echo get_post_meta(get_the_id(), 'price')[0]; ?></span>
                            <?php
                            $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

                            if (comments_open()) {
                                if ($num_comments == 0) {
                                    $comments = __('No Reviews', 'realtor');
                                } elseif ($num_comments > 1) {
                                    $comments = $num_comments . __(' Reviews', 'realtor');
                                } else {
                                    $comments = __('1 Review');
                                }
                                $write_comments = '<a href="' . get_comments_link() . '"><i class="ti-comment-alt"></i> ' . $comments . '</a>';
                            } else {
                                $write_comments = __('Reviews Disabled');
                            }
                            echo $write_comments;
                            ?>

                        </div>
                    </div>
                </div>

                <?php
            } else {

                ?>
                <div class="col-sm-6">
                    <div class="r-property-box">
                        <div class="r-property-detail">
                            <div class="r-property-text">
                                <h4><?php the_title(); ?></h4>

                                <p><i class="glyphicon glyphicon-map-marker"
                                      aria-hidden="true"></i><?php echo get_post_meta(get_the_id(), 'address')[0]; ?>
                                </p>
                            </div>

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

                                    </span>
                        </div>
                        <div class="r-property-image"><img
                                src="http://placehold.it/369x202" alt=""
                                class="img-responsive"/><a href="javascript:;"></a></div>
                        <div class="r-property-space">
                            <div class="row">
                                <div class="col-sm-3"><i
                                        class="sqm"></i><?php echo get_post_meta(get_the_id(), 'area', true); ?> <?php echo get_theme_mod('realtor_area_postfix', $realtor_default_options['realtor_area_postfix']) ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="bath"></i>Baths: <?php echo get_post_meta(get_the_id(), 'baths', true); ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="bed"></i>Beds: <?php echo get_post_meta(get_the_id(), 'beds', true); ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="garage"></i>Parking: <?php echo get_post_meta(get_the_id(), 'parking', true); ?>
                                </div>
                            </div>
                        </div>
                        <div class="r-property-price">
                            <span
                                class=""><?php echo get_theme_mod('realtor_currency_prefix', $realtor_default_options['realtor_currency_prefix']) ?><?php echo get_post_meta(get_the_id(), 'price')[0]; ?></span>
                            <?php
                            $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

                            if (comments_open()) {
                                if ($num_comments == 0) {
                                    $comments = __('No Reviews', 'realtor');
                                } elseif ($num_comments > 1) {
                                    $comments = $num_comments . __(' Reviews', 'realtor');
                                } else {
                                    $comments = __('1 Review');
                                }
                                $write_comments = '<a href="' . get_comments_link() . '"><i class="ti-comment-alt"></i> ' . $comments . '</a>';
                            } else {
                                $write_comments = __('Reviews Disabled');
                            }
                            echo $write_comments;
                            ?>

                        </div>
                    </div>
                </div>
        <?php
        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

        if (comments_open()) {
            if ($num_comments == 0) {
                $comments = __('No Comments', 'realtor');
            } elseif ($num_comments > 1) {
                $comments = $num_comments . __(' Comments', 'realtor');
            } else {
                $comments = __('1 Comment');
            }
            $write_comments = '<a href="' . get_comments_link() . '">' . $comments . '</a>';
        } else {
            $write_comments = __('Comments Disabled');
        }
        echo $write_comments;
        ?>

             </span> | <span><a href="javascript:;"><i class="more"></i>Share this post</a></span></div>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="blog-read-more">READ MORE <i
                                    class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            <?php } ?>


        <?php endwhile; ?>

    </div>

<?php else: ?>

    <div class="not-found">
        <h1><?php _e("No Properties Found", "realtor"); ?><h2/>
            <span><?php _e("Properties you are looking for were not found", "realtor"); ?> </span>
    </div>

<?php endif;
wp_reset_query(); ?>
<?php global $poporealestate_default_options; ?>
<?php if ($the_query->have_posts()) : ?>
    <div class="row">
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>


                <div class="col-sm-6" wow fadeInDown" data-wow-delay="100ms">
                    <div class="r-property-box">
                        <div class="r-property-detail">
                            <div class="r-property-text">
                                <h4><?php the_title(); ?></h4>

                                <p><i class="glyphicon glyphicon-map-marker"
                                      aria-hidden="true"></i>
                                      <?php
                                      if(!empty(get_post_meta(get_the_id(), 'address')[0]))
                                      {
                                       echo esc_html(get_post_meta(get_the_id(), 'address')[0]);
                                      }
                                      else
                                      {
                                      _e('Location Not Specified', 'popo-real-estate');
                                      }
                                       ?>
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
                                src="<?php
                                if (has_post_thumbnail())
                                {
                                echo the_post_thumbnail_url('poporealestate_property_thumb');
                                }
                                 else{
                                 echo esc_url('http://placehold.it/378x202');
                                 } ?>" alt="property-image"
                                class="img-responsive"/><a href="<?php echo the_permalink(); ?>"></a></div>
                        <div class="r-property-space">
                            <div class="row">
                                <div class="col-sm-3"><i
                                        class="sqm"></i><?php echo esc_html(get_post_meta(get_the_id(), 'area', true)); ?>
                                        <?php echo esc_attr(get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix'])); ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="bath"></i><?php _e('Baths:','popo-real-estate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'baths', true)); ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="bed"></i><?php _e('Beds:','popo-real-estate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'beds', true)); ?>
                                </div>
                                <div class="col-sm-3"><i
                                        class="garage"></i><?php _e('Parking:','popo-real-estate'); ?> <?php echo esc_attr(get_post_meta(get_the_id(), 'parking', true)); ?>
                                </div>
                            </div>
                        </div>
                        <div class="r-property-price">
                            <span
                                class="">
                                <?php if(!empty(get_post_meta(get_the_id(), 'price')[0])){ ?>
                                <?php echo esc_html(get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix'])); ?>
                                         <?php echo esc_html(get_post_meta(get_the_id(), 'price')[0]); ?>
                                         <?php }else{_e('N/A', 'popo-real-estate');} ?></span>
                            <?php
                            $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

                            if (comments_open()) {
                                if ($num_comments == 0) {
                                    $comments = __('No Reviews', 'popo-real-estate');
                                } elseif ($num_comments > 1) {
                                    $comments = $num_comments . __(' Reviews', 'popo-real-estate');
                                } else {
                                    $comments = __('1 Review', 'popo-real-estate');
                                }
                                $write_comments = '<a href="' . get_comments_link() . '"><i class="ti-comment-alt"></i> ' . $comments . '</a>';
                            } else {
                                $write_comments = __('Reviews Disabled', 'popo-real-estate');
                            }
                            echo $write_comments;
                            ?>

                        </div>
                    </div>
                </div>


        <?php endwhile; ?>

    </div>
    <?php

    poporealestate_pagination($the_query->max_num_pages);

    wp_reset_postdata();
    ?>

<?php else: ?>

    <div class="not-found">
        <h1><?php _e("No Properties Found", 'popo-real-estate'); ?><h2/>
            <span><?php _e("Properties you are looking for were not found", 'popo-real-estate'); ?> </span>
    </div>

<?php endif;
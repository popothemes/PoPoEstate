<?php if($the_query->have_posts() ) : ?>

    <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>

        <article class="blog_post_wrapper">

            <div class="col-sm-6">
                <div class="row new-box wow fadeInLeft animated" data-wow-delay="800ms" style="visibility: visible; animation-delay: 800ms; animation-name: fadeInLeft;">
                    <div class="col-sm-4">
                        <div class="news-img">
        <?php if(has_post_thumbnail())
        {
            the_post_thumbnail("poporealestate_blog_home_thumbnail", ['class' => 'img-responsive']);
        }
        else
        {
            echo '<img src="http://placehold.it/200x192" width="200" height="192" alt="place-holder" class="img-responsive"/>';
        }

        ?>
                            </div>
                        <span class="lable-tag"><?php the_time('j '); ?><?php echo substr(get_the_time('F'), 0, 3); ?></span></div>
                    <div class="col-sm-8 news-detail">
                        <h5><?php the_title(); ?></h5>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <div class="news-space">
                            <div class="row">
                                <div class="col-sm-4">
                                        <?php
                                        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

                                        if (comments_open() ) {
                                            if ($num_comments == 0 ) {
                                                $comments = __('<i class="fa fa-comment" aria-hidden="true"></i> No Comments', 'popo-real-estate');
                                            } elseif ($num_comments > 1 ) {
                                                $comments = '<i class="fa fa-comment" aria-hidden="true"></i>'.$num_comments . __(' Comments', 'popo-real-estate');
                                            } else {
                                                $comments = __('<i class="fa fa-comment" aria-hidden="true"></i> 1 Comment','popo-real-estate');
                                            }
                                            $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
                                        } else {
                                            $write_comments =  __('<i class="fa fa-comment" aria-hidden="true"></i> Comments Disabled','popo-real-estate');
                                        }
                                        echo $write_comments;
                                        ?>
                                    </div>
                                <div class="col-sm-5"><a href="<?php echo esc_url( get_category_link( get_the_category()[0]->term_id ) ) ?>"><i aria-hidden="true" class="fa fa-tag"></i><?php print_r(get_the_category()[0]->name); ?></a></div>
                                <div class="col-sm-3"><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-share"></i><?php _e('More', 'popo-real-estate') ?><span class="screen-reader-text">of <?php the_title(); ?></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php endwhile;?>




<?php else: ?>
    <div class="not-found">
        <h2><?php _e("Blog is empty", 'popo-real-estate'); ?></h2>
        <span><?php _e("No posts were found", 'popo-real-estate'); ?> </span>
    </div>



<?php endif; wp_reset_postdata(); ?>
<?php global $poporealestate_default_options; ?>
<section class="section-features" id="features">
    <div class="container">
        <div class="row" id="feature_boxes_home">

            <?php

            $regular_posts_args = array(

                'post_type'       =>  'feature-box',
                'posts_per_page'    => '-1'

            );

            $the_query = new WP_Query( $regular_posts_args );
            ?>


            <?php if($the_query->have_posts() ) : ?>

                <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>

                    <div class="col-sm-4">
                        <div class=" features-box">
                            <div class="features-icon wow fadeInLeft" data-wow-delay="200ms" id="home-featured-box-<?php echo get_the_ID(); ?>"><i
                                    class="fa <?php echo esc_attr(get_post_meta(get_the_ID(), 'icon')[0]); ?> fa-2"
                                    aria-hidden="true"></i></div>
                            <div class="features-text wow fadeInLeft" data-wow-delay="300ms"
                                 id="home-featured-box-<?php get_the_ID(); ?>-text">
                                <h3><?php the_title(); ?></h3>

                                <p id="home-featured-box-<?php get_the_ID(); ?>-description"><?php the_content(); ?></p>

                                <a href="<?php if(!empty(get_post_meta(get_the_ID(), 'url')[0])){echo esc_url(get_post_meta(get_the_ID(), 'url')[0]);} ?>"> Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>



                <?php endwhile;?>


            <?php endif; wp_reset_postdata(); ?>



        </div>
    </div>
</section>
<div class="divider"></div>
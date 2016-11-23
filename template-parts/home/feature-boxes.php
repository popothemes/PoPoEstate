<?php global $realtor_default_options; ?>
<section class="section-features" id="features">
    <div class="container">
        <div class="row" id="feature_boxes_home">

            <?php

            $regular_posts_args = array(

                'post_type'       =>  'feature-box',
                'posts_per_page'    => '-1'

            );

            query_posts($regular_posts_args);
            ?>


            <?php if(have_posts() ) : ?>

                <?php while( have_posts() ): the_post(); ?>

                    <div class="col-sm-4">
                        <div class=" features-box">
                            <div class="features-icon wow fadeInLeft" data-wow-delay="200ms" id="home-featured-box-<?php echo get_the_ID(); ?>"><i
                                    class="fa <?php echo get_post_meta(get_the_ID(), 'icon')[0] ?> fa-2"
                                    aria-hidden="true"></i></div>
                            <div class="features-text wow fadeInLeft" data-wow-delay="300ms"
                                 id="home-featured-box-<?php get_the_ID(); ?>-text">
                                <h3><?php the_title(); ?></h3>

                                <p id="home-featured-box-<?php get_the_ID(); ?>-description"><?php the_content(); ?></p>

                                <a href="<?php if(!empty(get_post_meta(get_the_ID(), 'url')[0])){echo get_post_meta(get_the_ID(), 'url')[0];} ?>"> Read More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>



                <?php endwhile;?>


            <?php endif; wp_reset_query(); ?>



        </div>
    </div>
</section>
<div class="divider"></div>
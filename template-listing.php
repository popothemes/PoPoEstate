<?php
/*
* Template Name: Property Listing
*
* Property Listing Template
*
*/
get_header();

?>



    <article>
        <div class="article">
            <?php get_template_part('template-parts/page-title'); ?>
            <div class="page-result">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <h4><?php the_title(); ?></h4>
                                <p><?php the_content(); ?></p>
                            <?php endwhile; wp_reset_query();?>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
            </div>
            <section class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <?php dynamic_sidebar( 'Property Listing' );?>
                        </div>

                        <div class="col-sm-8">

                                <?php

                                $args = array(

                                    'post_type'       =>  'property',
                                    'paged'         =>  get_query_var('paged'),
                                    'posts_per_page' => 10,

                                );
                                $the_query = new WP_Query( $args );

                                require(locate_template( 'template-parts/properties-loop.php'));

                                ?>




                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <h4 class="hidden">Popo Real Estate</h4>
    </article>
<?php get_footer(); ?>
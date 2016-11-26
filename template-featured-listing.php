<?php
/*
* Template Name: Featured Properties Listing
*
* Featured Properties Listing Template
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
                        <div class="col-sm-6 sort-item">

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
                            <div class="row">

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
                                query_posts($regular_posts_args);
                                get_template_part("template-parts/properties-loop");

                                ?>




                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <h4 class="hidden">poporealestate</h4>
    </article>
<?php get_footer(); ?>
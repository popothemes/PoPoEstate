<?php get_header(); ?>

<article>
    <div class="article">
        <?php get_template_part('template-parts/page-title'); ?>
        <div class="page-result">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="blog-section">
                            <?php
                            if(get_option('sticky_posts')) {
                                $regular_posts_args = array(

                                    'post_type'       =>  'post',
                                    'post_status'       =>  'publish',
                                    'paged'         =>  get_query_var('paged'),
                                    'ignore_sticky_posts' =>  1,
                                    'post__in'        => get_option('sticky_posts')

                                );

                                query_posts($regular_posts_args);
                                get_template_part("template-parts/posts-loop-index");
                            }
                            ?>

                            <?php

                            $regular_posts_args = array(

                                'post_type'       =>  'post',
                                'post_status'       =>  'publish',
                                'paged'         =>  get_query_var('paged'),
                                'ignore_sticky_posts' =>  1,
                                'post__not_in'        => get_option('sticky_posts')

                            );

                            ?>
                            <?php query_posts($regular_posts_args); ?>
                            <?php get_template_part("template-parts/posts-loop-index"); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php dynamic_sidebar( 'Sidebar' );?>
                    </div>


                </div>
            </div>
        </section>

    </div>
    <h4 class="hidden">poporealestate</h4>
</article>
<?php get_footer(); ?>


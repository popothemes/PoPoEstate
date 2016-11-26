<?php

get_header();

global $wp_query;
$curauth = $wp_query->get_queried_object();
?>



    <article>
        <div class="article">
            <?php get_template_part('template-parts/page-title'); ?>
            <div class="page-result">
                <div class="container">

                </div>
            </div>
            <section class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <?php dynamic_sidebar( 'Sidebar' );?>
                        </div>

                        <div class="col-sm-8">
                            <div class="row">
                                <?php get_template_part("template-parts/agent-details-author-page"); ?>

                                <?php

                                $regular_posts_args = array(

                                    'post_type'       =>  'property',
                                    'paged'         =>  get_query_var('paged'),
                                    'author__in'    =>  $curauth->ID,

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
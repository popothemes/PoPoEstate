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
                                <?php get_template_part("template-parts/agent-details"); ?>

                                <?php

                                $args = array(

                                    'post_type'       =>  'property',
                                    'paged'         =>  get_query_var('paged'),
                                    'author__in'    =>  $curauth->ID,

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
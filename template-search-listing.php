<?php
 /*
 * Template Name: Property Search
 *
 * Property Search Template
 *
 */
get_header();

$search_arguments=poporealestate_get_search_query_arguments();
$obj_name = new WP_Query($search_arguments);
$results_found=$obj_name->found_posts;

?>


      
<article>
  <div class="article">
    <?php get_template_part('template-parts/page-title'); ?>
    <div class="page-result">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>
            <h4><?php printf( esc_html__( '%d Results Found', 'popo-real-estate' ), $results_found ); ?></h4>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; wp_reset_query();?> 

          </p>
          <span class="line"></span>
        </div>
      </div>
      </div>
    </div>
    <section class="section-inner">
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <?php get_template_part("template-parts/property-search-sidebar"); ?>
          </div>

          <div class="col-sm-8">
            <div class="row">

                <?php
                $the_query = new WP_Query( $search_arguments );

                //load_template(get_template_directory().'/template-parts/properties-loop.php', 'true');

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
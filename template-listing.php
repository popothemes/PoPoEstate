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
          <p>

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; wp_reset_query();?> 

          </p>
          <span class="line"></span>
        </div>
        <div class="col-sm-6 sort-item">
          <a href="javascript:;" class="sort">Sort By: Default Order <i class="fa fa-angle-down"></i></a>
        </div>
      </div>
      </div>
    </div>
    <section class="section-inner">
      <div class="container">
        <div class="row">
            <?php get_template_part("template-parts/property-sidebar"); ?>
          <div class="col-sm-8">


                <?php

                $regular_posts_args = array(

                'post_type'       =>  'property',
                'paged'         =>  get_query_var('paged'),

                );

                ?>
                <?php query_posts($regular_posts_args); ?>
                <?php get_template_part("template-parts/properties-loop"); ?>
          </div>
        </div>
      </div>     
    </section>
    
  </div>
  <h4 class="hidden">Realtor</h4>
</article>    
<?php get_footer(); ?>
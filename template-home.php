<?php
/*
* Template Name: Home Page
*
* Home Page Template
*
*/
get_header();
?>

<?php get_template_part('template-parts/home/search-box'); ?>
<div class="article">

    <?php get_template_part('template-parts/home/feature-boxes'); ?>
    <?php get_template_part('template-parts/home/localities'); ?>
    <?php get_template_part('template-parts/home/trending-properties'); ?>
    <section class="section-recent-property" id="recent-property">
        <?php get_template_part('template-parts/home/recent-properties'); ?>
    </section>
    <?php get_template_part('template-parts/home/call-to-action-plain'); ?>
    <?php get_template_part('template-parts/home/agents'); ?>
    <?php get_template_part('template-parts/home/call-to-action-with-image'); ?>
    <?php get_template_part('template-parts/home/testimonials'); ?>
    <?php get_template_part('template-parts/home/call-to-action-compact'); ?>
    <?php get_template_part('template-parts/home/recent-posts'); ?>


  </div>
  <h4 class="hidden">Realtor</h4>
</article>



<?php get_footer(); ?>
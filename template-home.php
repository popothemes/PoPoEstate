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
    <?php
     if(get_theme_mod('poporealestate_home_feature_boxes_switch', '1'))
     {
          get_template_part('template-parts/home/feature-boxes');
     }
  else
  { ?>
  <div class="divider-dashless"></div>
  <?php
  }
     if(get_theme_mod('poporealestate_home_localities_switch', '1') && !empty(get_posts(array('post_type' => 'locality'))))
     {
          get_template_part('template-parts/home/localities');
     }
     if(get_theme_mod('poporealestate_home_trending_properties_switch', '1'))
     {
          get_template_part('template-parts/home/trending-properties');
     }
     if(get_theme_mod('poporealestate_home_recent_properties_switch', '1'))
     {
          ?>
          <section class="section-recent-property" id="recent-property">
            <?php get_template_part('template-parts/home/recent-properties'); ?>
          </section>
          <?php
     }
     if(get_theme_mod('poporealestate_home_call_to_action_plain_switch', '1'))
     {
          get_template_part('template-parts/home/call-to-action-plain');
     }
     if(get_theme_mod('poporealestate_home_agents_switch', '1'))
     {
          get_template_part('template-parts/home/agents');
     }
     if(get_theme_mod('poporealestate_call_to_action_with_image_switch', '1'))
     {
          get_template_part('template-parts/home/call-to-action-with-image');
     }
     if(get_theme_mod('poporealestate_home_testimonials_switch', '1') && !empty(get_posts(array('post_type' => 'testimonial'))))
     {
     ?>
     <section class="section-testimonials" id="home-testimonials">
        <?php get_template_part('template-parts/home/testimonials'); ?>
    </section>
     <?php
     }
     if(get_theme_mod('poporealestate_call_to_action_compact_switch', '1'))
     {
          get_template_part('template-parts/home/call-to-action-compact');
     }

     if(get_theme_mod('poporealestate_home_posts_switch', '1'))
     {
     ?>
        <section class="section-recent-news" id="recent-news">
            <?php get_template_part('template-parts/home/recent-posts'); ?>
        </section>
     <?php
     }
    ?>



  </div>
  <h4 class="hidden">Popo Real Estate</h4>
</article>



<?php get_footer(); ?>
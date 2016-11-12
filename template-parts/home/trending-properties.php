<?php global $realtor_default_options; ?>
<section class="section-localities intro intro-home js-parallax" id="intelead-2">
    <div class="container">
        <div class="localities-head">
            <h2 class="wow fadeInDown" data-wow-delay="300ms" id="home-featured-properties-title"><?php echo get_theme_mod('realtor_home_featured_properties_title', $realtor_default_options['realtor_home_featured_properties_title'] ); ?></h2>

            <p class="wow fadeInDown" data-wow-delay="400ms" id="home-featured-properties-description">
                <?php echo get_theme_mod('realtor_home_featured_properties_description', $realtor_default_options['realtor_home_featured_properties_description'] ); ?>
            </p>
        </div>
        <div id="owl-demo" class="owl-carousel owl-theme">
            <?php

            $regular_posts_args = array(

                'post_type'         =>  'property',


            );

            ?>
            <?php query_posts($regular_posts_args); ?>
            <?php get_template_part("template-parts/properties-loop-carousel"); ?>
        </div>
    </div>
    <!--<ul id="scene" class="scene">
              <li class="layer" data-depth=".3"><div></div></li>
          </ul>-->
</section>
<div class="divider"></div>
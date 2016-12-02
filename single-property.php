  <?php
  get_header();

    ?>

  <article>
    <?php while ( have_posts() ) : the_post(); ?>
    <div class="article">
        <?php get_template_part('template-parts/page-title'); ?>
      <div class="page-result">
      <div class="container">
        <div class="row">
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
              <div class="p-image"><img src="<?php echo the_post_thumbnail_url('poporealestate_property_single');?>" alt="" class="img-responsive" /></div>
              <div class="p-box p-detail p-paddingless">
                <div class="single-status"><?php the_terms(get_the_id(), 'property_statuses', '', ', ', ''); ?></div><div class="single-type"><?php the_terms(get_the_id(), 'property_types', '', ', ', ''); ?></div>
                <div class="single-brief"><?php echo get_post_meta(get_the_id(), 'area', true); ?> <?php echo esc_attr(get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix'])); ?> | <?php echo get_post_meta(get_the_id(), 'beds', true); ?> <?php _e('Beds', 'poporealestate'); ?> | <?php echo get_post_meta(get_the_id(), 'baths', true); ?> <?php _e('Baths', 'poporealestate'); ?> | <?php echo get_post_meta(get_the_id(), 'parking', true); ?> <?php _e('Parking', 'poporealestate'); ?> </div><div class="price"><?php echo esc_attr(get_theme_mod('poporealestate_price_prefix', $poporealestate_default_options['poporealestate_currency_prefix'])); ?><?php echo get_post_meta(get_the_id(), 'price', true); ?> </div>
              </div>
              <?php
              if(trim(get_the_content()) != '')
               {
               ?>
               <div class="p-box p-detail">
                <h4><?php echo __('Property Description', 'poporealestate'); ?></h4>
                <p><?php the_content(); ?></p>

              </div>

               <?php
               }
              ?>

              <?php
              if(!empty(get_post_meta(get_the_id(), 'features', true)[0][0]))
              {
              ?>
              <div class="p-box p-features">
                <?php
                      $all_features=array();
                      $features_col_1=array();
                      $features_col_2=array();
                      $features_col_3=array();

                foreach (get_post_meta(get_the_id(), 'features', true) as $key => $value) {
                    foreach ($value as $sub_key => $sub_value) {
                        array_push($all_features, $sub_value);
                    }
                }
                      $size=sizeof($all_features);

                if($size > 2) {
                    $differenciator = 0;

                    if(($size-1) % 2 == 1) {
                        $differenciator = 1;

                    }
                    $one_third_of_the_size = ($size-$differenciator) / 3;

                    for($i=0;$i<$one_third_of_the_size;$i++)
                    {
                        array_push($features_col_1, $all_features[$i]);
                    }

                    $two_third_of_the_size =$one_third_of_the_size*2;

                    for($j=$one_third_of_the_size;$j<$two_third_of_the_size;$j++)
                    {
                        array_push($features_col_2, $all_features[$j]);
                    }
                    for($j=$two_third_of_the_size;$j<($size-$differenciator);$j++)
                    {
                        array_push($features_col_3, $all_features[$j]);
                    }
                    if($differenciator > 0) {
                        array_push($features_col_1, $all_features[$size-1]);
                    }
                }
                      else if ($size == 2) {
                        array_push($features_col_1, $all_features[0]);
                        array_push($features_col_2, $all_features[1]);
}
                        else if ($size == 1) {
                            array_push($features_col_1, $all_features[0]);
                        }
                        ?>
                <h4><?php echo __('Property Features', 'poporealestate'); ?></h4>
                <div class="row">
                  <div class="col-sm-4">
                    <ul>
                        <?php
                        foreach ($features_col_1 as $sub_key => $sub_value) {
                            echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>'.$sub_value.'</li>';
                        }
                        ?>
                    </ul>
                </div>
                  <div class="col-sm-4">
                    <ul>
                        <?php
                        foreach ($features_col_2 as $sub_key => $sub_value) {
                            echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>'.$sub_value.'</li>';
                        }
                        ?>
                    </ul>
                </div>
                  <div class="col-sm-4">
                    <ul>
                        <?php
                        foreach ($features_col_3 as $sub_key => $sub_value) {
                            echo '<li><i class="fa fa-caret-right" aria-hidden="true"></i>'.$sub_value.'</li>';
                        }
                        ?>
                    </ul>
                </div>
                </div>

              </div>

              <?php

              }
                ?>

                <?php get_template_part('template-parts/property/floorplan'); ?>

                <?php
                if(!empty(get_post_meta(get_the_id(), 'address')[0]))
                {
                ?>
                <div class="p-box">
                <h4><?php echo __('Location', 'poporealestate'); ?></h4>
                <p><?php echo get_post_meta(get_the_id(), 'address')[0]; ?></p>
                <div id="single-property-map"></div>

              </div>

                <?php

                }

                ?>

                <?php get_template_part("template-parts/agent-details"); ?>
              
                    <?php if (comments_open()) {
                        comments_template('/property-reviews.php');
                    } ?>
                    
              
            </div>
          </div>
        </div>     
      </section>
      
    </div>
    <h4 class="hidden">poporealestate</h4>
  </article>
    <?php endwhile; ?>
    <?php get_footer(); ?>
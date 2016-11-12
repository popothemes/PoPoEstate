<section class="section-testimonials" id="testimonials">
    <div class="container">
        <div class="testimonial-image"><span class="image-66-quote"><img src="<?php echo get_template_directory_uri(); ?>/images/66.png" width="47" height="31"
                                                                         alt=""/></span>

            <div class="testimonial-box">
                <div id="owl-testimonial" class="owl-carousel owl-theme">
                    <?php
                    $testimonials=get_posts(array('post_type' => 'testimonial')); //print_r($testimonials);
                    foreach($testimonials as $testimonial)
                    {
                    ?>



                    <div class="item">
                        <div class="testimonial-item">
                            <p><?php echo $testimonial->post_content; ?></p>
                            <h6 class="team-image"><?php echo get_post_meta($testimonial->ID,'name')[0] ?></h6> <span><?php echo get_post_meta($testimonial->ID,'tagline')[0] ?></span></div>
                    </div>
                    <?php
                    }
                    if(empty($testimonials))
                    {
                        echo "No testimonials found";

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
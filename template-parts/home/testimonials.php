 <div class="container">
        <div class="testimonial-image">

            <div class="testimonial-box">
                <div id="owl-testimonial" class="owl-carousel owl-theme">
                    <?php
                    $testimonials=get_posts(array('post_type' => 'testimonial'));
                    foreach($testimonials as $testimonial)
                    {
                    ?>



                    <div class="item">
                        <div class="testimonial-item">
                            <p><?php echo $testimonial->post_content; ?></p>
                            <h6 class="team-image"><?php echo esc_html(get_post_meta($testimonial->ID,'name')[0]); ?></h6>
                            <span><?php echo esc_html(get_post_meta($testimonial->ID,'tagline')[0]); ?></span></div>
                    </div>
                    <?php
                    }
                    if(empty($testimonials))
                    {
                        __("There are not testimonials to display",'popo-real-estate');

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
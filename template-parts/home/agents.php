<?php global $poporealestate_default_options ?>
<section class="section-meet-the-experts" id="meet-the-experts">
    <div class="container">
        <div class="localities-head">
            <h2 class="wow fadeInDown" data-wow-delay="300ms" id="home_agents_title"><?php echo esc_html(get_theme_mod('poporealestate_home_agents_title', $poporealestate_default_options['poporealestate_home_agents_title'] )); ?></h2>
            <p class="wow fadeInDown" data-wow-delay="400ms" id="home_agents_description">
                <?php echo esc_html(get_theme_mod('poporealestate_home_agents_description', $poporealestate_default_options['poporealestate_home_agents_description'] )); ?>
            </p>
        </div>
        <div class="arrow wow fadeInDown" data-wow-delay="500ms"><a href="javascript:;" class="la"><i class="ti-angle-left"></i></a><a href="javascript:;" class="ra"><i class="ti-angle-right"></i></a></div>
        <div id="owl-team" class="owl-carousel owl-theme">
            <?php $agents=get_users();?>
            <?php foreach($agents as $agent ) { ?>
            <div class="item">
                <div class="team-box">
                    <a href="<?php echo get_author_posts_url( $agent->ID ); ?>"><div class="team-image"><?php echo get_avatar($agent->ID, '269', null, "", array('height' => '269', 'width' => '237', 'class' => 'img-responsive')); ?><span class="pluss"><i class="ti-plus"></i></span></div>
                    <h5><?php echo $agent->display_name; ?> - <span><?php the_author_meta('profile-tagline', $agent->ID); ?></span></h5>
                    </a>
                        <ul class="social-media">

                            <?php
                            if (!empty(get_the_author_meta('facebook-url', $agent->ID)))
                            {
                                ?>
                                <li><a href="<?php esc_url(get_the_author_meta('facebook-url', $agent->ID)); ?>" class="fb"><i class="fa fa-facebook"></i></a></li>

                            <?php


                            }
                            ?>
                            <?php
                            if (!empty(get_the_author_meta('twitter-url', $agent->ID)))
                            {
                                ?>
                                <li><a href="<?php esc_url(get_the_author_meta('twitter-url', $agent->ID)); ?>" class="tt"><i class="fa fa-twitter"></i></a></li>

                                <?php


                            }
                            ?>
                            <?php
                            if (!empty(get_the_author_meta('pinterest-url', $agent->ID)))
                            {
                                ?>
                                <li><a href="<?php esc_url(get_the_author_meta('pinterest-url', $agent->ID)); ?>" class="pin"><i class="fa fa-pinterest-p"></i></a></li>

                                <?php


                            }
                            ?>
                            <?php
                            if (!empty(get_the_author_meta('googleplus-url', $agent->ID)))
                            {
                                ?>
                                <li><a href="<?php esc_url(get_the_author_meta('googleplus-url', $agent->ID)); ?>" class="gp"><i class="fa fa-google-plustes"></i></a></li>

                                <?php


                            }
                            ?>
                            <?php
                            if (!empty(get_the_author_meta('tumblr-url', $agent->ID)))
                            {
                                ?>
                                <li><a href="<?php esc_url(get_the_author_meta('tumblr-url', $agent->ID)); ?>" class="tm"><i class="fa fa-tumblr"></i></a></li>

                                <?php


                            }
                            ?>
                            <?php
                            if (!empty(get_the_author_meta('instagram-url', $agent->ID)))
                            {
                                ?>
                                <li><a href="<?php esc_url(get_the_author_meta('instagram-url', $agent->ID)); ?>" class="fb"><i class="fa fa-instagram"></i></a></li>

                                <?php


                            }
                            ?>
                    </ul>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<div class="divider"></div>
<?php global $realtor_default_options ?>
<section class="section-meet-the-experts" id="meet-the-experts">
    <div class="container">
        <div class="localities-head">
            <h2 class="wow fadeInDown" data-wow-delay="300ms" id="home_agents_title"><?php echo get_theme_mod('realtor_home_agents_title', $realtor_default_options['realtor_home_agents_title'] ); ?></h2>
            <p class="wow fadeInDown" data-wow-delay="400ms" id="home_agents_description">
                <?php echo get_theme_mod('realtor_home_agents_description', $realtor_default_options['realtor_home_agents_description'] ); ?>
            </p>
        </div>
        <div class="arrow wow fadeInDown" data-wow-delay="500ms"><a href="javascript:;" class="la"><i class="ti-angle-left"></i></a><a href="javascript:;" class="ra"><i class="ti-angle-right"></i></a></div>
        <div id="owl-team" class="owl-carousel owl-theme">
            <?php $agents=get_users();?>
            <?php foreach($agents as $agent ) { ?>
            <div class="item">
                <div class="team-box">
                    <div class="team-image"><?php echo get_avatar($agent->ID, '269', null, "", array('height' => '269', 'width' => '237', 'class' => 'img-responsive')); ?><span class="pluss"><i class="ti-plus"></i></span></div>
                    <h5><?php echo $agent->display_name; ?> - <span><?php the_author_meta('profile-tagline', $agent->ID); ?></span></h5>
                    <ul class="social-media">

                        <li><a href="<?php the_author_meta('facebook-url', $agent->ID); ?>" class="fb"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php the_author_meta('twitter-url', $agent->ID); ?>" class="tt"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="<?php the_author_meta('pinterest-url', $agent->ID); ?>" class="pin"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="<?php the_author_meta('googleplus-url', $agent->ID); ?>" class="gp"><i class="ei ei-social_googleplus"></i></a></li>
                        <li><a href="<?php the_author_meta('tumblr-url', $agent->ID); ?>" class="tm"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="<?php the_author_meta('instagram-url', $agent->ID); ?>" class="fb"><i class="fa fa-instagram"></i></a></li>
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
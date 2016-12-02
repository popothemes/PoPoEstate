<?php global $poporealestate_default_options; ?>
    <div class="container">
        <div class="localities-head">
            <h2 class="wow fadeInDown" data-wow-delay="300ms" id="home_posts_title"><?php echo esc_attr(get_theme_mod('poporealestate_home_posts_title', $poporealestate_default_options['poporealestate_home_posts_title'] )); ?></h2>
            <p class="wow fadeInDown" data-wow-delay="400ms" id="home_posts_description">
                <?php echo esc_html(get_theme_mod('poporealestate_home_posts_description', $poporealestate_default_options['poporealestate_home_posts_description'] )); ?>
            </p>
        </div>
        <div class="row">
            <?php

            $regular_posts_args = array(

                'post_type'         =>  'post',
                'posts_per_page'    => intval(get_theme_mod('poporealestate_home_posts_number', $poporealestate_default_options['poporealestate_home_posts_number']))

            );

            ?>
            <?php

            $the_query = new WP_Query( $regular_posts_args );
            require(locate_template( 'template-parts/posts-loop-home.php'));

            ?>
        </div>
    </div>
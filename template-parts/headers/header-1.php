<?php global $poporealestate_default_options; ?>
<div class="top-header">
    <div class="head-one">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 one-link" id="wpml-selector">
                    <?php
                    if (class_exists('SitePress')) { ?>

                        <?php do_action('wpml_add_language_selector'); ?>

                    <?php
                    }
                    ?>

                    <span id="top-header-left-content">
                        <?php

                        for($i=1;$i<=3;$i++)
                        {
                            if(trim(get_theme_mod('poporealestate_top_header_link_'.$i.'_title',"")) == ""){continue;}
                            echo '<a href="'.esc_url(get_theme_mod('poporealestate_top_header_link_'.$i.'_url', '#')).'"><i class="fa '.esc_attr(get_theme_mod('poporealestate_top_header_link_'.$i.'_icon', $poporealestate_default_options['poporealestate_top_header_link_'.$i.'_icon'])).'" aria-hidden="true"></i> '.esc_html(get_theme_mod('poporealestate_top_header_link_'.$i.'_title', '')).'</a>';

                        }

                        ?>
                </div>
                <div class="col-sm-6">
                    <?php echo poporealestate_get_social_icons(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 logo">
                    <?php get_template_part('template-parts/logo'); ?>
                </div>
                <div class="col-sm-9 text-right">
          <span class="address-button">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
              <div class="poporealestate_header_address"><?php echo wp_kses_post(get_theme_mod('poporealestate_header_address', $poporealestate_default_options['poporealestate_header_address'])); ?></div>
          </span>
          <span class="call-button" id="header-number">
            <i class="fa fa-phone" aria-hidden="true"></i>
              <div class="poporealestate_header_contact"><?php echo wp_kses_post(get_theme_mod('poporealestate_header_contact', $poporealestate_default_options['poporealestate_header_contact'])); ?></div>

          </span>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-outer">
        <div class="navbar_menu navbar-fixed-top">
            <div class="container">
                <div class="navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle nav-right-button" data-toggle="collapse" data-target=".my_nav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>

                    <?php

                    $menu_args =array(

                        'menu'  => 'main-menu',
                        'menu_class'      => 'nav navbar-nav',
                        'menu_id'      => 'popo-menu',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'container' => 'nav',
                        'container_class'  =>  'navbar-collapse collapse my_nav navbar-ex1-collapse navbar-left',
                        'container_id'  =>  'my_nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker()

                    );

                    wp_nav_menu($menu_args);
                    ?>
                    <div class="search-sec navbar-right">
                        <input type="text" class="form-control" id="header-1-search-keyword" name="s" placeholder="<?php _e('Type','popo-real-estate') ?>" />
                        <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
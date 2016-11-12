<?php global $realtor_default_options; ?>
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

                    <span id="top-header-left-content"><?php echo get_theme_mod('realtor_header_top_left_content', $realtor_default_options['realtor_header_top_left_content']); ?></span>
                </div>
                <div class="col-sm-6">
                    <?php echo realtor_get_social_icons(); ?>
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
              <?php echo get_theme_mod('realtor_header_address', $realtor_default_options['realtor_header_address']); ?>
          </span>
          <span class="call-button" id="header-number">
            <i class="fa fa-phone" aria-hidden="true"></i>
              <?php echo get_theme_mod('realtor_header_contact', $realtor_default_options['realtor_header_contact']); ?>
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
                        <input type="text" class="form-control" placeholder="Type" />
                        <button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

global $realtor_default_options;

if ( class_exists( 'Kirki' ) ) {

//Styles Panels and sections
    Kirki::add_panel('realtor_styles_panel', array(
        'title' => __('Styles', 'realtor'),
        'description' => __('Realtor Home Options', 'realtor'),
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_default_styles_section', array(
        'title' => __('Defaults', 'realtor'),
        'description' => __('Default Styles Options', 'realtor'),
        'panel' => 'realtor_styles_panel',
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
//Google Maps
    Kirki::add_section('realtor_google_maps_section', array(
        'title' => __('Google Maps', 'realtor'),
        'description' => __('Google Maps Options', 'realtor'),
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_field('realtor_google_maps_api_key_control', array(
        'type' => 'text',
        'settings' => 'realtor_google_maps_api_key',
        'label' => __('Google Maps API Key', 'realtor'),
        'section' => 'realtor_google_maps_section',
    ));
//reCAPTCHA
    Kirki::add_section('realtor_recaptcha_section', array(
        'title' => __('reCAPTCHA', 'realtor'),
        'description' => __('reCAPTCHA Options', 'realtor'),
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_field('realtor_recaptcha_api_key_control', array(
        'type' => 'text',
        'settings' => 'realtor_recaptcha_api_key',
        'label' => __('reCAPTCHA Secret Key', 'realtor'),
        'section' => 'realtor_recaptcha_section',
    ));

    Kirki::add_field('realtor_styles_primary_color_control', array(
        'type' => 'color',
        'settings' => 'realtor_styles_primary_color',
        'label' => __('Set the default primary color', 'realtor'),
        'section' => 'realtor_default_styles_section',
        'default' => '#208873',
        'priority' => 1,
        'alpha' => true,
        'partial_refresh' => array(
            'realtor_styles_primary_color_partial' => array(
                'selector' => '#realtor-dynamic-embedded-css',
                'render_callback' => function () {

                    return realtor_css();

                },
            ))

    ));

    Kirki::add_section('header', array(
        'title' => __('Header', 'realtor'),
        'description' => __('Realtor Header Options', 'realtor'),
        'panel' => '',
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_social_media', array(
        'title' => __('Social Icons', 'realtor'),
        'description' => __('Social Media Icons', 'realtor'),
        'panel' => '',
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_properties', array(
        'title' => __('Properties', 'realtor'),
        'description' => __('Property Options', 'realtor'),
        'panel' => '',
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_footer_section', array(
        'title' => __('Footer', 'realtor'),
        'description' => __('Footer Options', 'realtor'),
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));

//Footer Options
    Kirki::add_field('realtor_footer_left_content_control', array(
        'type' => 'text',
        'settings' => 'realtor_footer_left_content',
        'label' => __('Footer content on left', 'realtor'),
        'section' => 'realtor_footer_section',
        'default' => $realtor_default_options['realtor_footer_left_content'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_footer_left_content_partial' => array(
                'selector' => '#footer-left-content',
                'render_callback' => function () {
                    return get_theme_mod('realtor_footer_left_content');
                },
            ))

    ));
    Kirki::add_field('realtor_footer_right_content_control', array(
        'type' => 'textare',
        'settings' => 'realtor_footer_right_content',
        'label' => __('Footer content on right', 'realtor'),
        'section' => 'realtor_footer_section',
        'default' => $realtor_default_options['realtor_footer_right_content'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_footer_left_content_partial' => array(
                'selector' => '.footer-menu',
                'render_callback' => function () {
                    return get_theme_mod('realtor_footer_right_content');
                },
            ))

    ));

//Home Panel
    Kirki::add_panel('realtor_home_panel', array(
        'title' => __('Home', 'realtor'),
        'description' => __('Realtor Home Options', 'realtor'),
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_banner_section', array(
        'title' => __('Banner', 'realtor'),
        'description' => __('Home Banner Options', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_feature_boxes_section', array(
        'title' => __('Feature Boxes', 'realtor'),
        'description' => __('Home Feature Boxes Options', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_localities_section', array(
        'title' => __('Localities', 'realtor'),
        'description' => __('Localities options', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_featured_properties_section', array(
        'title' => __('Featured Properties', 'realtor'),
        'description' => __('Home Featured Properties', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_recent_properties_section', array(
        'title' => __('Recent Properties', 'realtor'),
        'description' => __('Home Recent Properties', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_call_to_action_single_column_section', array(
        'title' => __('Call To Action: Single col', 'realtor'),
        'description' => __('Call To Action Section', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_call_to_action_two_col_with_image_section', array(
        'title' => __('Call To Action: Two col with image', 'realtor'),
        'description' => __('Call To Action: Two col with image options', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_agents_section', array(
        'title' => __('Agents', 'realtor'),
        'description' => __('Agent Section Options', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_testimonials_section', array(
        'title' => __('Testimonials', 'realtor'),
        'description' => __('Testimonials Options', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_call_to_action_compact_section', array(
        'title' => __('Call To Action: Compact', 'realtor'),
        'description' => __('Call To Action Compact Section', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('realtor_home_posts_section', array(
        'title' => __('Recent Posts', 'realtor'),
        'description' => __('Recent Posts Section Options', 'realtor'),
        'panel' => 'realtor_home_panel',
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));


//Home Banner Options

    Kirki::add_field('realtor_home_banner_title_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_banner_title',
        'label' => __('Title text for home banner', 'realtor'),
        'section' => 'realtor_home_banner_section',
        'default' => $realtor_default_options['realtor_home_banner_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_banner_title_partial' => array(
                'selector' => '.caption-box h1',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_banner_title');
                },
            ))

    ));

    Kirki::add_field('realtor_home_banner_background_image_control', array(
        'type' => 'image',
        'settings' => 'realtor_home_banner_background_image',
        'label' => __('Image for homepage banner.', 'realtor'),
        'section' => 'realtor_home_banner_section',
        'default' => $realtor_default_options['realtor_home_banner_background_image'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_home_banner_background_image_partial' => array(
                'selector' => '#home-banner-image',
                'render_callback' => function () {
                    return '<img src="' . get_theme_mod('realtor_home_banner_background_image') . '"/>';
                },
            ))

    ));

//Testimonials
    Kirki::add_field('realtor_home_testimonials_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_testimonials_switch',
        'label' => __('Enable/Disable Testimonials', 'realtor'),
        'section' => 'realtor_home_testimonials_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));
    Kirki::add_field('realtor_home_testimonials_image_control', array(
        'type' => 'image',
        'settings' => 'realtor_home_testimonials_image',
        'label' => __('Image for testimonials section.', 'realtor'),
        'section' => 'realtor_home_testimonials_section',
        'default' => $realtor_default_options['realtor_home_testimonial_image'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_testimonial_image_partial' => array(
                'selector' => '#realtor-dynamic-embedded-css',
                'render_callback' => function () {

                    return realtor_css();

                },
            ))

    ));

//Localities
    Kirki::add_field('realtor_home_localities_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_localities_switch',
        'label' => __('Enable/Disable Localities', 'realtor'),
        'section' => 'realtor_home_localities_section',
        'default' => '1',
        //'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),


    ));
//Feature Boxes
    Kirki::add_field('realtor_home_feature_boxes_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_feature_boxes_switch',
        'label' => __('Enable/Disable Feature Boxes', 'realtor'),
        'section' => 'realtor_home_feature_boxes_section',
        'default' => '1',
        //'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),


    ));

    for ($i = 1; $i <= 6; $i++) {

        Kirki::add_field('realtor_home_feature_box_' . $i . '_icon_control', array(
            'type' => 'select',
            'settings' => 'realtor_home_feature_box_' . $i . '_icon',
            'label' => __('Feature box %s icon', 'realtor'),$i,
            'description' => __('You can choose any of <a href="https://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Fontawesomes 593 Icons</a> as a Prefix Icon for the button', 'realtor'),
            'section' => 'realtor_home_feature_boxes_section',
            'default' => $realtor_default_options['realtor_home_feature_box_' . $i . '_icon'],
            //'priority' => $i,
            'choices' => realtor_smk_font_awesome(),
            'partial_refresh' => array(
                'realtor_home_feature_box_' . $i . '_icon_control_partial' => array(
                    'selector' => '#feature_boxes_home',
                    'render_callback' => function () {
                        for ($i = 1; $i <= 6; $i++) {
                            if (get_theme_mod('realtor_home_feature_box_' . $i . '_title') != "" && get_theme_mod('realtor_home_feature_box_' . $i . '_description') != '') {
                                ?>
                                <div class="col-sm-4">
                                    <div class=" features-box">
                                        <div class="features-icon wow fadeInLeft" data-wow-delay="200ms"
                                             id="home-featured-box-<?php echo $i ?>"><i
                                                class="fa <?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_icon', $realtor_default_options['realtor_home_feature_box_' . $i . '_icon']); ?> fa-2"
                                                aria-hidden="true"></i></div>
                                        <div class="features-text wow fadeInLeft" data-wow-delay="300ms"
                                             id="home-featured-box-<?php echo $i; ?>-text">
                                            <h3><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_title'); ?></h3>

                                            <p id="home-featured-box-<?php echo $i; ?>-description"><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_description'); ?></p>

                                            <a href="<?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_url'); ?>"><?php echo __('READ MORE', 'realtor'); ?>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }
                        }
                    },
                ))
        ));

        Kirki::add_field('realtor_home_feature_box_' . $i . '_title_control', array(
            'type' => 'text',
            'settings' => 'realtor_home_feature_box_' . $i . '_title',
            'label' => __('Feature box %s title', 'realtor'),$i,
            'section' => 'realtor_home_feature_boxes_section',
            'default' => "",
            //'priority' => $i+1,
            'partial_refresh' => array(
                'realtor_home_feature_box_' . $i . '_title_partial' => array(
                    'selector' => '#feature_boxes_home',
                    'render_callback' => function () {
                        for ($i = 1; $i <= 6; $i++) {
                            if (get_theme_mod('realtor_home_feature_box_' . $i . '_title') != "" && get_theme_mod('realtor_home_feature_box_' . $i . '_description') != '') {
                                ?>
                                <div class="col-sm-4">
                                    <div class=" features-box">
                                        <div class="features-icon wow fadeInLeft" data-wow-delay="200ms"
                                             id="home-featured-box-<?php echo $i ?>"><i
                                                class="fa <?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_icon', $realtor_default_options['realtor_home_feature_box_' . $i . '_icon']); ?> fa-2"
                                                aria-hidden="true"></i></div>
                                        <div class="features-text wow fadeInLeft" data-wow-delay="300ms"
                                             id="home-featured-box-<?php echo $i; ?>-text">
                                            <h3><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_title'); ?></h3>

                                            <p id="home-featured-box-<?php echo $i; ?>-description"><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_description'); ?></p>

                                            <a href="<?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_url'); ?>"><?php echo __('READ MORE', 'realtor'); ?>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }
                        }
                    },
                ))

        ));
        Kirki::add_field('realtor_home_feature_box_' . $i . '_description_control', array(
            'type' => 'text',
            'settings' => 'realtor_home_feature_box_' . $i . '_description',
            'label' => __('Feature box %s description', 'realtor'),$i,
            'section' => 'realtor_home_feature_boxes_section',
            'default' => "",
            //'priority' => $i+2,
            'partial_refresh' => array(
                'realtor_home_feature_box_' . $i . '_description_partial' => array(
                    'selector' => '#feature_boxes_home',
                    'render_callback' => function () {
                        for ($i = 1; $i <= 6; $i++) {
                            if (get_theme_mod('realtor_home_feature_box_' . $i . '_title') != "" && get_theme_mod('realtor_home_feature_box_' . $i . '_description') != '') {
                                ?>
                                <div class="col-sm-4">
                                    <div class=" features-box">
                                        <div class="features-icon wow fadeInLeft" data-wow-delay="200ms"
                                             id="home-featured-box-<?php echo $i ?>"><i
                                                class="fa <?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_icon', $realtor_default_options['realtor_home_feature_box_' . $i . '_icon']); ?> fa-2"
                                                aria-hidden="true"></i></div>
                                        <div class="features-text wow fadeInLeft" data-wow-delay="300ms"
                                             id="home-featured-box-<?php echo $i; ?>-text">
                                            <h3><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_title'); ?></h3>

                                            <p id="home-featured-box-<?php echo $i; ?>-description"><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_description'); ?></p>

                                            <a href="<?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_url'); ?>"><?php echo __('READ MORE', 'realtor'); ?>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }
                        }
                    },
                ))

        ));
        Kirki::add_field('realtor_home_feature_box_' . $i . '_url_control', array(
            'type' => 'text',
            'settings' => 'realtor_home_feature_box_' . $i . '_url',
            'label' => __('Feature box %s URL', 'realtor'), $i,
            'section' => 'realtor_home_feature_boxes_section',
            'default' => "#",
            //'priority' => $i+3,
            'partial_refresh' => array(
                'realtor_home_feature_box_' . $i . '_url_partial' => array(
                    'selector' => '#home-featured-box-' . $i . '-text',
                    'render_callback' => function () {
                        for ($i = 1; $i <= 6; $i++) {
                            if (get_theme_mod('realtor_home_feature_box_' . $i . '_title') != "" && get_theme_mod('realtor_home_feature_box_' . $i . '_description') != '') {
                                ?>
                                <div class="col-sm-4">
                                    <div class=" features-box">
                                        <div class="features-icon wow fadeInLeft" data-wow-delay="200ms"
                                             id="home-featured-box-<?php echo $i ?>"><i
                                                class="fa <?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_icon', $realtor_default_options['realtor_home_feature_box_' . $i . '_icon']); ?> fa-2"
                                                aria-hidden="true"></i></div>
                                        <div class="features-text wow fadeInLeft" data-wow-delay="300ms"
                                             id="home-featured-box-<?php echo $i; ?>-text">
                                            <h3><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_title'); ?></h3>

                                            <p id="home-featured-box-<?php echo $i; ?>-description"><?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_description'); ?></p>

                                            <a href="<?php echo get_theme_mod('realtor_home_feature_box_' . $i . '_url'); ?>"><?php echo __('READ MORE', 'realtor'); ?>
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }
                        }
                    },
                ))

        ));

    }

//Recent Properties Section
    Kirki::add_field('realtor_home_recent_properties_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_recent_properties_switch',
        'label' => __('Enable/Disable Recent Properties', 'realtor'),
        'section' => 'realtor_home_recent_properties_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));
    Kirki::add_field('realtor_home_recent_properties_title_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_recent_properties_title',
        'label' => __('Title for Recent Properties ', 'realtor'),
        'section' => 'realtor_home_recent_properties_section',
        'default' => $realtor_default_options['realtor_home_recent_properties_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_recent_properties_title_partial' => array(
                'selector' => '#home-recent-properties-heading',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_recent_properties_title');
                },
            ))

    ));

    Kirki::add_field('realtor_home_recent_properties_description_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_recent_properties_description',
        'label' => __('Description for recent properties section', 'realtor'),
        'section' => 'realtor_home_recent_properties_section',
        'default' => $realtor_default_options['realtor_home_recent_properties_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_home_recent_properties_description_partial' => array(
                'selector' => '#home-recent-properties-description',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_recent_properties_description');
                },
            ))

    ));
    Kirki::add_field('realtor_home_recent_properties_number_control', array(
        'type' => 'number',
        'settings' => 'realtor_home_recent_properties_number',
        'label' => __('No. of properties to show', 'realtor'),
        'section' => 'realtor_home_recent_properties_section',
        'default' => $realtor_default_options['realtor_home_recent_properties_number'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_home_recent_properties_number_partial' => array(
                'selector' => '#recent-property',
                'render_callback' => function () {
                    return get_template_part('template-parts/home/recent-properties');
                },
            ))

    ));
//Recent Posts
    Kirki::add_field('realtor_home_posts_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_posts_switch',
        'label' => __('Enable/Disable Recent Posts', 'realtor'),
        'section' => 'realtor_home_posts_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));
    Kirki::add_field('realtor_home_posts_title_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_posts_title',
        'label' => __('Title for recent posts section', 'realtor'),
        'section' => 'realtor_home_posts_section',
        'default' => $realtor_default_options['realtor_home_posts_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_posts_title_partial' => array(
                'selector' => '#home_posts_title',
                'render_callback' => function () {
                    echo get_theme_mod('realtor_home_posts_title');
                },
            ))

    ));

    Kirki::add_field('realtor_home_posts_description_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_posts_description',
        'label' => __('Description for recent posts section', 'realtor'),
        'section' => 'realtor_home_posts_section',
        'default' => $realtor_default_options['realtor_home_posts_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_home_recent_properties_description_partial' => array(
                'selector' => '#home_posts_description',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_posts_description');
                },
            ))

    ));
    Kirki::add_field('realtor_home_posts_number_control', array(
        'type' => 'number',
        'settings' => 'realtor_home_posts_number',
        'label' => __('No. of posts to show', 'realtor'),
        'section' => 'realtor_home_posts_section',
        'default' => $realtor_default_options['realtor_home_posts_number'],
        'priority' => 3,
        'partial_refresh' => array(
            'realtor_home_properties_number_partial' => array(
                'selector' => '.section-recent-news',
                'render_callback' => function () {
                    get_template_part('template-parts/home/recent-posts');
                },
            ))

    ));

//Featured Properties Section
    Kirki::add_field('realtor_home_trending_properties_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_trending_properties_switch',
        'label' => __('Enable/Disable Featured Properties', 'realtor'),
        'section' => 'realtor_home_featured_properties_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));


    Kirki::add_field('realtor_home_featured_properties_title_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_featured_properties_title',
        'label' => __('Title for Featured Properties section', 'realtor'),
        'section' => 'realtor_home_featured_properties_section',
        'default' => $realtor_default_options['realtor_home_featured_properties_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_featured_properties_title_partial' => array(
                'selector' => '#home-featured-properties-title',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_featured_properties_title');
                },
            ))

    ));

    Kirki::add_field('realtor_home_featured_properties_description_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_featured_properties_description',
        'label' => __('Description for Featured Properties section', 'realtor'),
        'section' => 'realtor_home_featured_properties_section',
        'default' => $realtor_default_options['realtor_home_featured_properties_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_home_featured_properties_description_partial' => array(
                'selector' => '#home-featured-properties-description',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_featured_properties_description');
                },
            ))

    ));

//Call To Action Single Column
    Kirki::add_field('realtor_home_call_to_action_plain_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_call_to_action_plain_switch',
        'label' => __('Enable/Disable Call To Action: Single Column', 'realtor'),
        'section' => 'realtor_home_call_to_action_single_column_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));
    Kirki::add_field('realtor_home_cta_single_col_title_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_cta_single_col_title',
        'section' => 'realtor_home_call_to_action_single_column_section',
        'default' => $realtor_default_options['realtor_home_cta_single_col_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_cta_single_col_title_partial' => array(
                'selector' => '#cta_single_col_title',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_cta_single_col_title');
                },
            ))

    ));
    Kirki::add_field('realtor_home_cta_single_col_description_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_cta_single_col_description',
        'section' => 'realtor_home_call_to_action_single_column_section',
        'default' => $realtor_default_options['realtor_home_cta_single_col_description'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_cta_single_col_description_partial' => array(
                'selector' => '#cta_single_col_description',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_cta_single_col_description');
                },
            ))

    ));
    Kirki::add_field('realtor_home_cta_single_col_button_icon_control', array(
        'type' => 'select',
        'settings' => 'realtor_home_cta_single_col_button_icon',
        'label' => __('Choose Button Icon', 'realtor'),
        'description' => __('You can choose any of <a href="https://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Fontawesomes 593 Icons</a> as a Prefix Icon for the button', 'realtor'),
        'section' => 'realtor_home_call_to_action_single_column_section',
        'default' => $realtor_default_options['realtor_home_cta_single_col_button_icon'],
        'priority' => 2,
        'choices' => realtor_smk_font_awesome(),
        'partial_refresh' => array(
            'realtor_home_cta_single_col_button_icon_partial' => array(
                'selector' => '#cta_single_col_button',
                'render_callback' => function () {

                    return '<i class="fa ' . get_theme_mod('realtor_home_cta_single_col_button_icon') . '" aria-hidden="true"></i>' . get_theme_mod('realtor_home_cta_single_col_button_text');
                },
            ))
    ));
    Kirki::add_field('realtor_home_cta_single_col_button_text_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_cta_single_col_button_text',
        'section' => 'realtor_home_call_to_action_single_column_section',
        'default' => $realtor_default_options['realtor_home_cta_single_col_button_text'],
        'priority' => 3,
        'partial_refresh' => array(
            'realtor_home_cta_single_col_button_text_partial' => array(
                'selector' => '#cta_single_col_button',
                'render_callback' => function () {
                    return '<i class="fa ' . get_theme_mod('realtor_home_cta_single_col_button_icon') . '" aria-hidden="true"></i>' . get_theme_mod('realtor_home_cta_single_col_button_text');
                },
            ))

    ));
//Agents
    Kirki::add_field('realtor_home_agents_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_agents_switch',
        'label' => __('Enable/Disable Agents', 'realtor'),
        'section' => 'realtor_home_agents_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));
    Kirki::add_field('realtor_home_agents_title_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_agents_title',
        'section' => 'realtor_home_agents_section',
        'default' => $realtor_default_options['realtor_home_agents_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_agents_title_partial' => array(
                'selector' => '#home_agents_title',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_agents_title');
                },
            ))

    ));
    Kirki::add_field('realtor_home_agents_description_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_agents_description',
        'section' => 'realtor_home_agents_section',
        'default' => $realtor_default_options['realtor_home_agents_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_home_agents_description_partial' => array(
                'selector' => '#home_agents_description',
                'render_callback' => function () {
                    return get_theme_mod('realtor_home_agents_description');
                },
            ))

    ));

//Call To Action Two Col with image
    Kirki::add_field('realtor_call_to_action_with_image_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_call_to_action_with_image_switch',
        'label' => __('Enable/Disable Call To Action: Two Col with Image', 'realtor'),
        'section' => 'realtor_home_call_to_action_two_col_with_image_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));
    Kirki::add_field('realtor_home_call_to_action_two_col_with_image_left_col_content_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_call_to_action_two_col_with_image_left_col_content',
        'label' => __('Left column content', 'realtor'),
        'section' => 'realtor_home_call_to_action_two_col_with_image_section',
        'default' => $realtor_default_options['realtor_home_call_to_action_two_col_with_image_left_col_content'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_call_to_action_two_col_with_image_left_col_content_partial' => array(
                'selector' => '.section-app',
                'render_callback' => function () {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo get_theme_mod('realtor_home_call_to_action_two_col_with_image_left_col_content'); ?>
                            </div>
                            <div class="col-sm-6 phone-img wow fadeInLeft" data-wow-delay="900ms"><img
                                    src="<?php echo get_theme_mod('realtor_home_call_to_action_two_col_with_image_right_col_image'); ?>"
                                    width="371" height="402" alt=""/></div>
                        </div>
                    </div>

                    <?php
                },
            ))

    ));
    Kirki::add_field('realtor_home_call_to_action_two_col_with_image_right_col_image_control', array(
        'type' => 'image',
        'settings' => 'realtor_home_call_to_action_two_col_with_image_right_col_image',
        'label' => __('Right column image', 'realtor'),
        'section' => 'realtor_home_call_to_action_two_col_with_image_section',
        'default' => $realtor_default_options['realtor_home_call_to_action_two_col_with_image_right_col_image'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_call_to_action_two_col_with_image_right_col_image_partial' => array(
                'selector' => '.section-app',
                'render_callback' => function () {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo get_theme_mod('realtor_home_call_to_action_two_col_with_image_left_col_content'); ?>
                            </div>
                            <div class="col-sm-6 phone-img wow fadeInLeft" data-wow-delay="900ms"><img
                                    src="<?php echo get_theme_mod('realtor_home_call_to_action_two_col_with_image_right_col_image'); ?>"
                                    width="371" height="402" alt=""/></div>
                        </div>
                    </div>

                    <?php
                },
            ))

    ));
//Call To Action compact
    Kirki::add_field('realtor_home_call_to_action_compact_switch_control', array(
        'type' => 'switch',
        'settings' => 'realtor_home_call_to_action_compact_switch',
        'label' => __('Enable/Disable Call To Action: Compact', 'realtor'),
        'section' => 'realtor_home_call_to_action_compact_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'realtor'),
            'off' => esc_attr__('Off', 'realtor')
        ),
    ));
    Kirki::add_field('realtor_home_call_to_action_compact_content_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_home_call_to_action_compact_content',
        'label' => __('Content', 'realtor'),
        'section' => 'realtor_home_call_to_action_compact_section',
        'default' => $realtor_default_options['realtor_home_call_to_action_compact_content'],
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_home_call_to_action_compact_content_partial' => array(
                'selector' => '.call-to-action-compact-content',
                'render_callback' => function () {
                    echo get_theme_mod('realtor_home_call_to_action_compact_content', $realtor_default_options['realtor_home_call_to_action_compact_content']);
                },
            ))

    ));
    Kirki::add_field('realtor_home_call_to_action_compact_button_text_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_call_to_action_compact_button_text',
        'label' => __('Button Text', 'realtor'),
        'section' => 'realtor_home_call_to_action_compact_section',
        'default' => $realtor_default_options['realtor_home_call_to_action_compact_button_text'],
        'priority' => 2,
        'partial_refresh' => array(
            'realtor_home_call_to_action_compact_button_text_partial' => array(
                'selector' => '.call-to-action-compact-button',
                'render_callback' => function () { ?>
                    <a href="<?php echo get_theme_mod('realtor_home_call_to_action_compact_button_url', '#') ?>"
                       class="btn btn-danger"><?php echo get_theme_mod('realtor_home_call_to_action_compact_button_text', $realtor_default_options['realtor_home_call_to_action_compact_button_text']); ?></a>
                    <?php

                },
            ))

    ));
    Kirki::add_field('realtor_home_call_to_action_compact_button_url_control', array(
        'type' => 'text',
        'settings' => 'realtor_home_call_to_action_compact_button_url',
        'label' => __('Button url', 'realtor'),
        'section' => 'realtor_home_call_to_action_compact_section',
        'default' => '#',
        'priority' => 3,
        'partial_refresh' => array(
            'realtor_home_call_to_action_compact_button_url_partial' => array(
                'selector' => '.call-to-action-compact-button',
                'render_callback' => function () { ?>
                    <a href="<?php echo get_theme_mod('realtor_home_call_to_action_compact_button_url', '#') ?>"
                       class="btn btn-danger"><?php echo get_theme_mod('realtor_home_call_to_action_compact_button_text', $realtor_default_options['realtor_home_call_to_action_compact_button_text']); ?></a>
                    <?php

                },
            ))

    ));

//Header Options
    Kirki::add_field('realtor_logo_control', array(
        'type' => 'image',
        'settings' => 'realtor_logo',
        'label' => __('Logo', 'realtor'),
        'section' => 'header',
        'priority' => 1
    ));
    Kirki::add_field('realtor_logo_width_control', array(
        'type' => 'number',
        'settings' => 'realtor_logo_width',
        'label' => esc_attr__('Logo width in px', 'realtor'),
        'section' => 'header',
        'default' => $realtor_default_options['logo_width'],
        'priority' => 2,
        'choices' => array(
            'min' => 0,
            'max' => 800,
            'step' => 1,
        ),
    ));
//Top header links
    global $jCounter;

    $jCounter = 1;

    for ($i = 1; $i <= 3; $i++) {

        Kirki::add_field('realtor_top_header_link_' . $i . '_icon_control', array(
            'type' => 'select',
            'settings' => 'realtor_top_header_link_' . $i . '_icon',
            'label' => __('Top header link %s icon', 'realtor'),$i,
            'description' => __('You can choose any of <a href="https://fortawesome.github.io/Font-Awesome/cheatsheet/" target="_blank">Fontawesomes 593 Icons</a> as a Prefix Icon for the button', 'realtor'),
            'section' => 'header',
            'default' => $realtor_default_options['realtor_top_header_link_' . $i . '_icon'],
            //'priority' => $i,
            'choices' => realtor_smk_font_awesome(),
            'partial_refresh' => array(
                'realtor_top_header_link_' . $i . '_icon_partial' => array(
                    'selector' => '#top-header-left-content',
                    'render_callback' => function () {
                        $return_value = "";
                        for ($loop = 1; $loop <= 3; $loop++) {
                            if (trim(get_theme_mod('realtor_top_header_link_' . $loop . '_title')) == "") {
                                continue;
                            }
                            $return_value = $return_value . '<a href="' . get_theme_mod('realtor_top_header_link_' . $loop . '_url') . '"><i class="fa ' . get_theme_mod('realtor_top_header_link_' . $loop . '_icon') . '" aria-hidden="true"></i> ' . get_theme_mod('realtor_top_header_link_' . $loop . '_title') . '</a>';
                        }
                        return $return_value;
                    },
                ))
        ));

        Kirki::add_field('realtor_top_header_link_' . $i . '_title_control', array(
            'type' => 'text',
            'settings' => 'realtor_top_header_link_' . $i . '_title',
            'label' => __('Top header link %s title', 'realtor'),$i,
            'section' => 'header',
            'default' => "",
            //'priority' => $i+1,
            'partial_refresh' => array(
                'realtor_top_header_link_' . $i . '_title_partial' => array(
                    'selector' => '#top-header-left-content',
                    'render_callback' => function () {
                        $return_value = "";
                        for ($loop = 1; $loop <= 3; $loop++) {
                            if (trim(get_theme_mod('realtor_top_header_link_' . $loop . '_title')) == "") {
                                continue;
                            }
                            $return_value = $return_value . '<a href="' . get_theme_mod('realtor_top_header_link_' . $loop . '_url') . '"><i class="fa ' . get_theme_mod('realtor_top_header_link_' . $loop . '_icon') . '" aria-hidden="true"></i> ' . get_theme_mod('realtor_top_header_link_' . $loop . '_title') . '</a>';
                        }
                        return $return_value;

                    },
                ))

        ));
        Kirki::add_field('realtor_top_header_link_' . $i . '_url_control', array(
            'type' => 'text',
            'settings' => 'realtor_top_header_link_' . $i . '_url',
            'label' => __('Top header %s link URL', 'realtor'),$i,
            'section' => 'header',
            'default' => "#",
            //'priority' => $i+3,
            'partial_refresh' => array(
                'realtor_top_header_link_' . $i . '_url_partial' => array(
                    'selector' => '#top-header-left-content',
                    'render_callback' => function () {
                        $return_value = "";
                        for ($loop = 1; $loop <= 3; $loop++) {
                            if (trim(get_theme_mod('realtor_top_header_link_' . $loop . '_title')) == "") {
                                continue;
                            }
                            $return_value = $return_value . '<a href="' . get_theme_mod('realtor_top_header_link_' . $loop . '_url') . '"><i class="fa ' . get_theme_mod('realtor_top_header_link_' . $loop . '_icon') . '" aria-hidden="true"></i> ' . get_theme_mod('realtor_top_header_link_' . $loop . '_title') . '</a>';
                        }
                        return $return_value;
                    },
                ))

        ));

        $jCounter++;
    }


//--
    Kirki::add_field('realtor_header_address_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_header_address',
        'label' => __('Address Box', 'realtor'),
        'section' => 'header',
        'default' => esc_attr__($realtor_default_options['realtor_header_address'], 'realtor'),
        'priority' => 4,
        'partial_refresh' => array(
            'realtor_header_address_partial' => array(
                'selector' => '.realtor_header_address',
                'render_callback' => function () {
                    global $realtor_default_options;
                    return get_theme_mod('realtor_header_address', $realtor_default_options['realtor_header_address']);
                },
            ))

    ));

    Kirki::add_field('realtor_header_contact_control', array(
        'type' => 'textarea',
        'settings' => 'realtor_header_contact',
        'label' => __('Contact Box', 'realtor'),
        'section' => 'header',
        'default' => $realtor_default_options['realtor_header_contact'],
        'priority' => 5,
        'partial_refresh' => array(
            'realtor_header_contact_partial' => array(
                'selector' => '.realtor_header_contact',
                'render_callback' => function () {
                    global $realtor_default_options;

                    return get_theme_mod('realtor_header_contact', $realtor_default_options['realtor_header_contact']);
                },
            ))

    ));

    Kirki::add_field('realtor_social_icon_facebook_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_facebook',
        'label' => __('Facebook URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_facebook_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));

    Kirki::add_field('realtor_social_icon_twitter_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_twitter',
        'label' => __('Twitter URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_twitter_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('realtor_social_icon_pinterest_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_pinterest',
        'label' => __('Pinterest URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_pinterest_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('realtor_social_icon_googleplus_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_googleplus',
        'label' => __('Google+ URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_googleplus_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('realtor_social_icon_tumblr_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_tumblr',
        'label' => __('Tumblr URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_tumblr_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('realtor_social_icon_stumbleupon_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_stumbleupon',
        'label' => __('Stumble Upon URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_stumbleupon_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('realtor_social_icon_wordpress_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_wordpress',
        'label' => __('WordPress Feed URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_wordpress_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('realtor_social_icon_instagram_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_instagram',
        'label' => __('Instagram URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_instagram_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('realtor_social_icon_dribbble_control', array(
        'type' => 'text',
        'settings' => 'realtor_social_icon_dribbble',
        'label' => __('Dribbble URL', 'realtor'),
        'section' => 'realtor_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'realtor_social_icon_dribbble_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return realtor_get_social_icons();
                },
            ))

    ));

    Kirki::add_field('realtor_listing_page_control', array(
        'type' => 'select',
        'settings' => 'realtor_listing_page',
        'label' => __('Listing Page', 'realtor'),
        'section' => 'realtor_properties',
        'priority' => 1,
        'choices' => realtor_get_page_list()

    ));
    Kirki::add_field('realtor_search_page_control', array(
        'type' => 'select',
        'settings' => 'realtor_search_page',
        'label' => __('Search Page', 'realtor'),
        'section' => 'realtor_properties',
        'priority' => 2,
        'choices' => realtor_get_page_list()

    ));
    Kirki::add_field('realtor_currency_prefix_control', array(
        'type' => 'text',
        'settings' => 'realtor_currency_prefix',
        'label' => __('Currency Prefix', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_currency_prefix'],
        'priority' => 3,

    ));
    Kirki::add_field('realtor_area_postfix_control', array(
        'type' => 'text',
        'settings' => 'realtor_area_postfix',
        'label' => __('Area Postfix', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_area_postfix'],
        'priority' => 4,

    ));
    Kirki::add_field('realtor_min_beds_control', array(
        'type' => 'text',
        'settings' => 'realtor_min_beds',
        'label' => __('Min Beds Values', 'realtor'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_min_beds'],
        'priority' => 5,

    ));
    Kirki::add_field('realtor_min_baths_control', array(
        'type' => 'text',
        'settings' => 'realtor_min_baths',
        'label' => __('Min Baths Values', 'realtor'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_min_baths'],
        'priority' => 6,

    ));
    Kirki::add_field('realtor_min_parking_control', array(
        'type' => 'text',
        'settings' => 'realtor_min_parking',
        'label' => __('Min Parking Values', 'realtor'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_min_parking'],
        'priority' => 7,

    ));
    Kirki::add_field('realtor_min_area_control', array(
        'type' => 'text',
        'settings' => 'realtor_min_area',
        'label' => __('Min Area Values', 'realtor'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_min_area'],
        'priority' => 8,

    ));
    Kirki::add_field('realtor_max_area_control', array(
        'type' => 'text',
        'settings' => 'realtor_max_beds',
        'label' => __('Max Area Values', 'realtor'),
        'description' => __('Add comma separated values like: 100,200,300,400', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_max_area'],
        'priority' => 9,

    ));
    Kirki::add_field('realtor_price_from_control', array(
        'type' => 'text',
        'settings' => 'realtor_price_from',
        'label' => __('Price From Values', 'realtor'),
        'description' => __('Add comma separated values like: 100,200,300,400', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_price_from'],
        'priority' => 10,

    ));
    Kirki::add_field('realtor_price_to_control', array(
        'type' => 'text',
        'settings' => 'realtor_price_to',
        'label' => __('Price To Values', 'realtor'),
        'description' => __('Add comma separated values like: 100,200,300,400', 'realtor'),
        'section' => 'realtor_properties',
        'default' => $realtor_default_options['realtor_price_to'],
        'priority' => 11,

    ));
}


?>
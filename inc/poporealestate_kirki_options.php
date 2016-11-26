<?php

global $poporealestate_default_options;

if ( class_exists( 'Kirki' ) ) {

//Styles Panels and sections
    Kirki::add_panel('poporealestate_styles_panel', array(
        'title' => __('Styles', 'poporealestate'),
        'description' => __('poporealestate Home Options', 'poporealestate'),
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_default_styles_section', array(
        'title' => __('Defaults', 'poporealestate'),
        'description' => __('Default Styles Options', 'poporealestate'),
        'panel' => 'poporealestate_styles_panel',
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
//Google Maps
    Kirki::add_section('poporealestate_google_maps_section', array(
        'title' => __('Google Maps', 'poporealestate'),
        'description' => __('Google Maps Options', 'poporealestate'),
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_field('poporealestate_google_maps_api_key_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_google_maps_api_key',
        'label' => __('Google Maps API Key', 'poporealestate'),
        'section' => 'poporealestate_google_maps_section',
    ));


    //Styles Options

    Kirki::add_field('poporealestate_styles_primary_color_control', array(
        'type' => 'color',
        'settings' => 'poporealestate_styles_primary_color',
        'label' => __('Set the default primary color', 'poporealestate'),
        'section' => 'poporealestate_default_styles_section',
        'default' => '#208873',
        'priority' => 1,
        'alpha' => true,
        'partial_refresh' => array(
            'poporealestate_styles_primary_color_partial' => array(
                'selector' => '#poporealestate-dynamic-embedded-css',
                'render_callback' => function () {

                    return poporealestate_css();

                },
            ))

    ));
    Kirki::add_field('poporealestate_styles_secondary_color_control', array(
        'type' => 'color',
        'settings' => 'poporealestate_styles_secondary_color',
        'label' => __('Set the default secondary color', 'poporealestate'),
        'section' => 'poporealestate_default_styles_section',
        'default' => '#1a1c28',
        'priority' => 2,
        'alpha' => true,
        'partial_refresh' => array(
            'poporealestate_styles_primary_color_partial' => array(
                'selector' => '#poporealestate-dynamic-embedded-css',
                'render_callback' => function () {

                    return poporealestate_css();

                },
            ))

    ));

    Kirki::add_section('header', array(
        'title' => __('Header', 'poporealestate'),
        'description' => __('poporealestate Header Options', 'poporealestate'),
        'panel' => '',
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_social_media', array(
        'title' => __('Social Icons', 'poporealestate'),
        'description' => __('Social Media Icons', 'poporealestate'),
        'panel' => '',
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_properties', array(
        'title' => __('Properties', 'poporealestate'),
        'description' => __('Property Options', 'poporealestate'),
        'panel' => '',
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_footer_section', array(
        'title' => __('Footer', 'poporealestate'),
        'description' => __('Footer Options', 'poporealestate'),
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_agents_section', array(
        'title' => __('Agents', 'poporealestate'),
        'description' => __('Agent Options', 'poporealestate'),
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_custom_css_section', array(
        'title' => __('Custom CSS', 'poporealestate'),
        'description' => __('Add custom CSS here', 'poporealestate'),
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));

    //Custom CSS Field
    Kirki::add_field( 'poporealestate_custom_css_control', array(
        'type'        => 'code',
        'settings'    => 'poporealestate_custom_css',
        'label'       => __( 'Custom CSS', 'poporealestate' ),
        'section'     => 'poporealestate_custom_css_section',
        'default'     => '',
        'priority'    => 1,
        'choices'     => array(
            'language' => 'css',
            'theme'    => 'monokai',
            'height'   => 250,
        ),
        'partial_refresh' => array(
            'poporealestate_custom_css_partial' => array(
                'selector' => '#poporealestate-dynamic-embedded-css',
                'render_callback' => function () {

                    return poporealestate_css();

                },
            ))
    ) );



//Agent Form
    Kirki::add_field('poporealestate_agent_form_shortcode_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_agent_form_shortcode',
        'label' => __('Contact Form 7 Shortcode for agent', 'poporealestate'),
        'section' => 'poporealestate_agents_section',
        'default' => "",
        'priority' => 1,

    ));

//Footer Options
    Kirki::add_field('poporealestate_footer_left_content_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_footer_left_content',
        'label' => __('Footer content on left', 'poporealestate'),
        'section' => 'poporealestate_footer_section',
        'default' => $poporealestate_default_options['poporealestate_footer_left_content'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_footer_left_content_partial' => array(
                'selector' => '#footer-left-content',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_footer_left_content');
                },
            ))

    ));
    Kirki::add_field('poporealestate_footer_right_content_control', array(
        'type' => 'textare',
        'settings' => 'poporealestate_footer_right_content',
        'label' => __('Footer content on right', 'poporealestate'),
        'section' => 'poporealestate_footer_section',
        'default' => $poporealestate_default_options['poporealestate_footer_right_content'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_footer_left_content_partial' => array(
                'selector' => '.footer-menu',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_footer_right_content');
                },
            ))

    ));

//Home Panel
    Kirki::add_panel('poporealestate_home_panel', array(
        'title' => __('Home', 'poporealestate'),
        'description' => __('poporealestate Home Options', 'poporealestate'),
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_banner_section', array(
        'title' => __('Banner', 'poporealestate'),
        'description' => __('Home Banner Options', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_feature_boxes_section', array(
        'title' => __('Feature Boxes', 'poporealestate'),
        'description' => __('Home Feature Boxes Options', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_localities_section', array(
        'title' => __('Localities', 'poporealestate'),
        'description' => __('Localities options', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_featured_properties_section', array(
        'title' => __('Featured Properties', 'poporealestate'),
        'description' => __('Home Featured Properties', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 4,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_recent_properties_section', array(
        'title' => __('Recent Properties', 'poporealestate'),
        'description' => __('Home Recent Properties', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 5,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_call_to_action_single_column_section', array(
        'title' => __('Call To Action: Single col', 'poporealestate'),
        'description' => __('Call To Action Section', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 6,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_call_to_action_two_col_with_image_section', array(
        'title' => __('Call To Action: Two col with image', 'poporealestate'),
        'description' => __('Call To Action: Two col with image options', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 8,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_agents_section', array(
        'title' => __('Agents', 'poporealestate'),
        'description' => __('Agent Section Options', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 7,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_testimonials_section', array(
        'title' => __('Testimonials', 'poporealestate'),
        'description' => __('Testimonials Options', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 9,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_call_to_action_compact_section', array(
        'title' => __('Call To Action: Compact', 'poporealestate'),
        'description' => __('Call To Action Compact Section', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));
    Kirki::add_section('poporealestate_home_posts_section', array(
        'title' => __('Recent Posts', 'poporealestate'),
        'description' => __('Recent Posts Section Options', 'poporealestate'),
        'panel' => 'poporealestate_home_panel',
        'priority' => 11,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
    ));


//Home Banner Options

    Kirki::add_field('poporealestate_home_banner_title_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_banner_title',
        'label' => __('Title text for home banner', 'poporealestate'),
        'section' => 'poporealestate_home_banner_section',
        'default' => $poporealestate_default_options['poporealestate_home_banner_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_banner_title_partial' => array(
                'selector' => '.caption-box h1',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_banner_title');
                },
            ))

    ));

    Kirki::add_field('poporealestate_home_banner_background_image_control', array(
        'type' => 'image',
        'settings' => 'poporealestate_home_banner_background_image',
        'label' => __('Image for homepage banner.', 'poporealestate'),
        'section' => 'poporealestate_home_banner_section',
        'default' => $poporealestate_default_options['poporealestate_home_banner_background_image'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_banner_background_image_partial' => array(
                'selector' => '#home-banner-image',
                'render_callback' => function () {
                    return '<img src="' . get_theme_mod('poporealestate_home_banner_background_image') . '"/>';
                },
            ))

    ));

//Testimonials
    Kirki::add_field('poporealestate_home_testimonials_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_testimonials_switch',
        'label' => __('Enable/Disable Testimonials', 'poporealestate'),
        'section' => 'poporealestate_home_testimonials_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));
    Kirki::add_field('poporealestate_home_testimonials_image_control', array(
        'type' => 'image',
        'settings' => 'poporealestate_home_testimonials_image',
        'label' => __('Image for testimonials section.', 'poporealestate'),
        'section' => 'poporealestate_home_testimonials_section',
        'default' => $poporealestate_default_options['poporealestate_home_testimonial_image'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_testimonial_image_partial' => array(
                'selector' => '#poporealestate-dynamic-embedded-css',
                'render_callback' => function () {

                    return poporealestate_css();

                },
            ))

    ));

//Localities
    Kirki::add_field('poporealestate_home_localities_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_localities_switch',
        'label' => __('Enable/Disable Localities', 'poporealestate'),
        'section' => 'poporealestate_home_localities_section',
        'default' => '1',
        //'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),


    ));
    Kirki::add_field('poporealestate_home_localities_title_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_localities_title_title',
        'label' => __('Title for Localities section', 'poporealestate'),
        'section' => 'poporealestate_home_localities_section',
        'default' => $poporealestate_default_options['poporealestate_home_localities_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_localities_title_partial' => array(
                'selector' => '#home-localities-title',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_localities_title');
                },
            ))

    ));

    Kirki::add_field('poporealestate_home_localities_description_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_localities_description',
        'label' => __('Description for Localities section', 'poporealestate'),
        'section' => 'poporealestate_home_localities_section',
        'default' => $poporealestate_default_options['poporealestate_home_localities_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_featured_properties_description_partial' => array(
                'selector' => '#home-localities-description',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_localities_description');
                },
            ))

    ));
//Feature Boxes
    Kirki::add_field('poporealestate_home_feature_boxes_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_feature_boxes_switch',
        'label' => __('Enable/Disable Feature Boxes', 'poporealestate'),
        'section' => 'poporealestate_home_feature_boxes_section',
        'default' => '1',
        //'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),


    ));

//Recent Properties Section
    Kirki::add_field('poporealestate_home_recent_properties_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_recent_properties_switch',
        'label' => __('Enable/Disable Recent Properties', 'poporealestate'),
        'section' => 'poporealestate_home_recent_properties_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));
    Kirki::add_field('poporealestate_home_recent_properties_title_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_recent_properties_title',
        'label' => __('Title for Recent Properties ', 'poporealestate'),
        'section' => 'poporealestate_home_recent_properties_section',
        'default' => $poporealestate_default_options['poporealestate_home_recent_properties_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_recent_properties_title_partial' => array(
                'selector' => '#home-recent-properties-heading',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_recent_properties_title');
                },
            ))

    ));

    Kirki::add_field('poporealestate_home_recent_properties_description_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_recent_properties_description',
        'label' => __('Description for recent properties section', 'poporealestate'),
        'section' => 'poporealestate_home_recent_properties_section',
        'default' => $poporealestate_default_options['poporealestate_home_recent_properties_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_recent_properties_description_partial' => array(
                'selector' => '#home-recent-properties-description',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_recent_properties_description');
                },
            ))

    ));
    Kirki::add_field('poporealestate_home_recent_properties_number_control', array(
        'type' => 'number',
        'settings' => 'poporealestate_home_recent_properties_number',
        'label' => __('No. of properties to show', 'poporealestate'),
        'section' => 'poporealestate_home_recent_properties_section',
        'default' => $poporealestate_default_options['poporealestate_home_recent_properties_number'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_recent_properties_number_partial' => array(
                'selector' => '#recent-property',
                'render_callback' => function () {
                    return get_template_part('template-parts/home/recent-properties');
                },
            ))

    ));
//Recent Posts
    Kirki::add_field('poporealestate_home_posts_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_posts_switch',
        'label' => __('Enable/Disable Recent Posts', 'poporealestate'),
        'section' => 'poporealestate_home_posts_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));
    Kirki::add_field('poporealestate_home_posts_title_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_posts_title',
        'label' => __('Title for recent posts section', 'poporealestate'),
        'section' => 'poporealestate_home_posts_section',
        'default' => $poporealestate_default_options['poporealestate_home_posts_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_posts_title_partial' => array(
                'selector' => '#home_posts_title',
                'render_callback' => function () {
                    echo get_theme_mod('poporealestate_home_posts_title');
                },
            ))

    ));

    Kirki::add_field('poporealestate_home_posts_description_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_posts_description',
        'label' => __('Description for recent posts section', 'poporealestate'),
        'section' => 'poporealestate_home_posts_section',
        'default' => $poporealestate_default_options['poporealestate_home_posts_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_recent_properties_description_partial' => array(
                'selector' => '#home_posts_description',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_posts_description');
                },
            ))

    ));
    Kirki::add_field('poporealestate_home_posts_number_control', array(
        'type' => 'number',
        'settings' => 'poporealestate_home_posts_number',
        'label' => __('No. of posts to show', 'poporealestate'),
        'section' => 'poporealestate_home_posts_section',
        'default' => $poporealestate_default_options['poporealestate_home_posts_number'],
        'priority' => 3,
        'partial_refresh' => array(
            'poporealestate_home_properties_number_partial' => array(
                'selector' => '.section-recent-news',
                'render_callback' => function () {
                    get_template_part('template-parts/home/recent-posts');
                },
            ))

    ));

//Featured Properties Section
    Kirki::add_field('poporealestate_home_trending_properties_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_trending_properties_switch',
        'label' => __('Enable/Disable Featured Properties', 'poporealestate'),
        'section' => 'poporealestate_home_featured_properties_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));


    Kirki::add_field('poporealestate_home_featured_properties_title_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_featured_properties_title',
        'label' => __('Title for Featured Properties section', 'poporealestate'),
        'section' => 'poporealestate_home_featured_properties_section',
        'default' => $poporealestate_default_options['poporealestate_home_featured_properties_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_featured_properties_title_partial' => array(
                'selector' => '#home-featured-properties-title',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_featured_properties_title');
                },
            ))

    ));

    Kirki::add_field('poporealestate_home_featured_properties_description_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_featured_properties_description',
        'label' => __('Description for Featured Properties section', 'poporealestate'),
        'section' => 'poporealestate_home_featured_properties_section',
        'default' => $poporealestate_default_options['poporealestate_home_featured_properties_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_featured_properties_description_partial' => array(
                'selector' => '#home-featured-properties-description',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_featured_properties_description');
                },
            ))

    ));

//Call To Action Single Column
    Kirki::add_field('poporealestate_home_call_to_action_plain_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_call_to_action_plain_switch',
        'label' => __('Enable/Disable Call To Action: Single Column', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_single_column_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));
    Kirki::add_field('poporealestate_home_cta_single_col_title_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_cta_single_col_title',
        'section' => 'poporealestate_home_call_to_action_single_column_section',
        'default' => $poporealestate_default_options['poporealestate_home_cta_single_col_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_cta_single_col_title_partial' => array(
                'selector' => '#cta_single_col_title',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_cta_single_col_title');
                },
            ))

    ));
    Kirki::add_field('poporealestate_home_cta_single_col_description_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_cta_single_col_description',
        'section' => 'poporealestate_home_call_to_action_single_column_section',
        'default' => $poporealestate_default_options['poporealestate_home_cta_single_col_description'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_cta_single_col_description_partial' => array(
                'selector' => '#cta_single_col_description',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_cta_single_col_description');
                },
            ))

    ));
    Kirki::add_field('poporealestate_home_cta_single_col_button_icon_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_cta_single_col_button_icon',
        'label' => __('Choose Button Icon', 'poporealestate'),
        'description' => __('Add any font awesome icon code here. For e.g "fa-calender". Choose from <a href="http://fontawesome.io/cheatsheet/">Font Awesome Cheatsheet</a>', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_single_column_section',
        'default' => $poporealestate_default_options['poporealestate_home_cta_single_col_button_icon'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_cta_single_col_button_icon_partial' => array(
                'selector' => '#cta_single_col_button',
                'render_callback' => function () {

                    return '<i class="fa ' . get_theme_mod('poporealestate_home_cta_single_col_button_icon') . '" aria-hidden="true"></i>' . get_theme_mod('poporealestate_home_cta_single_col_button_text');
                },
            ))
    ));
    Kirki::add_field('poporealestate_home_cta_single_col_button_text_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_cta_single_col_button_text',
        'section' => 'poporealestate_home_call_to_action_single_column_section',
        'default' => $poporealestate_default_options['poporealestate_home_cta_single_col_button_text'],
        'priority' => 3,
        'partial_refresh' => array(
            'poporealestate_home_cta_single_col_button_text_partial' => array(
                'selector' => '#cta_single_col_button',
                'render_callback' => function () {
                    return '<i class="fa ' . get_theme_mod('poporealestate_home_cta_single_col_button_icon') . '" aria-hidden="true"></i>' . get_theme_mod('poporealestate_home_cta_single_col_button_text');
                },
            ))

    ));
//Agents
    Kirki::add_field('poporealestate_home_agents_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_agents_switch',
        'label' => __('Enable/Disable Agents', 'poporealestate'),
        'section' => 'poporealestate_home_agents_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));
    Kirki::add_field('poporealestate_home_agents_title_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_agents_title',
        'section' => 'poporealestate_home_agents_section',
        'default' => $poporealestate_default_options['poporealestate_home_agents_title'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_agents_title_partial' => array(
                'selector' => '#home_agents_title',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_agents_title');
                },
            ))

    ));
    Kirki::add_field('poporealestate_home_agents_description_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_agents_description',
        'section' => 'poporealestate_home_agents_section',
        'default' => $poporealestate_default_options['poporealestate_home_agents_description'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_agents_description_partial' => array(
                'selector' => '#home_agents_description',
                'render_callback' => function () {
                    return get_theme_mod('poporealestate_home_agents_description');
                },
            ))

    ));

//Call To Action Two Col with image
    Kirki::add_field('poporealestate_call_to_action_with_image_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_call_to_action_with_image_switch',
        'label' => __('Enable/Disable Call To Action: Two Col with Image', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_two_col_with_image_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));
    Kirki::add_field('poporealestate_home_call_to_action_two_col_with_image_left_col_content_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_call_to_action_two_col_with_image_left_col_content',
        'label' => __('Left column content', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_two_col_with_image_section',
        'default' => $poporealestate_default_options['poporealestate_home_call_to_action_two_col_with_image_left_col_content'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_call_to_action_two_col_with_image_left_col_content_partial' => array(
                'selector' => '.section-app',
                'render_callback' => function () {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo get_theme_mod('poporealestate_home_call_to_action_two_col_with_image_left_col_content'); ?>
                            </div>
                            <div class="col-sm-6 phone-img wow fadeInLeft" data-wow-delay="900ms"><img
                                    src="<?php echo get_theme_mod('poporealestate_home_call_to_action_two_col_with_image_right_col_image'); ?>"
                                    width="371" height="402" alt=""/></div>
                        </div>
                    </div>

                    <?php
                },
            ))

    ));
    Kirki::add_field('poporealestate_home_call_to_action_two_col_with_image_right_col_image_control', array(
        'type' => 'image',
        'settings' => 'poporealestate_home_call_to_action_two_col_with_image_right_col_image',
        'label' => __('Right column image', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_two_col_with_image_section',
        'default' => $poporealestate_default_options['poporealestate_home_call_to_action_two_col_with_image_right_col_image'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_call_to_action_two_col_with_image_right_col_image_partial' => array(
                'selector' => '.section-app',
                'render_callback' => function () {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php echo get_theme_mod('poporealestate_home_call_to_action_two_col_with_image_left_col_content'); ?>
                            </div>
                            <div class="col-sm-6 phone-img wow fadeInLeft" data-wow-delay="900ms"><img
                                    src="<?php echo get_theme_mod('poporealestate_home_call_to_action_two_col_with_image_right_col_image'); ?>"
                                    width="371" height="402" alt=""/></div>
                        </div>
                    </div>

                    <?php
                },
            ))

    ));
//Call To Action compact
    Kirki::add_field('poporealestate_home_call_to_action_compact_switch_control', array(
        'type' => 'switch',
        'settings' => 'poporealestate_home_call_to_action_compact_switch',
        'label' => __('Enable/Disable Call To Action: Compact', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_compact_section',
        'default' => '1',
        'priority' => 1,
        'choices' => array(
            'on' => esc_attr__('On', 'poporealestate'),
            'off' => esc_attr__('Off', 'poporealestate')
        ),
    ));
    Kirki::add_field('poporealestate_home_call_to_action_compact_content_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_home_call_to_action_compact_content',
        'label' => __('Content', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_compact_section',
        'default' => $poporealestate_default_options['poporealestate_home_call_to_action_compact_content'],
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_home_call_to_action_compact_content_partial' => array(
                'selector' => '.call-to-action-compact-content',
                'render_callback' => function () {
                    echo get_theme_mod('poporealestate_home_call_to_action_compact_content', $poporealestate_default_options['poporealestate_home_call_to_action_compact_content']);
                },
            ))

    ));
    Kirki::add_field('poporealestate_home_call_to_action_compact_button_text_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_call_to_action_compact_button_text',
        'label' => __('Button Text', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_compact_section',
        'default' => $poporealestate_default_options['poporealestate_home_call_to_action_compact_button_text'],
        'priority' => 2,
        'partial_refresh' => array(
            'poporealestate_home_call_to_action_compact_button_text_partial' => array(
                'selector' => '.call-to-action-compact-button',
                'render_callback' => function () { ?>
                    <a href="<?php echo get_theme_mod('poporealestate_home_call_to_action_compact_button_url', '#') ?>"
                       class="btn btn-danger"><?php echo get_theme_mod('poporealestate_home_call_to_action_compact_button_text', $poporealestate_default_options['poporealestate_home_call_to_action_compact_button_text']); ?></a>
                    <?php

                },
            ))

    ));
    Kirki::add_field('poporealestate_home_call_to_action_compact_button_url_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_home_call_to_action_compact_button_url',
        'label' => __('Button url', 'poporealestate'),
        'section' => 'poporealestate_home_call_to_action_compact_section',
        'default' => '#',
        'priority' => 3,
        'partial_refresh' => array(
            'poporealestate_home_call_to_action_compact_button_url_partial' => array(
                'selector' => '.call-to-action-compact-button',
                'render_callback' => function () { ?>
                    <a href="<?php echo get_theme_mod('poporealestate_home_call_to_action_compact_button_url', '#') ?>"
                       class="btn btn-danger"><?php echo get_theme_mod('poporealestate_home_call_to_action_compact_button_text', $poporealestate_default_options['poporealestate_home_call_to_action_compact_button_text']); ?></a>
                    <?php

                },
            ))

    ));

//Header Options
    Kirki::add_field('poporealestate_logo_control', array(
        'type' => 'image',
        'settings' => 'poporealestate_logo',
        'label' => __('Logo', 'poporealestate'),
        'section' => 'header',
        'priority' => 1
    ));
    Kirki::add_field('poporealestate_logo_width_control', array(
        'type' => 'number',
        'settings' => 'poporealestate_logo_width',
        'label' => esc_attr__('Logo width in px', 'poporealestate'),
        'section' => 'header',
        'default' => $poporealestate_default_options['logo_width'],
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

        Kirki::add_field('poporealestate_top_header_link_' . $i . '_icon_control', array(
            'type' => 'text',
            'settings' => 'poporealestate_top_header_link_' . $i . '_icon',
            'label' => sprintf(__('Top header link %s icon', 'poporealestate'),$i),
            'description' => __('Add any font awesome icon code here. For e.g "fa-calender". Choose from <a href="http://fontawesome.io/cheatsheet/">Font Awesome Cheatsheet</a>', 'poporealestate'),
            'section' => 'header',
            'default' => $poporealestate_default_options['poporealestate_top_header_link_' . $i . '_icon'],
            'partial_refresh' => array(
                'poporealestate_top_header_link_' . $i . '_icon_partial' => array(
                    'selector' => '#top-header-left-content',
                    'render_callback' => function () {
                        $return_value = "";
                        for ($loop = 1; $loop <= 3; $loop++) {
                            if (trim(get_theme_mod('poporealestate_top_header_link_' . $loop . '_title')) == "") {
                                continue;
                            }
                            $return_value = $return_value . '<a href="' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_url') . '"><i class="fa ' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_icon') . '" aria-hidden="true"></i> ' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_title') . '</a>';
                        }
                        return $return_value;
                    },
                ))
        ));

        Kirki::add_field('poporealestate_top_header_link_' . $i . '_title_control', array(
            'type' => 'text',
            'settings' => 'poporealestate_top_header_link_' . $i . '_title',
            'label' => sprintf(__('Top header link %s title', 'poporealestate'),$i),
            'section' => 'header',
            'default' => "",
            //'priority' => $i+1,
            'partial_refresh' => array(
                'poporealestate_top_header_link_' . $i . '_title_partial' => array(
                    'selector' => '#top-header-left-content',
                    'render_callback' => function () {
                        $return_value = "";
                        for ($loop = 1; $loop <= 3; $loop++) {
                            if (trim(get_theme_mod('poporealestate_top_header_link_' . $loop . '_title')) == "") {
                                continue;
                            }
                            $return_value = $return_value . '<a href="' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_url') . '"><i class="fa ' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_icon') . '" aria-hidden="true"></i> ' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_title') . '</a>';
                        }
                        return $return_value;

                    },
                ))

        ));
        Kirki::add_field('poporealestate_top_header_link_' . $i . '_url_control', array(
            'type' => 'text',
            'settings' => 'poporealestate_top_header_link_' . $i . '_url',
            'label' => sprintf(__('Top header %s link URL', 'poporealestate'),$i),
            'section' => 'header',
            'default' => "#",
            //'priority' => $i+3,
            'partial_refresh' => array(
                'poporealestate_top_header_link_' . $i . '_url_partial' => array(
                    'selector' => '#top-header-left-content',
                    'render_callback' => function () {
                        $return_value = "";
                        for ($loop = 1; $loop <= 3; $loop++) {
                            if (trim(get_theme_mod('poporealestate_top_header_link_' . $loop . '_title')) == "") {
                                continue;
                            }
                            $return_value = $return_value . '<a href="' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_url') . '"><i class="fa ' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_icon') . '" aria-hidden="true"></i> ' . get_theme_mod('poporealestate_top_header_link_' . $loop . '_title') . '</a>';
                        }
                        return $return_value;
                    },
                ))

        ));

        $jCounter++;
    }


//--
    Kirki::add_field('poporealestate_header_address_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_header_address',
        'label' => __('Address Box', 'poporealestate'),
        'section' => 'header',
        'default' => $poporealestate_default_options['poporealestate_header_address'],
        'priority' => 4,
        'partial_refresh' => array(
            'poporealestate_header_address_partial' => array(
                'selector' => '.poporealestate_header_address',
                'render_callback' => function () {
                    global $poporealestate_default_options;
                    return get_theme_mod('poporealestate_header_address', $poporealestate_default_options['poporealestate_header_address']);
                },
            ))

    ));

    Kirki::add_field('poporealestate_header_contact_control', array(
        'type' => 'textarea',
        'settings' => 'poporealestate_header_contact',
        'label' => __('Contact Box', 'poporealestate'),
        'section' => 'header',
        'default' => $poporealestate_default_options['poporealestate_header_contact'],
        'priority' => 5,
        'partial_refresh' => array(
            'poporealestate_header_contact_partial' => array(
                'selector' => '.poporealestate_header_contact',
                'render_callback' => function () {
                    global $poporealestate_default_options;

                    return get_theme_mod('poporealestate_header_contact', $poporealestate_default_options['poporealestate_header_contact']);
                },
            ))

    ));

    Kirki::add_field('poporealestate_social_icon_facebook_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_facebook',
        'label' => __('Facebook URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_facebook_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));

    Kirki::add_field('poporealestate_social_icon_twitter_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_twitter',
        'label' => __('Twitter URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_twitter_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('poporealestate_social_icon_pinterest_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_pinterest',
        'label' => __('Pinterest URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_pinterest_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('poporealestate_social_icon_googleplus_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_googleplus',
        'label' => __('Google+ URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_googleplus_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('poporealestate_social_icon_tumblr_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_tumblr',
        'label' => __('Tumblr URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_tumblr_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('poporealestate_social_icon_stumbleupon_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_stumbleupon',
        'label' => __('Stumble Upon URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_stumbleupon_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('poporealestate_social_icon_wordpress_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_wordpress',
        'label' => __('WordPress Feed URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_wordpress_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('poporealestate_social_icon_instagram_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_instagram',
        'label' => __('Instagram URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_instagram_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));
    Kirki::add_field('poporealestate_social_icon_dribbble_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_social_icon_dribbble',
        'label' => __('Dribbble URL', 'poporealestate'),
        'section' => 'poporealestate_social_media',
        'default' => '',
        'priority' => 1,
        'partial_refresh' => array(
            'poporealestate_social_icon_dribbble_partial' => array(
                'selector' => '.social-media',
                'render_callback' => function () {
                    return poporealestate_get_social_icons();
                },
            ))

    ));

    Kirki::add_field('poporealestate_listing_page_control', array(
        'type' => 'select',
        'settings' => 'poporealestate_listing_page',
        'label' => __('Listing Page', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'priority' => 1,
        'choices' => poporealestate_get_page_list()

    ));
    Kirki::add_field('poporealestate_search_page_control', array(
        'type' => 'select',
        'settings' => 'poporealestate_search_page',
        'label' => __('Search Page', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'priority' => 2,
        'choices' => poporealestate_get_page_list()

    ));
    Kirki::add_field('poporealestate_currency_prefix_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_currency_prefix',
        'label' => __('Currency Prefix', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_currency_prefix'],
        'priority' => 3,

    ));
    Kirki::add_field('poporealestate_area_postfix_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_area_postfix',
        'label' => __('Area Postfix', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_area_postfix'],
        'priority' => 4,

    ));
    Kirki::add_field('poporealestate_min_beds_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_min_beds',
        'label' => __('Min Beds Values', 'poporealestate'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_min_beds'],
        'priority' => 5,

    ));
    Kirki::add_field('poporealestate_min_baths_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_min_baths',
        'label' => __('Min Baths Values', 'poporealestate'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_min_baths'],
        'priority' => 6,

    ));
    Kirki::add_field('poporealestate_min_parking_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_min_parking',
        'label' => __('Min Parking Values', 'poporealestate'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_min_parking'],
        'priority' => 7,

    ));
    Kirki::add_field('poporealestate_min_area_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_min_area',
        'label' => __('Min Area Values', 'poporealestate'),
        'description' => __('Add comma separated values like: 1,2,3,4', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_min_area'],
        'priority' => 8,

    ));
    Kirki::add_field('poporealestate_max_area_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_max_beds',
        'label' => __('Max Area Values', 'poporealestate'),
        'description' => __('Add comma separated values like: 100,200,300,400', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_max_area'],
        'priority' => 9,

    ));
    Kirki::add_field('poporealestate_price_from_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_price_from',
        'label' => __('Price From Values', 'poporealestate'),
        'description' => __('Add comma separated values like: 100,200,300,400', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_price_from'],
        'priority' => 10,

    ));
    Kirki::add_field('poporealestate_price_to_control', array(
        'type' => 'text',
        'settings' => 'poporealestate_price_to',
        'label' => __('Price To Values', 'poporealestate'),
        'description' => __('Add comma separated values like: 100,200,300,400', 'poporealestate'),
        'section' => 'poporealestate_properties',
        'default' => $poporealestate_default_options['poporealestate_price_to'],
        'priority' => 11,

    ));
}


?>
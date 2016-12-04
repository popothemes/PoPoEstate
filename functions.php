<?php

//Default Primary Colors
define("poporealestate_PRIMARY_COLOR", esc_attr(get_theme_mod("poporealestate_styles_primary_color", "#208873")));
define("poporealestate_SECONDARY_COLOR", esc_attr(get_theme_mod("poporealestate_default_secondary_color", "#1a1c28")));

//Defining the content width
if ( ! isset( $content_width ) ) {
    $content_width = 770;
}

//File Imports
require_once(get_template_directory() . '/inc/poporealestate_essentials.php');
require_once(get_template_directory() . '/inc/poporealestate_default_options.php');
require_once get_template_directory() . '/inc/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/inc/breadcrumbs.php';
require_once get_template_directory() . '/inc/Bootstrap-wordpress-pagination-master/wp_bootstrap_pagination.php';
require_once(get_template_directory() . '/inc/poporealestate_kirki_options.php');
require_once(get_template_directory() . '/inc/poporealestate-widgets.php');
require_once(get_template_directory() . '/inc/styles-function.php');

//Adding Editor Style
function poporealestate_add_editor_styles()
{
    add_editor_style(get_template_directory_uri() . '/css/editor-style.css');
}
add_action('admin_init', 'poporealestate_add_editor_styles');


//TGM Plugin Activation
require_once get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

//Theme support for Title tag
add_theme_support( 'title-tag' );

//Global Variables
global $poporealestate_default_options;
global $poporealestate_search_locations;
add_option( 'poporealestate_last_searches','');
//Post Thumbnails Support

add_theme_support('post-thumbnails');


//Custom Image Sizes

add_image_size('poporealestate_blog_thumbnail', 648, 409, true);
add_image_size('poporealestate_blog_home_thumbnail', 200, 192, true);
add_image_size('poporealestate_single_blog_thumbnail', 773, 430, true);
add_image_size('poporealestate_related_posts_thumbnail', 372, 247, true);
add_image_size('poporealestate_property_single', 773, 374, true);
add_image_size('poporealestate_property_thumb', 378, 202, true);
add_image_size('poporealestate_attachments', 800);
add_image_size('poporealestate_featured_property_thumbnail', 137, 137, true);
add_image_size('poporealestate_localities_thumbnail', 320, 300, true);



//For Loading Theme Styles
if (!function_exists('poporealestate_enqueue_theme_styles')) {

    function poporealestate_enqueue_theme_styles()
    {
        if (!is_admin()) {

            $protocol = is_ssl() ? 'https' : 'http';

            //Google Fonts
            wp_enqueue_style('google-fonts', "$protocol://fonts.googleapis.com/css?family=Lato:300,400,700 |Raleway:100,100i,300,300i,400,400i,500,500i,600,700,700i,900'");

            //Font Awesome
            wp_enqueue_style('font-awesome', "$protocol://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css");

            //Bootstrap
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

            //Themify Icons
            wp_enqueue_style('themify-icons', get_template_directory_uri() . '/css/themify-icons.css');

            //Bootstrap Select
            wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.min.css');

            //Animate
            wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');

            //Owl Carousel
            wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');

            //Owl Carousel Theme
            wp_enqueue_style('owl-carousel-theme', get_template_directory_uri() . '/css/owl.theme.css');

            //General Style
            wp_enqueue_style('poporealestate-general-style', get_template_directory_uri() . '/css/style.css');

            //Dynamic Stylesheet
            if (get_option('permalink_structure')) {

                wp_enqueue_style('poporealestate-dynamic-style', get_site_url() . '/dynamiccss/');
                wp_add_inline_style( 'poporealestate-dynamic-style', "body{}" );

            } else {
                wp_enqueue_style('poporealestate-dynamic-style', get_site_url() . '?dynamiccss/');
            }


        }

    }

    add_action('wp_enqueue_scripts', 'poporealestate_enqueue_theme_styles');
}

//For Loading Theme Scripts

if (!function_exists('poporealestate_enqueue_theme_scripts')) {

    function poporealestate_enqueue_theme_scripts()
    {
        if (!is_admin()) {

            $protocol = is_ssl() ? 'https' : 'http';

            //Bootstrap
            wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'));

            //Modernizr
            wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array('jquery'));

            //Animate wow
            wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.min.js', array('jquery'));

            //jQuery Easing
            wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.min.js', array('jquery'));

            //DD Smooth Menu
            wp_enqueue_script('dd-smooth-menu', get_template_directory_uri() . '/js/ddsmoothmenu.js', array('jquery'));

            //Owl Carousel
            wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));

            //Bootstrap Select
            wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.min.js');


            //Custom
            wp_register_script('poporealestate-custom', get_template_directory_uri() . '/js/script.js', array('jquery'));
            wp_localize_script(
                'poporealestate-custom', 'my_ajax_vars', array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'blogurl' => esc_url( home_url( '/' ) )
                )
            );
            wp_enqueue_script('poporealestate-custom');

            //Localizing Scripts

            if(is_singular('property') && !empty(get_post_meta(get_the_id(), 'address')[0]) && !empty(get_theme_mod('poporealestate_google_maps_api_key')))
            {
                //Google Maps
                wp_enqueue_script('google-maps', "$protocol://maps.googleapis.com/maps/api/js?key=".esc_html(get_theme_mod('poporealestate_google_maps_api_key')."&callback=initMap"));

                // Register the script
                wp_register_script('poporealestate-maps', get_template_directory_uri() . '/js/poporealestate_map_scripts.js', array('jquery'));

                // Localize the script with new data
                if (is_singular('property')) {
                    $translation_array = array(
                        'location' => get_post_meta(get_the_id(), 'address-map', true)
                    );
                } else {
                    $translation_array = array(
                        'location' => 'none'
                    );
                }

                wp_localize_script('poporealestate-maps', 'single_property_loc', $translation_array);

            }

            // Enqueued script with localized data.
            wp_enqueue_script('poporealestate-maps');


        }
    }

    add_action('wp_enqueue_scripts', 'poporealestate_enqueue_theme_scripts');
}
//Feed Support
add_theme_support( 'automatic-feed-links' );
//Modifying current page style

function poporealestate_link_pages( $link ) {
    if ( ctype_digit( $link ) ) {
        return '<li class="active"><a href="#">'.$link.'</a></li>';
    }
    return $link;
}
add_filter( 'wp_link_pages_link', 'poporealestate_link_pages' );
//Comments scripts
if (!function_exists('poporealestate_theme_queue_js')) {
    function poporealestate_theme_queue_js()
    {
        if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
    }
}
add_action('wp_print_scripts', 'poporealestate_theme_queue_js');

//Add Script Attributes
if (!function_exists('poporealestate_add_async_attribute')) {
    function poporealestate_add_async_attribute($tag, $handle)
    {
        if ('google-maps' !== $handle) {
            return $tag;
        }
        return str_replace(' src', ' async="async" src', $tag);
    }
}

add_filter('script_loader_tag', 'poporealestate_add_async_attribute', 10, 2);


//Register Main Menu
if (!function_exists('poporealestate_register_main_menu')) {
    function poporealestate_register_main_menu()
    {
        register_nav_menu('main-menu', __('Main Menu', 'popo-real-estate'));
    }
}
add_action('init', 'poporealestate_register_main_menu');

//Comments Template
if (!function_exists('poporealestate_comments')) {
    function poporealestate_comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :
            case 'pingback' :
            case 'trackback' :
                ?>
                <li class="pingback">
                    <p><?php _e('Pingback:', 'popo-real-estate'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'popo-real-estate'), ' '); ?></p>
                </li>
                <?php
                break;
            default :
                ?>
                <li <?php comment_class("media"); ?> id="li-comment-<?php comment_ID(); ?>">
                <div class="media-left"><a
                        href="<?php echo comment_author_url(); ?>"> <?php echo get_avatar($comment, 64); ?> </a></div>
                <div class="media-body">
                    <div class="media-outer">
                        <p><?php comment_text(); ?></p>

                        <div class="comment-info">
                            <span><?php printf(__('Posted By: ', 'popo-real-estate') . '<a href="' . comment_author_url() . '">%s</a>', sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?></span>
                            | <span><?php printf(__('%1$s', 'popo-real-estate'), get_comment_date()); ?></span> |
                            <span> <?php comment_reply_link(array_merge(array('after' => '', 'reply_text' => __('Reply<i class="ti-arrow-top-right"></i>', 'popo-real-estate')), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
                        </div>
                    </div>

                </div>
                <!-- end of comment -->
                <?php
                break;
        endswitch;
    }
}

add_filter('wp_mail_content_type', 'poporealestate_set_content_type');


//Getting Property Types
if (!function_exists('poporealestate_select_property_types')) {
    function poporealestate_select_property_types($current_type)
    {
        $terms = get_terms(
            array(
                'taxonomy' => 'property_types',
                'hide_empty' => true,
            )
        );

        foreach ($terms as $term) {


            if (!strcasecmp($term->name, $current_type)) {
                echo '<option selected>' . $term->name . '</option>';

            } else {
                echo '<option>' . $term->name . '</option>';

            }


        }

        print_r($terms);
    }
}

//Getting Property Statuses
if (!function_exists('poporealestate_select_property_statuses')) {
    function poporealestate_select_property_statuses($current_status)
    {
        $terms = get_terms(
            array(
                'taxonomy' => 'property_statuses',
                'hide_empty' => true,
            )
        );

        foreach ($terms as $term) {


            if (!strcasecmp($term->name, $current_status)) {
                echo '<option selected>' . $term->name . '</option>';

            } else {
                echo '<option>' . $term->name . '</option>';

            }


        }

        print_r($terms);
    }
}
if (!function_exists('poporealestate_get_min_beds')) {
    function poporealestate_get_min_beds($current_value)
    {
        global $poporealestate_default_options;

        $values = explode(',', get_theme_mod('poporealestate_min_beds', $poporealestate_default_options['poporealestate_min_beds']));

        foreach ($values as $item) {


            if ($current_value == $item) {
                echo '<option selected>' . $item . '</option>';

            } else {
                echo '<option>' . $item . '</option>';

            }


        }
    }
}
if (!function_exists('poporealestate_get_min_baths')) {
    function poporealestate_get_min_baths($current_value)
    {
        global $poporealestate_default_options;

        $values = explode(',', get_theme_mod('poporealestate_min_baths', $poporealestate_default_options['poporealestate_min_baths']));


        foreach ($values as $item) {


            if ($current_value == $item) {
                echo '<option selected>' . $item . '</option>';

            } else {
                echo '<option>' . $item . '</option>';

            }


        }
    }
}
if (!function_exists('poporealestate_get_min_parking')) {
    function poporealestate_get_min_parking($current_value)
    {
        global $poporealestate_default_options;

        $values = explode(',', get_theme_mod('poporealestate_min_parking', $poporealestate_default_options['poporealestate_min_parking']));


        foreach ($values as $item) {


            if ($current_value == $item) {
                echo '<option selected>' . $item . '</option>';

            } else {
                echo '<option>' . $item . '</option>';

            }


        }
    }
}
if (!function_exists('poporealestate_get_min_area')) {
    function poporealestate_get_min_area($current_value)
    {
        global $poporealestate_default_options;

        $values = explode(',', get_theme_mod('poporealestate_min_area', $poporealestate_default_options['poporealestate_min_area']));

        foreach ($values as $item) {


            if ($current_value == $item) {
                echo '<option selected>' . $item . '</option>';

            } else {
                echo '<option>' . $item . '</option>';

            }


        }
    }
}
if (!function_exists('poporealestate_get_max_area')) {
    function poporealestate_get_max_area($current_value)
    {
        global $poporealestate_default_options;

        $values = explode(',', get_theme_mod('poporealestate_max_area', $poporealestate_default_options['poporealestate_max_area']));


        foreach ($values as $item) {


            if ($current_value == $item) {
                echo '<option selected>' . $item . '</option>';

            } else {
                echo '<option>' . $item . '</option>';

            }


        }
    }
}
if (!function_exists('poporealestate_get_max_price')) {
    function poporealestate_get_max_price($current_value)
    {
        global $poporealestate_default_options;

        $values = explode(',', get_theme_mod('poporealestate_price_to', $poporealestate_default_options['poporealestate_price_to']));


        foreach ($values as $item) {


            if ($current_value == $item) {
                echo '<option selected>' . $item . '</option>';

            } else {
                echo '<option>' . $item . '</option>';

            }


        }
    }
}
if (!function_exists('poporealestate_get_min_price')) {
    function poporealestate_get_min_price($current_value)
    {
        global $poporealestate_default_options;

        $values = explode(',', get_theme_mod('poporealestate_price_from', $poporealestate_default_options['poporealestate_price_from']));


        foreach ($values as $item) {


            if ($current_value == $item) {
                echo '<option selected>' . $item . '</option>';

            } else {
                echo '<option>' . $item . '</option>';

            }


        }
    }
}
if (!function_exists('poporealestate_get_search_query_arguments')) {
    function poporealestate_get_search_query_arguments()
    {
        $regular_posts_args = array(

            'post_type' => 'property',
            'paged' => get_query_var('paged'),

        );

        $tax_query = array();
        $meta_query = array();
        $meta_query_keyword = array();

//Tax Queries

        if (isset($_GET['status']) && $_GET['status'] != 'any') {

            $tax_query[] = array(

                'taxonomy' => 'property_statuses',
                'field' => 'name',
                'terms' => $_GET['status'],

            );

        }
        if (isset($_GET['type']) && $_GET['type'] != 'any') {

            $tax_query[] = array(

                'taxonomy' => 'property_types',
                'field' => 'name',
                'terms' => $_GET['type'],

            );

        }

//Meta Queries
        if (isset($_GET['beds']) && $_GET['beds'] != 'any') {

            $meta_query[] = array(

                'key' => 'beds',
                'value' => $_GET['beds'],
                'compare' => '>=',
                'type' => 'DECIMAL'

            );

        }
        if (isset($_GET['baths']) && $_GET['baths'] != 'any') {

            $meta_query[] = array(

                'key' => 'baths',
                'value' => $_GET['baths'],
                'compare' => '>=',
                'type' => 'DECIMAL'

            );

        }
        if (isset($_GET['minarea']) && $_GET['minarea'] != 'any') {
            $min_area_int_value = intval($_GET['minarea']);

            if ($min_area_int_value > 0) {

                $meta_query[] = array(

                    'key' => 'area',
                    'value' => $min_area_int_value,
                    'compare' => '>=',
                    'type' => 'DECIMAL'

                );
            }

        }
        if (isset($_GET['maxarea']) && $_GET['maxarea'] != 'any') {
            $max_area_int_value = intval($_GET['maxarea']);

            if ($max_area_int_value > 0) {

                $meta_query[] = array(

                    'key' => 'area',
                    'value' => $max_area_int_value,
                    'compare' => '<=',
                    'type' => 'DECIMAL'

                );
            }

        }
        if (isset($_GET['pricefrom']) && $_GET['pricefrom'] != 'any') {
            $min_price_int_value = intval($_GET['pricefrom']);

            if ($min_price_int_value > 0) {

                $meta_query[] = array(

                    'key' => 'price',
                    'value' => $min_price_int_value,
                    'compare' => '>=',
                    'type' => 'DECIMAL'

                );
            }

        }
        if (isset($_GET['priceto']) && $_GET['priceto'] != 'any') {
            $max_price_int_value = intval($_GET['priceto']);

            if ($max_price_int_value > 0) {

                $meta_query[] = array(

                    'key' => 'price',
                    'value' => $max_price_int_value,
                    'compare' => '<=',
                    'type' => 'DECIMAL'

                );
            }

        }

        $post_ids_with_keywords = [];
        $post_ids_with_meta_keywords = [];

        if (isset($_GET['keyword']) && $_GET['keyword'] != '') {


            //Checking keyword in features
            $meta_query_keyword[] = array(

                'relation' => 'OR',
                array(

                    'key' => 'features',
                    'value' => $_GET['keyword'],
                    'compare' => 'LIKE'
                ),
            );

            $meta_query_keyword['relation'] = 'OR';

            global $wpdb;

            $post_ids_with_keywords = $wpdb->get_col("select ID from $wpdb->posts where $wpdb->posts.post_type ='property'
                                            AND post_title LIKE '" . $_GET['keyword'] . "%'
                                            OR post_content LIKE '" . $_GET['keyword'] . "%'
                                            ");

        }

        if (isset($_GET['location']) && $_GET['location'] != '') {

            $meta_query[] = array(

                'relation' => 'AND',
                array(

                    'key' => 'address',
                    'value' => $_GET['location'],
                    'compare' => 'LIKE'
                )
            );
        }

        $tax_count = count($tax_query);

        if ($tax_count > 1) {
            $tax_query['relation'] = 'AND';
        }

        if ($meta_query > 1) {
            $meta_query['relation'] = 'OR';

        }

        $keyword_meta_posts = get_posts(
            array(

                'post_type' => 'property',
                'meta_query' => $meta_query_keyword,
                'numberposts' => -1

            ));

        foreach ($keyword_meta_posts as $post) {
            $post_ids_with_meta_keywords[] = $post->ID;
        }


        $post_all_ids_keywords = array_merge($post_ids_with_keywords, $post_ids_with_meta_keywords);


        if ((isset($_GET['keyword']) && $_GET['keyword'] != '') && empty($post_all_ids_keywords)) {

            $regular_posts_args = array(

                'post_type' => 'property',
                'paged' => get_query_var('paged'),
                'tax_query' => $tax_query,
                'meta_query' => $meta_query,
                's' => $_GET['keyword']

            );
        } else if (empty($post_all_ids_keywords)) {
            $regular_posts_args = array(

                'post_type' => 'property',
                'paged' => get_query_var('paged'),
                'tax_query' => $tax_query,
                'meta_query' => $meta_query,

            );
        } else {


            $searches = get_option('poporealestate_last_searches');

            if (!empty($searches) && isset($_GET['location'])) {
                $searches_array = $searches;
                $searches_array[] = $_GET['location'];

                if (count(get_option('poporealestate_last_searchers')) > 10) {
                    array_pop($searches_array);
                }
                if (!in_array($_GET['location'], $searches)) {
                    update_option('poporealestate_last_searches', $searches_array);

                }

            } else if (isset($_GET['location'])) {
                update_option('poporealestate_last_searches', array($_GET['location']));

            }


            $regular_posts_args = array(
                'post_type' => 'property',
                'paged' => get_query_var('paged'),
                'tax_query' => $tax_query,
                'meta_query' => $meta_query,
                'post__in' => $post_all_ids_keywords
            );

        }

        return $regular_posts_args;

    }
}

//Kirki Translations
add_filter('kirki/my_config/l10n', function ($l10n) {

    $l10n['background-color'] = esc_attr__('Background Color', 'popo-real-estate');
    $l10n['background-image'] = esc_attr__('Background Image', 'popo-real-estate');
    $l10n['no-repeat'] = esc_attr__('No Repeat', 'popo-real-estate');
    $l10n['repeat-all'] = esc_attr__('Repeat All', 'popo-real-estate');
    $l10n['repeat-x'] = esc_attr__('Repeat Horizontally', 'popo-real-estate');
    $l10n['repeat-y'] = esc_attr__('Repeat Vertically', 'popo-real-estate');
    $l10n['inherit'] = esc_attr__('Inherit', 'popo-real-estate');
    $l10n['background-repeat'] = esc_attr__('Background Repeat', 'popo-real-estate');
    $l10n['cover'] = esc_attr__('Cover', 'popo-real-estate');
    $l10n['contain'] = esc_attr__('Contain', 'popo-real-estate');
    $l10n['background-size'] = esc_attr__('Background Size', 'popo-real-estate');
    $l10n['fixed'] = esc_attr__('Fixed', 'popo-real-estate');
    $l10n['scroll'] = esc_attr__('Scroll', 'popo-real-estate');
    $l10n['background-attachment'] = esc_attr__('Background Attachment', 'popo-real-estate');
    $l10n['left-top'] = esc_attr__('Left Top', 'popo-real-estate');
    $l10n['left-center'] = esc_attr__('Left Center', 'popo-real-estate');
    $l10n['left-bottom'] = esc_attr__('Left Bottom', 'popo-real-estate');
    $l10n['right-top'] = esc_attr__('Right Top', 'popo-real-estate');
    $l10n['right-center'] = esc_attr__('Right Center', 'popo-real-estate');
    $l10n['right-bottom'] = esc_attr__('Right Bottom', 'popo-real-estate');
    $l10n['center-top'] = esc_attr__('Center Top', 'popo-real-estate');
    $l10n['center-center'] = esc_attr__('Center Center', 'popo-real-estate');
    $l10n['center-bottom'] = esc_attr__('Center Bottom', 'popo-real-estate');
    $l10n['background-position'] = esc_attr__('Background Position', 'popo-real-estate');
    $l10n['background-opacity'] = esc_attr__('Background Opacity', 'popo-real-estate');
    $l10n['on'] = esc_attr__('ON', 'popo-real-estate');
    $l10n['off'] = esc_attr__('OFF', 'popo-real-estate');
    $l10n['all'] = esc_attr__('All', 'popo-real-estate');
    $l10n['cyrillic'] = esc_attr__('Cyrillic', 'popo-real-estate');
    $l10n['cyrillic-ext'] = esc_attr__('Cyrillic Extended', 'popo-real-estate');
    $l10n['devanagari'] = esc_attr__('Devanagari', 'popo-real-estate');
    $l10n['greek'] = esc_attr__('Greek', 'popo-real-estate');
    $l10n['greek-ext'] = esc_attr__('Greek Extended', 'popo-real-estate');
    $l10n['khmer'] = esc_attr__('Khmer', 'popo-real-estate');
    $l10n['latin'] = esc_attr__('Latin', 'popo-real-estate');
    $l10n['latin-ext'] = esc_attr__('Latin Extended', 'popo-real-estate');
    $l10n['vietnamese'] = esc_attr__('Vietnamese', 'popo-real-estate');
    $l10n['hebrew'] = esc_attr__('Hebrew', 'popo-real-estate');
    $l10n['arabic'] = esc_attr__('Arabic', 'popo-real-estate');
    $l10n['bengali'] = esc_attr__('Bengali', 'popo-real-estate');
    $l10n['gujarati'] = esc_attr__('Gujarati', 'popo-real-estate');
    $l10n['tamil'] = esc_attr__('Tamil', 'popo-real-estate');
    $l10n['telugu'] = esc_attr__('Telugu', 'popo-real-estate');
    $l10n['thai'] = esc_attr__('Thai', 'popo-real-estate');
    $l10n['serif'] = _x('Serif', 'font style', 'popo-real-estate');
    $l10n['sans-serif'] = _x('Sans Serif', 'font style', 'popo-real-estate');
    $l10n['monospace'] = _x('Monospace', 'font style', 'popo-real-estate');
    $l10n['font-family'] = esc_attr__('Font Family', 'popo-real-estate');
    $l10n['font-size'] = esc_attr__('Font Size', 'popo-real-estate');
    $l10n['font-weight'] = esc_attr__('Font Weight', 'popo-real-estate');
    $l10n['line-height'] = esc_attr__('Line Height', 'popo-real-estate');
    $l10n['font-style'] = esc_attr__('Font Style', 'popo-real-estate');
    $l10n['letter-spacing'] = esc_attr__('Letter Spacing', 'popo-real-estate');
    $l10n['top'] = esc_attr__('Top', 'popo-real-estate');
    $l10n['bottom'] = esc_attr__('Bottom', 'popo-real-estate');
    $l10n['left'] = esc_attr__('Left', 'popo-real-estate');
    $l10n['right'] = esc_attr__('Right', 'popo-real-estate');
    $l10n['color'] = esc_attr__('Color', 'popo-real-estate');
    $l10n['add-image'] = esc_attr__('Add Image', 'popo-real-estate');
    $l10n['change-image'] = esc_attr__('Change Image', 'popo-real-estate');
    $l10n['remove'] = esc_attr__('Remove', 'popo-real-estate');
    $l10n['no-image-selected'] = esc_attr__('No Image Selected', 'popo-real-estate');
    $l10n['select-font-family'] = esc_attr__('Select a font-family', 'popo-real-estate');
    $l10n['variant'] = esc_attr__('Variant', 'popo-real-estate');
    $l10n['subsets'] = esc_attr__('Subset', 'popo-real-estate');
    $l10n['size'] = esc_attr__('Size', 'popo-real-estate');
    $l10n['height'] = esc_attr__('Height', 'popo-real-estate');
    $l10n['spacing'] = esc_attr__('Spacing', 'popo-real-estate');
    $l10n['ultra-light'] = esc_attr__('Ultra-Light 100', 'popo-real-estate');
    $l10n['ultra-light-italic'] = esc_attr__('Ultra-Light 100 Italic', 'popo-real-estate');
    $l10n['light'] = esc_attr__('Light 200', 'popo-real-estate');
    $l10n['light-italic'] = esc_attr__('Light 200 Italic', 'popo-real-estate');
    $l10n['book'] = esc_attr__('Book 300', 'popo-real-estate');
    $l10n['book-italic'] = esc_attr__('Book 300 Italic', 'popo-real-estate');
    $l10n['regular'] = esc_attr__('Normal 400', 'popo-real-estate');
    $l10n['italic'] = esc_attr__('Normal 400 Italic', 'popo-real-estate');
    $l10n['medium'] = esc_attr__('Medium 500', 'popo-real-estate');
    $l10n['medium-italic'] = esc_attr__('Medium 500 Italic', 'popo-real-estate');
    $l10n['semi-bold'] = esc_attr__('Semi-Bold 600', 'popo-real-estate');
    $l10n['semi-bold-italic'] = esc_attr__('Semi-Bold 600 Italic', 'popo-real-estate');
    $l10n['bold'] = esc_attr__('Bold 700', 'popo-real-estate');
    $l10n['bold-italic'] = esc_attr__('Bold 700 Italic', 'popo-real-estate');
    $l10n['extra-bold'] = esc_attr__('Extra-Bold 800', 'popo-real-estate');
    $l10n['extra-bold-italic'] = esc_attr__('Extra-Bold 800 Italic', 'popo-real-estate');
    $l10n['ultra-bold'] = esc_attr__('Ultra-Bold 900', 'popo-real-estate');
    $l10n['ultra-bold-italic'] = esc_attr__('Ultra-Bold 900 Italic', 'popo-real-estate');
    $l10n['invalid-value'] = esc_attr__('Invalid Value', 'popo-real-estate');

    return $l10n;

});

//Resizing Customizer Preview
if (!function_exists('poporealestate_customizer_preview_size')) {
    function poporealestate_customizer_preview_size()
    {

        ?>
        <style>
            .wp-full-overlay.expanded {
                margin-left: 280px;
            }

            #customize-controls {
                width: 280px;
            }

            .expanded .wp-full-overlay-footer {
                width: 280px !important;
            }
        </style>
        <?php
    }
}

add_action('customize_controls_print_styles', 'poporealestate_customizer_preview_size');


//Registering Sidebars
register_sidebar(array(

    'name' => __('Sidebar', 'popo-real-estate'),
    'id' => 'sidebar-1',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => "</section>\n",
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => "</h2>\n",

));
register_sidebar(array(

    'name' => __('Blog', 'popo-real-estate'),
    'id' => 'blog-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => "</section>\n",
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => "</h4>\n",

));
register_sidebar(array(

    'name' => __('Property Listing', 'popo-real-estate'),
    'id' => 'property-sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => "</li>\n",
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => "</h4>\n",

));

register_sidebars(4, array(

    'name' => __('Footer %d', 'popo-real-estate'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => "</section>\n",
    'before_title' => '<h6 class="widgettitle">',
    'after_title' => "</h6>\n",

));

//Adding dynamic css query var

add_action('init', 'poporealestate_php_style');
add_action('template_redirect', 'poporealestate_php_style');
add_filter('request', 'poporealestate_php_style');

if (!function_exists('poporealestate_php_style')){
function poporealestate_php_style($vars = '')
{
    $hook = current_filter();

    // load 'style.php' from the current theme.
    'template_redirect' === $hook
    && get_query_var('dynamiccss')
    && locate_template('inc/dynamic-css.php', TRUE, TRUE)
    && exit;

    // Add a rewrite rule.
    'init' === $hook && add_rewrite_endpoint('dynamiccss', EP_ROOT);

    // Make sure the variable is not empty.
    'request' === $hook
    && isset ($vars['dynamiccss'])
    && empty ($vars['dynamiccss'])
    && $vars['dynamiccss'] = 'default';

    return $vars;
}
}

//Get Primary Color
if (!function_exists('poporealestate_get_primary_color')) {
    function poporealestate_get_primary_color()
    {
        return esc_attr(get_theme_mod("poporealestate_styles_primary_color", poporealestate_PRIMARY_COLOR));
    }
}
//Get Secondry
if (!function_exists('poporealestate_get_secondary_color')) {
    function poporealestate_get_secondary_color()
    {
        return esc_attr(get_theme_mod("poporealestate_styles_secondary_color", poporealestate_SECONDARY_COLOR));
    }
}

//Pagination

if ( ! function_exists( 'poporealestate_pagination' ) ) {

    function poporealestate_pagination( $pages = '' ) {

        global $paged;

        if ( empty( $paged ) ) {
            $paged = 1;
        }

        $prev = $paged - 1;
        $next = $paged + 1;
        $range = 2; // only change it to show more links
        $show_items = ( $range * 2 ) + 1;

        if ( $pages == '' ) {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if ( ! $pages ) {
                $pages = 1;
            }
        }

        if ( 1 != $pages ) {
            echo '<nav aria-label="Page navigation">';
            echo "<ul class='pagination'>";
            echo ( $paged > 2 && $paged > $range + 1 && $show_items < $pages ) ? "<li><a href='" . get_pagenum_link( 1 ) . "''>&laquo; " . __( 'First', 'popo-real-estate' ) . "</a> </li>" : "";
            echo ( $paged > 1 && $show_items < $pages ) ? "<li><a href='" . get_pagenum_link( $prev ) . "' >&laquo; " . __( 'Previous', 'popo-real-estate' ) . "</a></li> " : "";

            for ( $i = 1; $i <= $pages; $i++ ) {
                if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $show_items ) ) {
                    echo ( $paged == $i ) ? "<li class='active'><a href='" . get_pagenum_link( $i ) . "' class='current' >" . $i . "</a> </li>" : "<li><a href='" . get_pagenum_link( $i ) . "' >" . $i . "</a> </li>";
                }
            }

            echo ( $paged < $pages && $show_items < $pages ) ? "<li><a href='" . get_pagenum_link( $next ) . "' >" . __( 'Next', 'popo-real-estate' ) . " &raquo;</a></li> " : "";
            echo ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $show_items < $pages ) ? "<li><a href='" . get_pagenum_link( $pages ) . "' >" . __( 'Last', 'popo-real-estate' ) . " &raquo;</a> </li>" : "";
            echo "</div></nav>";
        }
    }
}

?>
<?php

//Default Primary Colors
define("REALTOR_PRIMARY_COLOR", get_theme_mod("realtor_styles_primary_color", "#208873"));
define("REALTOR_SECONDARY_COLOR", get_theme_mod("realtor_default_secondary_color", "#076eb0"));

//Defining the content width
if ( ! isset( $content_width ) ) {
    $content_width = 770;
}

//File Imports
require_once(dirname(__FILE__) . '/inc/realtor_default_options.php');
require_once dirname(__FILE__) . '/inc/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php';
require_once dirname(__FILE__) . '/inc/breadcrumbs.php';
require_once dirname(__FILE__) . '/inc/Bootstrap-wordpress-pagination-master/wp_bootstrap_pagination.php';
require_once(dirname(__FILE__) . '/inc/realtor_kirki_options.php');
require_once(dirname(__FILE__) . '/inc/realtor-widgets.php');
require_once(dirname(__FILE__) . '/inc/styles-function.php');
require_once(dirname(__FILE__) . '/inc/realtor_essentials.php');

//TGM Plugin Activation
require_once dirname(__FILE__) . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';

//Theme support for Title tag
add_theme_support( 'title-tag' );

//Global Variables
global $realtor_default_options;
global $realtor_search_locations;

//Post Thumbnails Support

add_theme_support('post-thumbnails');


//Custom Image Sizes

add_image_size('realtor_blog_thumbnail', 648, 409, true);
add_image_size('realtor_blog_home_thumbnail', 200, 192, true);
add_image_size('realtor_single_blog_thumbnail', 773, 430, true);
add_image_size('realtor_related_posts_thumbnail', 372, 247, true);
add_image_size('realtor_property_single', 773, 374, true);
add_image_size('realtor_property_thumb', 378, 202, true);
add_image_size('realtor_attachments', 800);
add_image_size('realtor_featured_property_thumbnail', 137, 137, true);
add_image_size('realtor_localities_thumbnail', 320, 300, true);



//For Loading Theme Styles

if (!function_exists('realtor_enqueue_theme_styles')) {

    function realtor_enqueue_theme_styles()
    {
        if (!is_admin()) {

            $protocol = is_ssl() ? 'https' : 'http';

            //Google Fonts
            wp_enqueue_style('google-fonts', "$protocol://fonts.googleapis.com/css?family=Lato:300,400,700 |Raleway:100,100i,300,300i,400,400i,500,500i,600,700,700i,900'");

            //Font Awesome
            wp_enqueue_style('font-awesome', "$protocol://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css");

            //Style 2
            //wp_enqueue_style( 'home-variation-1', get_template_directory_uri().'/css/style2.css');

            //Themify Icons
            wp_enqueue_style('themify-icons', get_template_directory_uri() . '/css/themify-icons.css');

            //Elegant Icons
            wp_enqueue_style('elegant-icons', get_template_directory_uri() . '/css/elegant-icons.min.css');

            //Bootstrap
            wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');

            //Bootstrap Theme
            wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css');

            //Bootstrap Select
            wp_enqueue_style('bootstrap-select', get_template_directory_uri() . '/css/bootstrap-select.min.css');

            //Colorbox
            wp_enqueue_style('colorbox', get_template_directory_uri() . '/css/colorbox.css');

            //Animate
            wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');

            //Owl Carousel
            wp_enqueue_style('out-carousel', get_template_directory_uri() . '/css/owl.carousel.css');

            //Owl Carousel Theme
            wp_enqueue_style('out-carousel-theme', get_template_directory_uri() . '/css/owl.theme.css');

            //C3
            wp_enqueue_style('c3', get_template_directory_uri() . '/css/c3.css');

            //General Style
            wp_enqueue_style('general-style', get_template_directory_uri() . '/css/style.css');

            //Dynamic Stylesheet
            if (get_option('permalink_structure')) {

                wp_enqueue_style('dynamic-style', get_site_url() . '/dynamiccss/');

            } else {
                wp_enqueue_style('dynamic-style', get_site_url() . '?dynamiccss/');
            }


        }

    }

    add_action('wp_enqueue_scripts', 'realtor_enqueue_theme_styles');
}

//For Loading Theme Scripts

if (!function_exists('realtor_enqueue_theme_scripts')) {

    function realtor_enqueue_theme_scripts()
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

            //jQuery Scroll To
            wp_enqueue_script('jquery-scroll-to', get_template_directory_uri() . '/js/jquery.scrollTo-1.4.2-min.js', array('jquery'));


            //Owl Carousel
            wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));

            //Bootstrap Select
            wp_enqueue_script('bootstrap-select', get_template_directory_uri() . '/js/bootstrap-select.min.js', array('jquery'));

            //Google Captcha
            wp_enqueue_script('google-captcha', 'https://www.google.com/recaptcha/api.js', array('jquery'));

            //Custom
            wp_register_script('realtor-custom', get_template_directory_uri() . '/js/script.js', array('jquery'));
            wp_localize_script(
                'realtor-custom', 'my_ajax_vars', array(
                    'ajaxurl' => admin_url('admin-ajax.php')
                )
            );
            wp_enqueue_script('realtor-custom');

            //Localizing Scripts

            if(is_singular('property') && !empty(get_post_meta(get_the_id(), 'address')[0]) && !empty(get_theme_mod('realtor_google_maps_api_key')))
            {
                //Google Maps
                wp_enqueue_script('google-maps', "$protocol://maps.googleapis.com/maps/api/js?key=".get_theme_mod('realtor_google_maps_api_key')."&callback=initMap");

                // Register the script
                wp_register_script('realtor-maps', get_template_directory_uri() . '/js/realtor_map_scripts.js', array('jquery'));

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

                wp_localize_script('realtor-maps', 'single_property_loc', $translation_array);

            }

            // Enqueued script with localized data.
            wp_enqueue_script('realtor-maps');


        }
    }

    add_action('wp_enqueue_scripts', 'realtor_enqueue_theme_scripts');
}
//Feed Support
add_theme_support( 'automatic-feed-links' );
//Modifying current page style

function realtor_link_pages( $link ) {
    if ( ctype_digit( $link ) ) {
        return '<li class="active"><a href="#">'.$link.'</a></li>';
    }
    return $link;
}
add_filter( 'wp_link_pages_link', 'realtor_link_pages' );
//Comments scripts
function realtor_theme_queue_js(){
    if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
        wp_enqueue_script( 'comment-reply' );
}
add_action('wp_print_scripts', 'realtor_theme_queue_js');
//Add Script Attributes
function add_async_attribute($tag, $handle)
{
    if ('google-maps' !== $handle) {
        return $tag;
    }
    return str_replace(' src', ' async="async" src', $tag);
}

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);


//Register Main Menu

function realtor_register_main_menu()
{
    register_nav_menu('main-menu', __('Main Menu','realtor' ));
}

add_action('init', 'realtor_register_main_menu');

//Comments Template
function realtor_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
        case 'pingback' :
        case 'trackback' :
            ?>
            <li class="pingback">
                <p><?php _e('Pingback:', 'realtor'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'realtor'), ' '); ?></p>
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
                        <span><?php printf(__('Posted By: ','realtor').'<a href="' . comment_author_url() . '">%s</a>', sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?></span>
                        | <span><?php printf(__('%1$s', 'realtor'), get_comment_date()); ?></span> |
                        <span> <?php comment_reply_link(array_merge(array('after' => '', 'reply_text' => __('Reply<i class="ti-arrow-top-right"></i>', 'realtor')), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
                    </div>
                </div>

            </div>
            <!-- end of comment -->
            <?php
            break;
    endswitch;
}

//Send Email On Single Property Page

function realtor_single_property_form_submit()
{
    $captcha_enabled = true;

    if ($captcha_enabled) {
        $response = wp_remote_post(
            'https://www.google.com/recaptcha/api/siteverify', array(
                'method' => 'POST',
                'timeout' => 45,
                'redirection' => 5,
                'httpversion' => '1.0',
                'blocking' => true,
                'headers' => array(),
                'body' => array('secret' => get_theme_mod('realtor_recaptcha_api_key'), 'response' => $_POST['g-recaptcha-response'], 'remoteip' => $_SERVER['REMOTE_ADDR']),
                'cookies' => array()
            )
        );

        if (strpos($response['body'], 'true') == null) {
            echo __("CAPTCHA error! Please resubmit.", 'realtor');
            wp_die();
        }


    }

    if (!(trim($_POST['full-name']) == ""
        && trim($_POST['phone-number']) == ""
        && trim($_POST['email']) == ""
        && trim($_POST['message']) == "")
    ) {
        echo trim($_POST['full-name']) == "";
        $name = $_POST['full-name'];
        $phone = $_POST['phone-number'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $author_id = $_POST['author-id'];


        if (wp_mail(
            get_the_author_meta('email', $author_id), "Realtor - Message From " . $name, $message . '<p>Phone Number:' . $phone . '</p>',
            array(
                'From: ' . $name . '<' . $email . '>',
            )
        )) {
            echo __("Message Sent!", 'realtor');
        } else {
            echo __("There was an error. Message not sent", 'realtor');
        }
    } else {
        echo __("Message was not sent. Please fill all fields.", 'realtor');

    }

    wp_die();
}

add_action('wp_ajax_realtor_single_property_form_submit', 'realtor_single_property_form_submit');
add_action('wp_ajax_nopriv_realtor_single_property_form_submit', 'realtor_single_property_form_submit');

//Set Mail Content Type
function realtor_set_content_type()
{
    return "text/html";
}

add_filter('wp_mail_content_type', 'realtor_set_content_type');

//Adding Query Vars
function add_query_vars_filter($vars)
{
    $vars[] = "keyword";
    return $vars;
}

add_filter('query_vars', 'add_query_vars_filter');

//Getting Property Types
function realtor_select_property_types($current_type)
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

//Getting Property Statuses
function realtor_select_property_statuses($current_status)
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

function realtor_get_min_beds($current_value)
{
    global $realtor_default_options;

    $values = explode(',', get_theme_mod('realtor_min_beds', $realtor_default_options['realtor_min_beds']));

    foreach ($values as $item) {


        if ($current_value == $item) {
            echo '<option selected>' . $item . '</option>';

        } else {
            echo '<option>' . $item . '</option>';

        }


    }
}

function realtor_get_min_baths($current_value)
{
    global $realtor_default_options;

    $values = explode(',', get_theme_mod('realtor_min_baths', $realtor_default_options['realtor_min_baths']));


    foreach ($values as $item) {


        if ($current_value == $item) {
            echo '<option selected>' . $item . '</option>';

        } else {
            echo '<option>' . $item . '</option>';

        }


    }
}

function realtor_get_min_parking($current_value)
{
    global $realtor_default_options;

    $values = explode(',', get_theme_mod('realtor_min_parking', $realtor_default_options['realtor_min_parking']));


    foreach ($values as $item) {


        if ($current_value == $item) {
            echo '<option selected>' . $item . '</option>';

        } else {
            echo '<option>' . $item . '</option>';

        }


    }
}

function realtor_get_min_area($current_value)
{
    global $realtor_default_options;

    $values = explode(',', get_theme_mod('realtor_min_area', $realtor_default_options['realtor_min_area']));

    foreach ($values as $item) {


        if ($current_value == $item) {
            echo '<option selected>' . $item . '</option>';

        } else {
            echo '<option>' . $item . '</option>';

        }


    }
}

function realtor_get_max_area($current_value)
{
    global $realtor_default_options;

    $values = explode(',', get_theme_mod('realtor_max_area', $realtor_default_options['realtor_max_area']));


    foreach ($values as $item) {


        if ($current_value == $item) {
            echo '<option selected>' . $item . '</option>';

        } else {
            echo '<option>' . $item . '</option>';

        }


    }
}

function realtor_get_max_price($current_value)
{
    global $realtor_default_options;

    $values = explode(',', get_theme_mod('realtor_price_to', $realtor_default_options['realtor_price_to']));


    foreach ($values as $item) {


        if ($current_value == $item) {
            echo '<option selected>' . $item . '</option>';

        } else {
            echo '<option>' . $item . '</option>';

        }


    }
}

function realtor_get_min_price($current_value)
{
    global $realtor_default_options;

    $values = explode(',', get_theme_mod('realtor_price_from', $realtor_default_options['realtor_price_from']));


    foreach ($values as $item) {


        if ($current_value == $item) {
            echo '<option selected>' . $item . '</option>';

        } else {
            echo '<option>' . $item . '</option>';

        }


    }
}

function realtor_get_search_query_arguments()
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

//Kirki Translations
add_filter('kirki/my_config/l10n', function ($l10n) {

    $l10n['background-color'] = esc_attr__('Background Color', 'realtor');
    $l10n['background-image'] = esc_attr__('Background Image', 'realtor');
    $l10n['no-repeat'] = esc_attr__('No Repeat', 'realtor');
    $l10n['repeat-all'] = esc_attr__('Repeat All', 'realtor');
    $l10n['repeat-x'] = esc_attr__('Repeat Horizontally', 'realtor');
    $l10n['repeat-y'] = esc_attr__('Repeat Vertically', 'realtor');
    $l10n['inherit'] = esc_attr__('Inherit', 'realtor');
    $l10n['background-repeat'] = esc_attr__('Background Repeat', 'realtor');
    $l10n['cover'] = esc_attr__('Cover', 'realtor');
    $l10n['contain'] = esc_attr__('Contain', 'realtor');
    $l10n['background-size'] = esc_attr__('Background Size', 'realtor');
    $l10n['fixed'] = esc_attr__('Fixed', 'realtor');
    $l10n['scroll'] = esc_attr__('Scroll', 'realtor');
    $l10n['background-attachment'] = esc_attr__('Background Attachment', 'realtor');
    $l10n['left-top'] = esc_attr__('Left Top', 'realtor');
    $l10n['left-center'] = esc_attr__('Left Center', 'realtor');
    $l10n['left-bottom'] = esc_attr__('Left Bottom', 'realtor');
    $l10n['right-top'] = esc_attr__('Right Top', 'realtor');
    $l10n['right-center'] = esc_attr__('Right Center', 'realtor');
    $l10n['right-bottom'] = esc_attr__('Right Bottom', 'realtor');
    $l10n['center-top'] = esc_attr__('Center Top', 'realtor');
    $l10n['center-center'] = esc_attr__('Center Center', 'realtor');
    $l10n['center-bottom'] = esc_attr__('Center Bottom', 'realtor');
    $l10n['background-position'] = esc_attr__('Background Position', 'realtor');
    $l10n['background-opacity'] = esc_attr__('Background Opacity', 'realtor');
    $l10n['on'] = esc_attr__('ON', 'realtor');
    $l10n['off'] = esc_attr__('OFF', 'realtor');
    $l10n['all'] = esc_attr__('All', 'realtor');
    $l10n['cyrillic'] = esc_attr__('Cyrillic', 'realtor');
    $l10n['cyrillic-ext'] = esc_attr__('Cyrillic Extended', 'realtor');
    $l10n['devanagari'] = esc_attr__('Devanagari', 'realtor');
    $l10n['greek'] = esc_attr__('Greek', 'realtor');
    $l10n['greek-ext'] = esc_attr__('Greek Extended', 'realtor');
    $l10n['khmer'] = esc_attr__('Khmer', 'realtor');
    $l10n['latin'] = esc_attr__('Latin', 'realtor');
    $l10n['latin-ext'] = esc_attr__('Latin Extended', 'realtor');
    $l10n['vietnamese'] = esc_attr__('Vietnamese', 'realtor');
    $l10n['hebrew'] = esc_attr__('Hebrew', 'realtor');
    $l10n['arabic'] = esc_attr__('Arabic', 'realtor');
    $l10n['bengali'] = esc_attr__('Bengali', 'realtor');
    $l10n['gujarati'] = esc_attr__('Gujarati', 'realtor');
    $l10n['tamil'] = esc_attr__('Tamil', 'realtor');
    $l10n['telugu'] = esc_attr__('Telugu', 'realtor');
    $l10n['thai'] = esc_attr__('Thai', 'realtor');
    $l10n['serif'] = _x('Serif', 'font style', 'realtor');
    $l10n['sans-serif'] = _x('Sans Serif', 'font style', 'realtor');
    $l10n['monospace'] = _x('Monospace', 'font style', 'realtor');
    $l10n['font-family'] = esc_attr__('Font Family', 'realtor');
    $l10n['font-size'] = esc_attr__('Font Size', 'realtor');
    $l10n['font-weight'] = esc_attr__('Font Weight', 'realtor');
    $l10n['line-height'] = esc_attr__('Line Height', 'realtor');
    $l10n['font-style'] = esc_attr__('Font Style', 'realtor');
    $l10n['letter-spacing'] = esc_attr__('Letter Spacing', 'realtor');
    $l10n['top'] = esc_attr__('Top', 'realtor');
    $l10n['bottom'] = esc_attr__('Bottom', 'realtor');
    $l10n['left'] = esc_attr__('Left', 'realtor');
    $l10n['right'] = esc_attr__('Right', 'realtor');
    $l10n['color'] = esc_attr__('Color', 'realtor');
    $l10n['add-image'] = esc_attr__('Add Image', 'realtor');
    $l10n['change-image'] = esc_attr__('Change Image', 'realtor');
    $l10n['remove'] = esc_attr__('Remove', 'realtor');
    $l10n['no-image-selected'] = esc_attr__('No Image Selected', 'realtor');
    $l10n['select-font-family'] = esc_attr__('Select a font-family', 'realtor');
    $l10n['variant'] = esc_attr__('Variant', 'realtor');
    $l10n['subsets'] = esc_attr__('Subset', 'realtor');
    $l10n['size'] = esc_attr__('Size', 'realtor');
    $l10n['height'] = esc_attr__('Height', 'realtor');
    $l10n['spacing'] = esc_attr__('Spacing', 'realtor');
    $l10n['ultra-light'] = esc_attr__('Ultra-Light 100', 'realtor');
    $l10n['ultra-light-italic'] = esc_attr__('Ultra-Light 100 Italic', 'realtor');
    $l10n['light'] = esc_attr__('Light 200', 'realtor');
    $l10n['light-italic'] = esc_attr__('Light 200 Italic', 'realtor');
    $l10n['book'] = esc_attr__('Book 300', 'realtor');
    $l10n['book-italic'] = esc_attr__('Book 300 Italic', 'realtor');
    $l10n['regular'] = esc_attr__('Normal 400', 'realtor');
    $l10n['italic'] = esc_attr__('Normal 400 Italic', 'realtor');
    $l10n['medium'] = esc_attr__('Medium 500', 'realtor');
    $l10n['medium-italic'] = esc_attr__('Medium 500 Italic', 'realtor');
    $l10n['semi-bold'] = esc_attr__('Semi-Bold 600', 'realtor');
    $l10n['semi-bold-italic'] = esc_attr__('Semi-Bold 600 Italic', 'realtor');
    $l10n['bold'] = esc_attr__('Bold 700', 'realtor');
    $l10n['bold-italic'] = esc_attr__('Bold 700 Italic', 'realtor');
    $l10n['extra-bold'] = esc_attr__('Extra-Bold 800', 'realtor');
    $l10n['extra-bold-italic'] = esc_attr__('Extra-Bold 800 Italic', 'realtor');
    $l10n['ultra-bold'] = esc_attr__('Ultra-Bold 900', 'realtor');
    $l10n['ultra-bold-italic'] = esc_attr__('Ultra-Bold 900 Italic', 'realtor');
    $l10n['invalid-value'] = esc_attr__('Invalid Value', 'realtor');

    return $l10n;

});

//Resizing Customizer Preview
function realtor_customizer_preview_size()
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

add_action('customize_controls_print_styles', 'realtor_customizer_preview_size');


//Registering Sidebars
register_sidebar(array(

    'name' => __('Sidebar', 'realtor'),
    'id' => 'sidebar-1',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => "</section>\n",
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => "</h2>\n",

));
register_sidebar(array(

    'name' => __('Blog', 'realtor'),
    'id' => 'blog-sidebar',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => "</section>\n",
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => "</h4>\n",

));
register_sidebar(array(

    'name' => __('Property Listing', 'realtor'),
    'id' => 'property-sidebar',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => "</li>\n",
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => "</h4>\n",

));

register_sidebars(3, array(

    'name' => __('Footer %d', 'realtor'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => "</section>\n",
    'before_title' => '<h6 class="widgettitle">',
    'after_title' => "</h6>\n",

));

//Get Pages List In Option

function realtor_get_page_list()
{
    $list_of_pages = get_pages();
    $return_options = [];

    foreach ($list_of_pages as $key => $value) {
        $return_options[get_page_link($value->ID)] = $value->post_title;

    }

    return $return_options;
}

function realtor_smk_font_awesome()
{
    return array(
        'fa-500px' => '500px',
        'fa-adjust' => 'Adjust',
        'fa-adn' => 'Adn',
        'fa-align-center' => 'Align center',
        'fa-align-justify' => 'Align justify',
        'fa-align-left' => 'Align left',
        'fa-align-right' => 'Align right',
        'fa-amazon' => 'Amazon',
        'fa-ambulance' => 'Ambulance',
        'fa-anchor' => 'Anchor',
        'fa-android' => 'Android',
        'fa-angellist' => 'Angellist',
        'fa-angle-double-down' => 'Angle double down',
        'fa-angle-double-left' => 'Angle double left',
        'fa-angle-double-right' => 'Angle double right',
        'fa-angle-double-up' => 'Angle double up',
        'fa-angle-down' => 'Angle down',
        'fa-angle-left' => 'Angle left',
        'fa-angle-right' => 'Angle right',
        'fa-angle-up' => 'Angle up',
        'fa-apple' => 'Apple',
        'fa-archive' => 'Archive',
        'fa-area-chart' => 'Area chart',
        'fa-arrow-circle-down' => 'Arrow circle down',
        'fa-arrow-circle-left' => 'Arrow circle left',
        'fa-arrow-circle-o-down' => 'Arrow circle o down',
        'fa-arrow-circle-o-left' => 'Arrow circle o left',
        'fa-arrow-circle-o-right' => 'Arrow circle o right',
        'fa-arrow-circle-o-up' => 'Arrow circle o up',
        'fa-arrow-circle-right' => 'Arrow circle right',
        'fa-arrow-circle-up' => 'Arrow circle up',
        'fa-arrow-down' => 'Arrow down',
        'fa-arrow-left' => 'Arrow left',
        'fa-arrow-right' => 'Arrow right',
        'fa-arrow-up' => 'Arrow up',
        'fa-arrows' => 'Arrows',
        'fa-arrows-alt' => 'Arrows alt',
        'fa-arrows-h' => 'Arrows h',
        'fa-arrows-v' => 'Arrows v',
        'fa-asterisk' => 'Asterisk',
        'fa-at' => 'At',
        'fa-backward' => 'Backward',
        'fa-balance-scale' => 'Balance scale',
        'fa-ban' => 'Ban',
        'fa-bar-chart' => 'Bar chart',
        'fa-barcode' => 'Barcode',
        'fa-bars' => 'Bars',
        'fa-battery-empty' => 'Battery empty',
        'fa-battery-full' => 'Battery full',
        'fa-battery-half' => 'Battery half',
        'fa-battery-quarter' => 'Battery quarter',
        'fa-battery-three-quarters' => 'Battery three quarters',
        'fa-bed' => 'Bed',
        'fa-beer' => 'Beer',
        'fa-behance' => 'Behance',
        'fa-behance-square' => 'Behance square',
        'fa-bell' => 'Bell',
        'fa-bell-o' => 'Bell o',
        'fa-bell-slash' => 'Bell slash',
        'fa-bell-slash-o' => 'Bell slash o',
        'fa-bicycle' => 'Bicycle',
        'fa-binoculars' => 'Binoculars',
        'fa-birthday-cake' => 'Birthday cake',
        'fa-bitbucket' => 'Bitbucket',
        'fa-bitbucket-square' => 'Bitbucket square',
        'fa-black-tie' => 'Black tie',
        'fa-bold' => 'Bold',
        'fa-bolt' => 'Bolt',
        'fa-bomb' => 'Bomb',
        'fa-book' => 'Book',
        'fa-bookmark' => 'Bookmark',
        'fa-bookmark-o' => 'Bookmark o',
        'fa-briefcase' => 'Briefcase',
        'fa-btc' => 'Btc',
        'fa-bug' => 'Bug',
        'fa-building' => 'Building',
        'fa-building-o' => 'Building o',
        'fa-bullhorn' => 'Bullhorn',
        'fa-bullseye' => 'Bullseye',
        'fa-bus' => 'Bus',
        'fa-buysellads' => 'Buysellads',
        'fa-calculator' => 'Calculator',
        'fa-calendar' => 'Calendar',
        'fa-calendar-check-o' => 'Calendar check o',
        'fa-calendar-minus-o' => 'Calendar minus o',
        'fa-calendar-o' => 'Calendar o',
        'fa-calendar-plus-o' => 'Calendar plus o',
        'fa-calendar-times-o' => 'Calendar times o',
        'fa-camera' => 'Camera',
        'fa-camera-retro' => 'Camera retro',
        'fa-car' => 'Car',
        'fa-caret-down' => 'Caret down',
        'fa-caret-left' => 'Caret left',
        'fa-caret-right' => 'Caret right',
        'fa-caret-square-o-down' => 'Caret square o down',
        'fa-caret-square-o-left' => 'Caret square o left',
        'fa-caret-square-o-right' => 'Caret square o right',
        'fa-caret-square-o-up' => 'Caret square o up',
        'fa-caret-up' => 'Caret up',
        'fa-cart-arrow-down' => 'Cart arrow down',
        'fa-cart-plus' => 'Cart plus',
        'fa-cc' => 'Cc',
        'fa-cc-amex' => 'Cc amex',
        'fa-cc-diners-club' => 'Cc diners club',
        'fa-cc-discover' => 'Cc discover',
        'fa-cc-jcb' => 'Cc jcb',
        'fa-cc-mastercard' => 'Cc mastercard',
        'fa-cc-paypal' => 'Cc paypal',
        'fa-cc-stripe' => 'Cc stripe',
        'fa-cc-visa' => 'Cc visa',
        'fa-certificate' => 'Certificate',
        'fa-chain-broken' => 'Chain broken',
        'fa-check' => 'Check',
        'fa-check-circle' => 'Check circle',
        'fa-check-circle-o' => 'Check circle o',
        'fa-check-square' => 'Check square',
        'fa-check-square-o' => 'Check square o',
        'fa-chevron-circle-down' => 'Chevron circle down',
        'fa-chevron-circle-left' => 'Chevron circle left',
        'fa-chevron-circle-right' => 'Chevron circle right',
        'fa-chevron-circle-up' => 'Chevron circle up',
        'fa-chevron-down' => 'Chevron down',
        'fa-chevron-left' => 'Chevron left',
        'fa-chevron-right' => 'Chevron right',
        'fa-chevron-up' => 'Chevron up',
        'fa-child' => 'Child',
        'fa-chrome' => 'Chrome',
        'fa-circle' => 'Circle',
        'fa-circle-o' => 'Circle o',
        'fa-circle-o-notch' => 'Circle o notch',
        'fa-circle-thin' => 'Circle thin',
        'fa-clipboard' => 'Clipboard',
        'fa-clock-o' => 'Clock o',
        'fa-clone' => 'Clone',
        'fa-cloud' => 'Cloud',
        'fa-cloud-download' => 'Cloud download',
        'fa-cloud-upload' => 'Cloud upload',
        'fa-code' => 'Code',
        'fa-code-fork' => 'Code fork',
        'fa-codepen' => 'Codepen',
        'fa-coffee' => 'Coffee',
        'fa-cog' => 'Cog',
        'fa-cogs' => 'Cogs',
        'fa-columns' => 'Columns',
        'fa-comment' => 'Comment',
        'fa-comment-o' => 'Comment o',
        'fa-commenting' => 'Commenting',
        'fa-commenting-o' => 'Commenting o',
        'fa-comments' => 'Comments',
        'fa-comments-o' => 'Comments o',
        'fa-compass' => 'Compass',
        'fa-compress' => 'Compress',
        'fa-connectdevelop' => 'Connectdevelop',
        'fa-contao' => 'Contao',
        'fa-copyright' => 'Copyright',
        'fa-creative-commons' => 'Creative commons',
        'fa-credit-card' => 'Credit card',
        'fa-crop' => 'Crop',
        'fa-crosshairs' => 'Crosshairs',
        'fa-css3' => 'Css3',
        'fa-cube' => 'Cube',
        'fa-cubes' => 'Cubes',
        'fa-cutlery' => 'Cutlery',
        'fa-dashcube' => 'Dashcube',
        'fa-database' => 'Database',
        'fa-delicious' => 'Delicious',
        'fa-desktop' => 'Desktop',
        'fa-deviantart' => 'Deviantart',
        'fa-diamond' => 'Diamond',
        'fa-digg' => 'Digg',
        'fa-dot-circle-o' => 'Dot circle o',
        'fa-download' => 'Download',
        'fa-dribbble' => 'Dribbble',
        'fa-dropbox' => 'Dropbox',
        'fa-drupal' => 'Drupal',
        'fa-eject' => 'Eject',
        'fa-ellipsis-h' => 'Ellipsis h',
        'fa-ellipsis-v' => 'Ellipsis v',
        'fa-empire' => 'Empire',
        'fa-envelope' => 'Envelope',
        'fa-envelope-o' => 'Envelope o',
        'fa-envelope-square' => 'Envelope square',
        'fa-eraser' => 'Eraser',
        'fa-eur' => 'Eur',
        'fa-exchange' => 'Exchange',
        'fa-exclamation' => 'Exclamation',
        'fa-exclamation-circle' => 'Exclamation circle',
        'fa-exclamation-triangle' => 'Exclamation triangle',
        'fa-expand' => 'Expand',
        'fa-expeditedssl' => 'Expeditedssl',
        'fa-external-link' => 'External link',
        'fa-external-link-square' => 'External link square',
        'fa-eye' => 'Eye',
        'fa-eye-slash' => 'Eye slash',
        'fa-eyedropper' => 'Eyedropper',
        'fa-facebook' => 'Facebook',
        'fa-facebook-official' => 'Facebook official',
        'fa-facebook-square' => 'Facebook square',
        'fa-fast-backward' => 'Fast backward',
        'fa-fast-forward' => 'Fast forward',
        'fa-fax' => 'Fax',
        'fa-female' => 'Female',
        'fa-fighter-jet' => 'Fighter jet',
        'fa-file' => 'File',
        'fa-file-archive-o' => 'File archive o',
        'fa-file-audio-o' => 'File audio o',
        'fa-file-code-o' => 'File code o',
        'fa-file-excel-o' => 'File excel o',
        'fa-file-image-o' => 'File image o',
        'fa-file-o' => 'File o',
        'fa-file-pdf-o' => 'File pdf o',
        'fa-file-powerpoint-o' => 'File powerpoint o',
        'fa-file-text' => 'File text',
        'fa-file-text-o' => 'File text o',
        'fa-file-video-o' => 'File video o',
        'fa-file-word-o' => 'File word o',
        'fa-files-o' => 'Files o',
        'fa-film' => 'Film',
        'fa-filter' => 'Filter',
        'fa-fire' => 'Fire',
        'fa-fire-extinguisher' => 'Fire extinguisher',
        'fa-firefox' => 'Firefox',
        'fa-flag' => 'Flag',
        'fa-flag-checkered' => 'Flag checkered',
        'fa-flag-o' => 'Flag o',
        'fa-flask' => 'Flask',
        'fa-flickr' => 'Flickr',
        'fa-floppy-o' => 'Floppy o',
        'fa-folder' => 'Folder',
        'fa-folder-o' => 'Folder o',
        'fa-folder-open' => 'Folder open',
        'fa-folder-open-o' => 'Folder open o',
        'fa-font' => 'Font',
        'fa-fonticons' => 'Fonticons',
        'fa-forumbee' => 'Forumbee',
        'fa-forward' => 'Forward',
        'fa-foursquare' => 'Foursquare',
        'fa-frown-o' => 'Frown o',
        'fa-futbol-o' => 'Futbol o',
        'fa-gamepad' => 'Gamepad',
        'fa-gavel' => 'Gavel',
        'fa-gbp' => 'Gbp',
        'fa-genderless' => 'Genderless',
        'fa-get-pocket' => 'Get pocket',
        'fa-gg' => 'Gg',
        'fa-gg-circle' => 'Gg circle',
        'fa-gift' => 'Gift',
        'fa-git' => 'Git',
        'fa-git-square' => 'Git square',
        'fa-github' => 'Github',
        'fa-github-alt' => 'Github alt',
        'fa-github-square' => 'Github square',
        'fa-glass' => 'Glass',
        'fa-globe' => 'Globe',
        'fa-google' => 'Google',
        'fa-google-plus' => 'Google plus',
        'fa-google-plus-square' => 'Google plus square',
        'fa-google-wallet' => 'Google wallet',
        'fa-graduation-cap' => 'Graduation cap',
        'fa-gratipay' => 'Gratipay',
        'fa-h-square' => 'H square',
        'fa-hacker-news' => 'Hacker news',
        'fa-hand-lizard-o' => 'Hand lizard o',
        'fa-hand-o-down' => 'Hand o down',
        'fa-hand-o-left' => 'Hand o left',
        'fa-hand-o-right' => 'Hand o right',
        'fa-hand-o-up' => 'Hand o up',
        'fa-hand-paper-o' => 'Hand paper o',
        'fa-hand-peace-o' => 'Hand peace o',
        'fa-hand-pointer-o' => 'Hand pointer o',
        'fa-hand-rock-o' => 'Hand rock o',
        'fa-hand-scissors-o' => 'Hand scissors o',
        'fa-hand-spock-o' => 'Hand spock o',
        'fa-hdd-o' => 'Hdd o',
        'fa-header' => 'Header',
        'fa-headphones' => 'Headphones',
        'fa-heart' => 'Heart',
        'fa-heart-o' => 'Heart o',
        'fa-heartbeat' => 'Heartbeat',
        'fa-history' => 'History',
        'fa-home' => 'Home',
        'fa-hospital-o' => 'Hospital o',
        'fa-hourglass' => 'Hourglass',
        'fa-hourglass-end' => 'Hourglass end',
        'fa-hourglass-half' => 'Hourglass half',
        'fa-hourglass-o' => 'Hourglass o',
        'fa-hourglass-start' => 'Hourglass start',
        'fa-houzz' => 'Houzz',
        'fa-html5' => 'Html5',
        'fa-i-cursor' => 'I cursor',
        'fa-ils' => 'Ils',
        'fa-inbox' => 'Inbox',
        'fa-indent' => 'Indent',
        'fa-industry' => 'Industry',
        'fa-info' => 'Info',
        'fa-info-circle' => 'Info circle',
        'fa-inr' => 'Inr',
        'fa-instagram' => 'Instagram',
        'fa-internet-explorer' => 'Internet explorer',
        'fa-ioxhost' => 'Ioxhost',
        'fa-italic' => 'Italic',
        'fa-joomla' => 'Joomla',
        'fa-jpy' => 'Jpy',
        'fa-jsfiddle' => 'Jsfiddle',
        'fa-key' => 'Key',
        'fa-keyboard-o' => 'Keyboard o',
        'fa-krw' => 'Krw',
        'fa-language' => 'Language',
        'fa-laptop' => 'Laptop',
        'fa-lastfm' => 'Lastfm',
        'fa-lastfm-square' => 'Lastfm square',
        'fa-leaf' => 'Leaf',
        'fa-leanpub' => 'Leanpub',
        'fa-lemon-o' => 'Lemon o',
        'fa-level-down' => 'Level down',
        'fa-level-up' => 'Level up',
        'fa-life-ring' => 'Life ring',
        'fa-lightbulb-o' => 'Lightbulb o',
        'fa-line-chart' => 'Line chart',
        'fa-link' => 'Link',
        'fa-linkedin' => 'Linkedin',
        'fa-linkedin-square' => 'Linkedin square',
        'fa-linux' => 'Linux',
        'fa-list' => 'List',
        'fa-list-alt' => 'List alt',
        'fa-list-ol' => 'List ol',
        'fa-list-ul' => 'List ul',
        'fa-location-arrow' => 'Location arrow',
        'fa-lock' => 'Lock',
        'fa-long-arrow-down' => 'Long arrow down',
        'fa-long-arrow-left' => 'Long arrow left',
        'fa-long-arrow-right' => 'Long arrow right',
        'fa-long-arrow-up' => 'Long arrow up',
        'fa-magic' => 'Magic',
        'fa-magnet' => 'Magnet',
        'fa-male' => 'Male',
        'fa-map' => 'Map',
        'fa-map-marker' => 'Map marker',
        'fa-map-o' => 'Map o',
        'fa-map-pin' => 'Map pin',
        'fa-map-signs' => 'Map signs',
        'fa-mars' => 'Mars',
        'fa-mars-double' => 'Mars double',
        'fa-mars-stroke' => 'Mars stroke',
        'fa-mars-stroke-h' => 'Mars stroke h',
        'fa-mars-stroke-v' => 'Mars stroke v',
        'fa-maxcdn' => 'Maxcdn',
        'fa-meanpath' => 'Meanpath',
        'fa-medium' => 'Medium',
        'fa-medkit' => 'Medkit',
        'fa-meh-o' => 'Meh o',
        'fa-mercury' => 'Mercury',
        'fa-microphone' => 'Microphone',
        'fa-microphone-slash' => 'Microphone slash',
        'fa-minus' => 'Minus',
        'fa-minus-circle' => 'Minus circle',
        'fa-minus-square' => 'Minus square',
        'fa-minus-square-o' => 'Minus square o',
        'fa-mobile' => 'Mobile',
        'fa-money' => 'Money',
        'fa-moon-o' => 'Moon o',
        'fa-motorcycle' => 'Motorcycle',
        'fa-mouse-pointer' => 'Mouse pointer',
        'fa-music' => 'Music',
        'fa-neuter' => 'Neuter',
        'fa-newspaper-o' => 'Newspaper o',
        'fa-object-group' => 'Object group',
        'fa-object-ungroup' => 'Object ungroup',
        'fa-odnoklassniki' => 'Odnoklassniki',
        'fa-odnoklassniki-square' => 'Odnoklassniki square',
        'fa-opencart' => 'Opencart',
        'fa-openid' => 'Openid',
        'fa-opera' => 'Opera',
        'fa-optin-monster' => 'Optin monster',
        'fa-outdent' => 'Outdent',
        'fa-pagelines' => 'Pagelines',
        'fa-paint-brush' => 'Paint brush',
        'fa-paper-plane' => 'Paper plane',
        'fa-paper-plane-o' => 'Paper plane o',
        'fa-paperclip' => 'Paperclip',
        'fa-paragraph' => 'Paragraph',
        'fa-pause' => 'Pause',
        'fa-paw' => 'Paw',
        'fa-paypal' => 'Paypal',
        'fa-pencil' => 'Pencil',
        'fa-pencil-square' => 'Pencil square',
        'fa-pencil-square-o' => 'Pencil square o',
        'fa-phone' => 'Phone',
        'fa-phone-square' => 'Phone square',
        'fa-picture-o' => 'Picture o',
        'fa-pie-chart' => 'Pie chart',
        'fa-pied-piper' => 'Pied piper',
        'fa-pied-piper-alt' => 'Pied piper alt',
        'fa-pinterest' => 'Pinterest',
        'fa-pinterest-p' => 'Pinterest p',
        'fa-pinterest-square' => 'Pinterest square',
        'fa-plane' => 'Plane',
        'fa-play' => 'Play',
        'fa-play-circle' => 'Play circle',
        'fa-play-circle-o' => 'Play circle o',
        'fa-plug' => 'Plug',
        'fa-plus' => 'Plus',
        'fa-plus-circle' => 'Plus circle',
        'fa-plus-square' => 'Plus square',
        'fa-plus-square-o' => 'Plus square o',
        'fa-power-off' => 'Power off',
        'fa-print' => 'Print',
        'fa-puzzle-piece' => 'Puzzle piece',
        'fa-qq' => 'Qq',
        'fa-qrcode' => 'Qrcode',
        'fa-question' => 'Question',
        'fa-question-circle' => 'Question circle',
        'fa-quote-left' => 'Quote left',
        'fa-quote-right' => 'Quote right',
        'fa-random' => 'Random',
        'fa-rebel' => 'Rebel',
        'fa-recycle' => 'Recycle',
        'fa-reddit' => 'Reddit',
        'fa-reddit-square' => 'Reddit square',
        'fa-refresh' => 'Refresh',
        'fa-registered' => 'Registered',
        'fa-renren' => 'Renren',
        'fa-repeat' => 'Repeat',
        'fa-reply' => 'Reply',
        'fa-reply-all' => 'Reply all',
        'fa-retweet' => 'Retweet',
        'fa-road' => 'Road',
        'fa-rocket' => 'Rocket',
        'fa-rss' => 'Rss',
        'fa-rss-square' => 'Rss square',
        'fa-rub' => 'Rub',
        'fa-safari' => 'Safari',
        'fa-scissors' => 'Scissors',
        'fa-search' => 'Search',
        'fa-search-minus' => 'Search minus',
        'fa-search-plus' => 'Search plus',
        'fa-sellsy' => 'Sellsy',
        'fa-server' => 'Server',
        'fa-share' => 'Share',
        'fa-share-alt' => 'Share alt',
        'fa-share-alt-square' => 'Share alt square',
        'fa-share-square' => 'Share square',
        'fa-share-square-o' => 'Share square o',
        'fa-shield' => 'Shield',
        'fa-ship' => 'Ship',
        'fa-shirtsinbulk' => 'Shirtsinbulk',
        'fa-shopping-cart' => 'Shopping cart',
        'fa-sign-in' => 'Sign in',
        'fa-sign-out' => 'Sign out',
        'fa-signal' => 'Signal',
        'fa-simplybuilt' => 'Simplybuilt',
        'fa-sitemap' => 'Sitemap',
        'fa-skyatlas' => 'Skyatlas',
        'fa-skype' => 'Skype',
        'fa-slack' => 'Slack',
        'fa-sliders' => 'Sliders',
        'fa-slideshare' => 'Slideshare',
        'fa-smile-o' => 'Smile o',
        'fa-sort' => 'Sort',
        'fa-sort-alpha-asc' => 'Sort alpha asc',
        'fa-sort-alpha-desc' => 'Sort alpha desc',
        'fa-sort-amount-asc' => 'Sort amount asc',
        'fa-sort-amount-desc' => 'Sort amount desc',
        'fa-sort-asc' => 'Sort asc',
        'fa-sort-desc' => 'Sort desc',
        'fa-sort-numeric-asc' => 'Sort numeric asc',
        'fa-sort-numeric-desc' => 'Sort numeric desc',
        'fa-soundcloud' => 'Soundcloud',
        'fa-space-shuttle' => 'Space shuttle',
        'fa-spinner' => 'Spinner',
        'fa-spoon' => 'Spoon',
        'fa-spotify' => 'Spotify',
        'fa-square' => 'Square',
        'fa-square-o' => 'Square o',
        'fa-stack-exchange' => 'Stack exchange',
        'fa-stack-overflow' => 'Stack overflow',
        'fa-star' => 'Star',
        'fa-star-half' => 'Star half',
        'fa-star-half-o' => 'Star half o',
        'fa-star-o' => 'Star o',
        'fa-steam' => 'Steam',
        'fa-steam-square' => 'Steam square',
        'fa-step-backward' => 'Step backward',
        'fa-step-forward' => 'Step forward',
        'fa-stethoscope' => 'Stethoscope',
        'fa-sticky-note' => 'Sticky note',
        'fa-sticky-note-o' => 'Sticky note o',
        'fa-stop' => 'Stop',
        'fa-street-view' => 'Street view',
        'fa-strikethrough' => 'Strikethrough',
        'fa-stumbleupon' => 'Stumbleupon',
        'fa-stumbleupon-circle' => 'Stumbleupon circle',
        'fa-subscript' => 'Subscript',
        'fa-subway' => 'Subway',
        'fa-suitcase' => 'Suitcase',
        'fa-sun-o' => 'Sun o',
        'fa-superscript' => 'Superscript',
        'fa-table' => 'Table',
        'fa-tablet' => 'Tablet',
        'fa-tachometer' => 'Tachometer',
        'fa-tag' => 'Tag',
        'fa-tags' => 'Tags',
        'fa-tasks' => 'Tasks',
        'fa-taxi' => 'Taxi',
        'fa-television' => 'Television',
        'fa-tencent-weibo' => 'Tencent weibo',
        'fa-terminal' => 'Terminal',
        'fa-text-height' => 'Text height',
        'fa-text-width' => 'Text width',
        'fa-th' => 'Th',
        'fa-th-large' => 'Th large',
        'fa-th-list' => 'Th list',
        'fa-thumb-tack' => 'Thumb tack',
        'fa-thumbs-down' => 'Thumbs down',
        'fa-thumbs-o-down' => 'Thumbs o down',
        'fa-thumbs-o-up' => 'Thumbs o up',
        'fa-thumbs-up' => 'Thumbs up',
        'fa-ticket' => 'Ticket',
        'fa-times' => 'Times',
        'fa-times-circle' => 'Times circle',
        'fa-times-circle-o' => 'Times circle o',
        'fa-tint' => 'Tint',
        'fa-toggle-off' => 'Toggle off',
        'fa-toggle-on' => 'Toggle on',
        'fa-trademark' => 'Trademark',
        'fa-train' => 'Train',
        'fa-transgender' => 'Transgender',
        'fa-transgender-alt' => 'Transgender alt',
        'fa-trash' => 'Trash',
        'fa-trash-o' => 'Trash o',
        'fa-tree' => 'Tree',
        'fa-trello' => 'Trello',
        'fa-tripadvisor' => 'Tripadvisor',
        'fa-trophy' => 'Trophy',
        'fa-truck' => 'Truck',
        'fa-try' => 'Try',
        'fa-tty' => 'Tty',
        'fa-tumblr' => 'Tumblr',
        'fa-tumblr-square' => 'Tumblr square',
        'fa-twitch' => 'Twitch',
        'fa-twitter' => 'Twitter',
        'fa-twitter-square' => 'Twitter square',
        'fa-umbrella' => 'Umbrella',
        'fa-underline' => 'Underline',
        'fa-undo' => 'Undo',
        'fa-university' => 'University',
        'fa-unlock' => 'Unlock',
        'fa-unlock-alt' => 'Unlock alt',
        'fa-upload' => 'Upload',
        'fa-usd' => 'Usd',
        'fa-user' => 'User',
        'fa-user-md' => 'User md',
        'fa-user-plus' => 'User plus',
        'fa-user-secret' => 'User secret',
        'fa-user-times' => 'User times',
        'fa-users' => 'Users',
        'fa-venus' => 'Venus',
        'fa-venus-double' => 'Venus double',
        'fa-video-camera' => 'Video camera',
        'fa-vimeo' => 'Vimeo',
        'fa-vimeo-square' => 'Vimeo square',
        'fa-vine' => 'Vine',
        'fa-vk' => 'Vk',
        'fa-volume-down' => 'Volume down',
        'fa-volume-off' => 'Volume off',
        'fa-volume-up' => 'Volume up',
        'fa-weibo' => 'Weibo',
        'fa-weixin' => 'Weixin',
        'fa-whatsapp' => 'Whatsapp',
        'fa-wheelchair' => 'Wheelchair',
        'fa-wifi' => 'Wifi',
        'fa-wikipedia-w' => 'Wikipedia w',
        'fa-windows' => 'Windows',
        'fa-wordpress' => 'Wordpress',
        'fa-wrench' => 'Wrench',
        'fa-xing' => 'Xing',
        'fa-xing-square' => 'Xing square',
        'fa-y-combinator' => 'Y combinator',
        'fa-yahoo' => 'Yahoo',
        'fa-yelp' => 'Yelp',
        'fa-youtube' => 'Youtube',
        'fa-youtube-play' => 'Youtube play',
        'fa-youtube-square' => 'Youtube square',
    );

}

//Adding search suggestions query var
//add_action( 'init',              'realtor_search_suggestions' );
//add_action( 'template_redirect', 'realtor_search_suggestions' );
//add_filter( 'request',           'realtor_search_suggestions' );

//function realtor_search_suggestions( $vars = '' )
//{
//    $hook = current_filter();
//
//    // load 'style.php' from the current theme.
//    'template_redirect' === $hook
//    && get_query_var( 'search-suggestions' )
//    && locate_template( 'inc/search-suggestions.php', TRUE, TRUE )
//    && exit;
//
//    // Add a rewrite rule.
//    'init' === $hook && add_rewrite_endpoint( 'search-suggestions', EP_ROOT );
//
//    // Make sure the variable is not empty.
//    'request' === $hook
//    && isset ( $vars['search-suggestions'] )
//    && empty ( $vars['search-suggestions'] )
//    && $vars['search-suggestions'] = 'default';
//
//    return $vars;
//}

//Adding dynamic css query var

add_action('init', 'realtor_php_style');
add_action('template_redirect', 'realtor_php_style');
add_filter('request', 'realtor_php_style');

function realtor_php_style($vars = '')
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

//Embedding dynamic CSS if customizer is on
if (is_customize_preview()) {
    function realtor_embedded_css_output()
    {
        echo '<style id="realtor-dynamic-embedded-css">';

        realtor_css();

        echo '</style>';
    }

// Output custom CSS to live site
    add_action('wp_head', 'realtor_embedded_css_output');
}

//Geat Realtor Primary Color
function realtor_get_primary_color()
{
    return get_theme_mod("realtor_styles_primary_color", REALTOR_PRIMARY_COLOR);
}


?>
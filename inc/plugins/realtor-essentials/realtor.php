<?php
/*
Plugin Name: poporealestate Essentials
Description: Used for importing/exporting customizer options.
Author:	poporealestate
Version: 1.2
*/

//Localities AJAX function

function poporealestate_home_localities()
{
    $paged=$_POST['paged'];
    $regular_posts_args = array(

        'post_type' => 'locality',
        'posts_per_page' => 6,
        'paged' => $paged

    );

    query_posts($regular_posts_args);

    if(intval($paged) % 2 == 0)
    {
        get_template_part("template-parts/localities-loop-flip");
    }
    else
    {
        get_template_part("template-parts/localities-loop");
    }
    $current_query = new WP_Query($regular_posts_args );
    echo '<input type="hidden" id="localities_total_pages" value="'.$current_query->max_num_pages.'">';

    wp_die();
}
add_action('wp_ajax_poporealestate_home_localities', 'poporealestate_home_localities');
add_action('wp_ajax_nopriv_poporealestate_home_localities', 'poporealestate_home_localities');

//Search suggestions AJAX function
function poporealestate_search_suggestions()
{

    $locations = [];

    $properties = get_posts(

        array(

            'post_type' => 'property',
            'posts_per_page' => -1,

        )
    );
    wp_reset_postdata();

    foreach ($properties as $property) {
        $locations[] = get_post_meta($property->ID, 'address')[0];
    }

    wp_send_json($locations);

    wp_die();

}

add_action('wp_ajax_poporealestate_search_suggestions', 'poporealestate_search_suggestions');
add_action('wp_ajax_nopriv_poporealestate_search_suggestions', 'poporealestate_search_suggestions');

//poporealestate Profile Fields
add_action('show_user_profile', 'extra_user_profile_fields');
add_action('edit_user_profile', 'extra_user_profile_fields');

function extra_user_profile_fields($user)
{
    ?>
    <h3><?php _e("poporealestate Profile Information", "poporealestate"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="profile-tagline"><?php _e("Profile Tagline", 'poporealestate'); ?></label></th>
            <td>
                <input type="text" name="profile-tagline" id="profile-tagline"
                       value="<?php echo esc_attr(get_the_author_meta('profile-tagline', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please write your profile tagline.", 'poporealestate'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="address"><?php _e("Address", 'poporealestate'); ?></label></th>
            <td>
                <input type="text" name="address" id="address"
                       value="<?php echo esc_attr(get_the_author_meta('address', $user->ID)); ?>" class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your address.", 'poporealestate'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="phonenumber"><?php _e("Phone Number", 'poporealestate'); ?></label></th>
            <td>
                <input type="text" name="phonenumber" id="address"
                       value="<?php echo esc_attr(get_the_author_meta('phonenumber', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your phonenumber.", 'poporealestate'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="facebook-url"><?php _e("Facebook URL", 'poporealestate'); ?></label></th>
            <td>
                <input type="text" name="facebook-url" id="facebook-url"
                       value="<?php echo esc_attr(get_the_author_meta('facebook-url', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your Facebook URL.", 'poporealestate'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter-url"><?php _e("Twitter URL", 'poporealestate'); ?></label></th>
            <td>
                <input type="text" name="twitter-url" id="twitter-url"
                       value="<?php echo esc_attr(get_the_author_meta('twitter-url', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your Twitter URL.", 'poporealestate'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="instagram-url"><?php _e("Instagram URL", 'poporealestate'); ?></label></th>
            <td>
                <input type="text" name="instagram-url" id="instagram-url"
                       value="<?php echo esc_attr(get_the_author_meta('instagram-url', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your Instagram URL.", 'poporealestate'); ?></span>
            </td>
        </tr>
        <th><label for="pinterest-url"><?php _e("Pinterest URL", 'poporealestate'); ?></label></th>
        <td>
            <input type="text" name="pinterest-url" id="pinterest-url"
                   value="<?php echo esc_attr(get_the_author_meta('pinterest-url', $user->ID)); ?>"
                   class="regular-text"/><br/>
            <span class="description"><?php _e("Please enter your Pinterest URL.", 'poporealestate'); ?></span>
        </td>
        </tr>
        <th><label for="googleplus-url"><?php _e("Google+ URL", 'poporealestate'); ?></label></th>
        <td>
            <input type="text" name="googleplus-url" id="googleplus-url"
                   value="<?php echo esc_attr(get_the_author_meta('googleplus-url', $user->ID)); ?>"
                   class="regular-text"/><br/>
            <span class="description"><?php _e("Please enter your Google+ URL.", 'poporealestate'); ?></span>
        </td>
        </tr>
        <th><label for="tumblr-url"><?php _e("Tumblr URL", 'poporealestate'); ?></label></th>
        <td>
            <input type="text" name="tumblr-url" id="tumblr-url"
                   value="<?php echo esc_attr(get_the_author_meta('tumblr-url', $user->ID)); ?>"
                   class="regular-text"/><br/>
            <span class="description"><?php _e("Please enter your Tumblr URL.", 'poporealestate'); ?></span>
        </td>
        </tr>
        <tr>
        <th><label for="tumblr-url"><?php _e("Show email address on agent profile", 'poporealestate'); ?></label></th>
        <td>
            <input type="checkbox" name="email-show" id="tumblr-url"
                   value="<?php echo esc_attr(get_the_author_meta('show-email-address', $user->ID)); ?>"
                   class="regular-text"/><br/>
            <span class="description"><?php _e("Check this to show email address on agent profile.", 'poporealestate'); ?></span>
        </td>
        </tr>
    </table>
<?php }

add_action('personal_options_update', 'save_extra_user_profile_fields');
add_action('edit_user_profile_update', 'save_extra_user_profile_fields');

function save_extra_user_profile_fields($user_id)
{

    if (!current_user_can('edit_user', $user_id)) {
        return false;
    }

    update_user_meta($user_id, 'profile-tagline', $_POST['profile-tagline']);
    update_user_meta($user_id, 'address', $_POST['address']);
    update_user_meta($user_id, 'phonenumber', $_POST['phonenumber']);
    update_user_meta($user_id, 'facebook-url', $_POST['facebook-url']);
    update_user_meta($user_id, 'twitter-url', $_POST['twitter-url']);
    update_user_meta($user_id, 'instagram-url', $_POST['instagram-url']);
    update_user_meta($user_id, 'pinterest-url', $_POST['pinterest-url']);
    update_user_meta($user_id, 'googleplus-url', $_POST['googleplus-url']);
    update_user_meta($user_id, 'tumblr-url', $_POST['tumblr-url']);
    update_user_meta($user_id, 'show-email-address', $_POST['email-show']);
}
//Property Meta Boxes

add_filter('rwmb_meta_boxes', 'poporealestate_meta_boxes');

function poporealestate_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Property Details', 'poporealestate'),
        'post_types' => 'property',
        'fields' => array(
            array(
                'id' => 'features',
                'name' => __('Features', 'poporealestate'),
                'clone' => 'true',
                'type' => 'text_list',
                'options' => array(
                    'Feature Name' => __('', 'poporealestate'),
                ),
            ),
            array(
                'id' => 'address',
                'name' => __('Address', 'poporealestate'),
                'type' => 'text',
            ),
            array(
                'id' => 'address-map',
                'name' => __('Location on Map', 'poporealestate'),
                'type' => 'map',
                'address_field' => 'address',
                'api_key' => get_theme_mod('poporealestate_google_maps_api_key')
            ),
            array(
                'id' => 'attachments',
                'name' => __('Floor Plans & Other Attachments', 'poporealestate'),
                'type' => 'image_upload',
            ),
            array(
                'id' => 'beds',
                'name' => __('No. of Beds', 'poporealestate'),
                'type' => 'number',
            ),
            array(
                'id' => 'baths',
                'name' => __('No. of Baths', 'poporealestate'),
                'type' => 'number',
            ),
            array(
                'id' => 'area',
                'name' => __('Area (Sq Feet)', 'poporealestate'),
                'type' => 'text',
            ),
            array(
                'id' => 'parking',
                'name' => __('Parking', 'poporealestate'),
                'type' => 'text',
            ),
            array(
                'id' => 'price',
                'name' => __('Price', 'poporealestate'),
                'type' => 'number',
            ),
            array(
                'id' => 'featured',
                'name' => __('Featured Property', 'poporealestate'),
                'type' => 'checkbox',
            ),

        ),


    );
    return $meta_boxes;
}

//Testimonial Meta Boxes

add_filter('rwmb_meta_boxes', 'poporealestate_testimonials_meta_boxes');

function poporealestate_testimonials_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Testimonial Details', 'poporealestate'),
        'post_types' => 'testimonial',
        'fields' => array(

            array(
                'id' => 'name',
                'name' => __('Name', 'poporealestate'),
                'type' => 'text',
            ),
            array(
                'id' => 'tagline',
                'name' => __('Tagline', 'poporealestate'),
                'type' => 'text',
            ),

        ),


    );


    return $meta_boxes;
}

//Localities Meta Boxes
function poporealestate_localities_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Locality Details', 'poporealestate'),
        'post_types' => 'locality',
        'fields' => array(
            array(
            'id' => 'address-locality',
            'name' => __('Address', 'poporealestate'),
            'type' => 'text',
        ),
            array(
                'id' => 'address-map-localoty',
                'name' => __('Location on Map', 'poporealestate'),
                'type' => 'map',
                'address_field' => 'address-locality',
                'api_key' => 'AIzaSyBQs6Z-1uzgEy7UFKrNjOK8eCCKHiTSHAs'
            ),)


    );


    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'poporealestate_localities_meta_boxes');
function poporealestate_localities_post_type()
{
    $labels = array(
        'name' => _x('Localities', 'Post Type General Name', 'poporealestate'),
        'singular name' => _x('Locality', 'Post Type Singular Name', 'poporealestate'),
        'menu_name' => __('Localities', 'poporealestate'),
        'all_items' => __('All Localities', 'poporealestate'),
        'view_item' => __('View Locality', 'poporealestate'),
        'add_new_item' => __('Add New Locality', 'poporealestate'),
        'add_new' => __('Add New', 'poporealestate'),
        'edit_item' => __('Edit Locality', 'poporealestate'),
        'update_item' => __('Update Locality', 'poporealestate'),
        'search_item' => __('Search Locality', 'poporealestate'),
        'not_found' => __('Not Found', 'poporealestate'),
        'not_found_in_trash' => __('Not Found In Trash', 'poporealestate'),
        'featured_image' => __('Locality Featured Image', 'poporealestate'),
        'set_featured_image' => __('Set Featured image', 'poporealestate')


    );

    $args = array(

        'label' => __('locality', 'poporealestate'),
        'description' => __('Localities', 'poporealestate'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 8,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'menu_icon' => 'dashicons-location-alt',


    );

    register_post_type('locality', $args);

}

add_action('init', 'poporealestate_localities_post_type', 2);

function poporealestate_testimonials_post_type()
{
    $labels = array(
        'name' => _x('Testimonials', 'Post Type General Name', 'poporealestate'),
        'singular name' => _x('Testimonial', 'Post Type Singular Name', 'poporealestate'),
        'menu_name' => __('Testimonials', 'poporealestate'),
        'all_items' => __('All Testimonials', 'poporealestate'),
        'view_item' => __('View Testimonial', 'poporealestate'),
        'add_new_item' => __('Add New Testimonial', 'poporealestate'),
        'add_new' => __('Add New', 'poporealestate'),
        'edit_item' => __('Edit Testimonial', 'poporealestate'),
        'update_item' => __('Update Testimonial', 'poporealestate'),
        'search_item' => __('Search Testimonial', 'poporealestate'),
        'not_found' => __('Not Found', 'poporealestate'),
        'not_found_in_trash' => __('Not Found In Trash', 'poporealestate'),


    );

    $args = array(

        'label' => __('Testimonial', 'poporealestate'),
        'description' => __('Testimonials', 'poporealestate'),
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 9,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => false,
        'menu_icon' => 'dashicons-smiley',


    );

    register_post_type('testimonial', $args);

}

add_action('init', 'poporealestate_testimonials_post_type', 3);

function poporealestate_properties_post_type()
{
    $labels = array(
        'name' => _x('Properties', 'Post Type General Name', 'poporealestate'),
        'singular name' => _x('Property', 'Post Type Singular Name', 'poporealestate'),
        'menu_name' => __('Properties', 'poporealestate'),
        'all_items' => __('All Properties', 'poporealestate'),
        'view_item' => __('View Property', 'poporealestate'),
        'add_new_item' => __('Add New Property', 'poporealestate'),
        'add_new' => __('Add New', 'poporealestate'),
        'edit_item' => __('Edit Property', 'poporealestate'),
        'update_item' => __('Update Property', 'poporealestate'),
        'search_item' => __('Search Property', 'poporealestate'),
        'not_found' => __('Not Found', 'poporealestate'),
        'not_found_in_trash' => __('Not Found In Trash', 'poporealestate'),
        'featured_image' => __('Property Featured Image', 'poporealestate'),
        'set_featured_image' => __('Set Featured image', 'poporealestate')


    );

    $args = array(

        'label' => __('property', 'poporealestate'),
        'description' => __('Properties', 'poporealestate'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'comments'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 7,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'menu_icon' => 'dashicons-admin-home',


    );

    register_post_type('property', $args);

}

add_action('init', 'poporealestate_properties_post_type', 1);

function poporealestate_property_type_taxonomy()
{
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x('Property Types', 'taxonomy general name', 'poporealestate'),
        'singular_name' => _x('Property Type', 'taxonomy singular name', 'poporealestate'),
        'search_items' => __('Search Property Types', 'poporealestate'),
        'popular_items' => __('Popular Property Types', 'poporealestate'),
        'all_items' => __('All Property Types', 'poporealestate'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Property Type', 'poporealestate'),
        'update_item' => __('Update Property Type', 'poporealestate'),
        'add_new_item' => __('Add New Property Type', 'poporealestate'),
        'new_item_name' => __('New Property Type', 'poporealestate'),
        'separate_items_with_commas' => __('Separate Property Types with commas', 'poporealestate'),
        'add_or_remove_items' => __('Add or remove property types', 'poporealestate'),
        'choose_from_most_used' => __('Choose from the most used property types', 'poporealestate'),
        'not_found' => __('No menu property types found.', 'poporealestate'),
        'menu_name' => __('Property Types', 'poporealestate'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => __('property-type', 'poporealestate')),
    );

    register_taxonomy('property_types', 'property', $args);
}

add_action('init', 'poporealestate_property_type_taxonomy');

function poporealestate_property_status_taxonomy()
{
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x('Property Statuses', 'taxonomy general name', 'poporealestate'),
        'singular_name' => _x('Property Status', 'taxonomy singular name', 'poporealestate'),
        'search_items' => __('Search Property Statuses', 'poporealestate'),
        'popular_items' => __('Popular Property Statuses', 'poporealestate'),
        'all_items' => __('All Property Statuses', 'poporealestate'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Property Status', 'poporealestate'),
        'update_item' => __('Update Property Status', 'poporealestate'),
        'add_new_item' => __('Add New Property Status', 'poporealestate'),
        'new_item_name' => __('New Property Status', 'poporealestate'),
        'separate_items_with_commas' => __('Separate Property Statuses with commas', 'poporealestate'),
        'add_or_remove_items' => __('Add or remove property statuses', 'poporealestate'),
        'choose_from_most_used' => __('Choose from the most used property statuses', 'poporealestate'),
        'not_found' => __('No menu property statuses found.', 'poporealestate'),
        'menu_name' => __('Property Statuses', 'poporealestate'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => __('property-status', 'poporealestate')),
    );

    register_taxonomy('property_statuses', 'property', $args);
}
add_action('init', 'poporealestate_property_status_taxonomy');

add_filter('rwmb_meta_boxes', 'poporealestate_localities_meta_boxes');

//Feature Boxes Post Type
function poporealestate_feature_boxes_post_type()
{
    $labels = array(
        'name' => _x('Feature Boxes', 'Post Type General Name', 'poporealestate'),
        'singular name' => _x('Feature Box', 'Post Type Singular Name', 'poporealestate'),
        'menu_name' => __('Feature Boxes', 'poporealestate'),
        'all_items' => __('All Feature Boxes', 'poporealestate'),
        'view_item' => __('View Feature Box', 'poporealestate'),
        'add_new_item' => __('Add New Feature Box', 'poporealestate'),
        'add_new' => __('Add New', 'poporealestate'),
        'edit_item' => __('Edit Feature Box', 'poporealestate'),
        'update_item' => __('Update Feature Box', 'poporealestate'),
        'search_item' => __('Search Feature Box', 'poporealestate'),
        'not_found' => __('Not Found', 'poporealestate'),
        'not_found_in_trash' => __('Not Found In Trash', 'poporealestate'),
        'set_featured_image' => __('Set Featured image', 'poporealestate')


    );

    $args = array(

        'label' => __('Feature Box', 'poporealestate'),
        'description' => __('Feature Boxes', 'poporealestate'),
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'menu_icon' => 'dashicons-exerpt-view',


    );

    register_post_type('feature-box', $args);

}

add_action('init', 'poporealestate_feature_boxes_post_type', 0);

//Feature Boxes Meta Boxes
add_filter('rwmb_meta_boxes', 'poporealestate_feature_boxes_meta_boxes');

function poporealestate_feature_boxes_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Feature Box Options', 'poporealestate'),
        'post_types' => 'feature-box',
        'fields' => array(
            array(
                'id' => 'icon',
                'name' => __('Icon', 'poporealestate'),
                'type' => 'select',
                'options' => poporealestate_smk_font_awesome()
            ),
            array(
                'id' => 'url',
                'name' => __('Url', 'poporealestate'),
                'type' => 'text',
            ),


        ),


    );
    return $meta_boxes;
}
?>
<?php
/*
Plugin Name: Realtor Post Types
Description: Used for importing/exporting customizer options.
Author:	PopoThemes
Version: 1.1
*/

//Localities AJAX function

function realtor_home_localities()
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
add_action('wp_ajax_realtor_home_localities', 'realtor_home_localities');
add_action('wp_ajax_nopriv_realtor_home_localities', 'realtor_home_localities');

//Search suggestions AJAX function
function realtor_search_suggestions()
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

add_action('wp_ajax_realtor_search_suggestions', 'realtor_search_suggestions');
add_action('wp_ajax_nopriv_realtor_search_suggestions', 'realtor_search_suggestions');

//Realtor Profile Fields
add_action('show_user_profile', 'extra_user_profile_fields');
add_action('edit_user_profile', 'extra_user_profile_fields');

function extra_user_profile_fields($user)
{
    ?>
    <h3><?php _e("Realtor Profile Information", "realtor"); ?></h3>

    <table class="form-table">
        <tr>
            <th><label for="profile-tagline"><?php _e("Profile Tagline", 'realtor'); ?></label></th>
            <td>
                <input type="text" name="profile-tagline" id="profile-tagline"
                       value="<?php echo esc_attr(get_the_author_meta('profile-tagline', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please write your profile tagline.", 'realtor'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="address"><?php _e("Address", 'realtor'); ?></label></th>
            <td>
                <input type="text" name="address" id="address"
                       value="<?php echo esc_attr(get_the_author_meta('address', $user->ID)); ?>" class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your address.", 'realtor'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="phonenumber"><?php _e("Phone Number", 'realtor'); ?></label></th>
            <td>
                <input type="text" name="phonenumber" id="address"
                       value="<?php echo esc_attr(get_the_author_meta('phonenumber', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your phonenumber.", 'realtor'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="facebook-url"><?php _e("Facebook URL", 'realtor'); ?></label></th>
            <td>
                <input type="text" name="facebook-url" id="facebook-url"
                       value="<?php echo esc_attr(get_the_author_meta('facebook-url', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your Facebook URL.", 'realtor'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="twitter-url"><?php _e("Twitter URL", 'realtor'); ?></label></th>
            <td>
                <input type="text" name="twitter-url" id="twitter-url"
                       value="<?php echo esc_attr(get_the_author_meta('twitter-url', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your Twitter URL.", 'realtor'); ?></span>
            </td>
        </tr>
        <tr>
            <th><label for="instagram-url"><?php _e("Instagram URL", 'realtor'); ?></label></th>
            <td>
                <input type="text" name="instagram-url" id="instagram-url"
                       value="<?php echo esc_attr(get_the_author_meta('instagram-url', $user->ID)); ?>"
                       class="regular-text"/><br/>
                <span class="description"><?php _e("Please enter your Instagram URL.", 'realtor'); ?></span>
            </td>
        </tr>
        <th><label for="pinterest-url"><?php _e("Pinterest URL", 'realtor'); ?></label></th>
        <td>
            <input type="text" name="pinterest-url" id="pinterest-url"
                   value="<?php echo esc_attr(get_the_author_meta('pinterest-url', $user->ID)); ?>"
                   class="regular-text"/><br/>
            <span class="description"><?php _e("Please enter your Pinterest URL.", 'realtor'); ?></span>
        </td>
        </tr>
        <th><label for="googleplus-url"><?php _e("Google+ URL", 'realtor'); ?></label></th>
        <td>
            <input type="text" name="googleplus-url" id="googleplus-url"
                   value="<?php echo esc_attr(get_the_author_meta('googleplus-url', $user->ID)); ?>"
                   class="regular-text"/><br/>
            <span class="description"><?php _e("Please enter your Google+ URL.", 'realtor'); ?></span>
        </td>
        </tr>
        <th><label for="tumblr-url"><?php _e("Tumblr URL", 'realtor'); ?></label></th>
        <td>
            <input type="text" name="tumblr-url" id="tumblr-url"
                   value="<?php echo esc_attr(get_the_author_meta('tumblr-url', $user->ID)); ?>"
                   class="regular-text"/><br/>
            <span class="description"><?php _e("Please enter your Tumblr URL.", 'realtor'); ?></span>
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
}
//Property Meta Boxes

add_filter('rwmb_meta_boxes', 'realtor_meta_boxes');

function realtor_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Property Details', 'realtor'),
        'post_types' => 'property',
        'fields' => array(
            array(
                'id' => 'features',
                'name' => __('Features', 'realtor'),
                'clone' => 'true',
                'type' => 'text_list',
                'options' => array(
                    'Feature Name' => __('', 'realtor'),
                ),
            ),
            array(
                'id' => 'address',
                'name' => __('Address', 'realtor'),
                'type' => 'text',
            ),
            array(
                'id' => 'address-map',
                'name' => __('Location on Map', 'realtor'),
                'type' => 'map',
                'address_field' => 'address',
                'api_key' => get_theme_mod('realtor_google_maps_api_key')
            ),
            array(
                'id' => 'attachments',
                'name' => __('Floor Plans & Other Attachments', 'realtor'),
                'type' => 'image_upload',
            ),
            array(
                'id' => 'beds',
                'name' => __('No. of Beds', 'realtor'),
                'type' => 'number',
            ),
            array(
                'id' => 'baths',
                'name' => __('No. of Baths', 'realtor'),
                'type' => 'number',
            ),
            array(
                'id' => 'area',
                'name' => __('Area (Sq Feet)', 'realtor'),
                'type' => 'text',
            ),
            array(
                'id' => 'parking',
                'name' => __('Parking', 'realtor'),
                'type' => 'text',
            ),
            array(
                'id' => 'price',
                'name' => __('Price', 'realtor'),
                'type' => 'number',
            ),
            array(
                'id' => 'featured',
                'name' => __('Featured Property', 'realtor'),
                'type' => 'checkbox',
            ),

        ),


    );
    return $meta_boxes;
}

//Testimonial Meta Boxes

add_filter('rwmb_meta_boxes', 'realtor_testimonials_meta_boxes');

function realtor_testimonials_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Testimonial Details', 'realtor'),
        'post_types' => 'testimonial',
        'fields' => array(

            array(
                'id' => 'name',
                'name' => __('Name', 'realtor'),
                'type' => 'text',
            ),
            array(
                'id' => 'tagline',
                'name' => __('Tagline', 'realtor'),
                'type' => 'text',
            ),

        ),


    );


    return $meta_boxes;
}

//Localities Meta Boxes
function realtor_localities_meta_boxes($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Locality Details', 'realtor'),
        'post_types' => 'locality',
        'fields' => array(
            array(
            'id' => 'address-locality',
            'name' => __('Address', 'realtor'),
            'type' => 'text',
        ),
            array(
                'id' => 'address-map-localoty',
                'name' => __('Location on Map', 'realtor'),
                'type' => 'map',
                'address_field' => 'address-locality',
                'api_key' => 'AIzaSyBQs6Z-1uzgEy7UFKrNjOK8eCCKHiTSHAs'
            ),)


    );


    return $meta_boxes;
}
add_filter('rwmb_meta_boxes', 'realtor_localities_meta_boxes');
function realtor_localities_post_type()
{
    $labels = array(
        'name' => _x('Localities', 'Post Type General Name', 'realtor'),
        'singular name' => _x('Locality', 'Post Type Singular Name', 'realtor'),
        'menu_name' => __('Localities', 'realtor'),
        'all_items' => __('All Localities', 'realtor'),
        'view_item' => __('View Locality', 'realtor'),
        'add_new_item' => __('Add New Locality', 'realtor'),
        'add_new' => __('Add New', 'realtor'),
        'edit_item' => __('Edit Locality', 'realtor'),
        'update_item' => __('Update Locality', 'realtor'),
        'search_item' => __('Search Locality', 'realtor'),
        'not_found' => __('Not Found', 'realtor'),
        'not_found_in_trash' => __('Not Found In Trash', 'realtor'),
        'featured_image' => __('Locality Featured Image', 'realtor'),
        'set_featured_image' => __('Set Featured image', 'realtor')


    );

    $args = array(

        'label' => __('locality', 'realtor'),
        'description' => __('Localities', 'realtor'),
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
        'publicly_queryable' => true,
        'menu_icon' => 'dashicons-location-alt',


    );

    register_post_type('locality', $args);

}

add_action('init', 'realtor_localities_post_type', 0);

function realtor_testimonials_post_type()
{
    $labels = array(
        'name' => _x('Testimonials', 'Post Type General Name', 'realtor'),
        'singular name' => _x('Testimonial', 'Post Type Singular Name', 'realtor'),
        'menu_name' => __('Testimonials', 'realtor'),
        'all_items' => __('All Testimonials', 'realtor'),
        'view_item' => __('View Testimonial', 'realtor'),
        'add_new_item' => __('Add New Testimonial', 'realtor'),
        'add_new' => __('Add New', 'realtor'),
        'edit_item' => __('Edit Testimonial', 'realtor'),
        'update_item' => __('Update Testimonial', 'realtor'),
        'search_item' => __('Search Testimonial', 'realtor'),
        'not_found' => __('Not Found', 'realtor'),
        'not_found_in_trash' => __('Not Found In Trash', 'realtor'),


    );

    $args = array(

        'label' => __('Testimonial', 'realtor'),
        'description' => __('Testimonials', 'realtor'),
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
        'publicly_queryable' => true,
        'menu_icon' => 'dashicons-smiley',


    );

    register_post_type('testimonial', $args);

}

add_action('init', 'realtor_testimonials_post_type', 0);

function realtor_properties_post_type()
{
    $labels = array(
        'name' => _x('Properties', 'Post Type General Name', 'realtor'),
        'singular name' => _x('Property', 'Post Type Singular Name', 'realtor'),
        'menu_name' => __('Properties', 'realtor'),
        'all_items' => __('All Properties', 'realtor'),
        'view_item' => __('View Property', 'realtor'),
        'add_new_item' => __('Add New Property', 'realtor'),
        'add_new' => __('Add New', 'realtor'),
        'edit_item' => __('Edit Property', 'realtor'),
        'update_item' => __('Update Property', 'realtor'),
        'search_item' => __('Search Property', 'realtor'),
        'not_found' => __('Not Found', 'realtor'),
        'not_found_in_trash' => __('Not Found In Trash', 'realtor'),
        'featured_image' => __('Property Featured Image', 'realtor'),
        'set_featured_image' => __('Set Featured image', 'realtor')


    );

    $args = array(

        'label' => __('property', 'realtor'),
        'description' => __('Properties', 'realtor'),
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

add_action('init', 'realtor_properties_post_type', 0);

function realtor_property_type_taxonomy()
{
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x('Property Types', 'taxonomy general name', 'realtor'),
        'singular_name' => _x('Property Type', 'taxonomy singular name', 'realtor'),
        'search_items' => __('Search Property Types', 'realtor'),
        'popular_items' => __('Popular Property Types', 'realtor'),
        'all_items' => __('All Property Types', 'realtor'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Property Type', 'realtor'),
        'update_item' => __('Update Property Type', 'realtor'),
        'add_new_item' => __('Add New Property Type', 'realtor'),
        'new_item_name' => __('New Property Type', 'realtor'),
        'separate_items_with_commas' => __('Separate Property Types with commas', 'realtor'),
        'add_or_remove_items' => __('Add or remove property types', 'realtor'),
        'choose_from_most_used' => __('Choose from the most used property types', 'realtor'),
        'not_found' => __('No menu property types found.', 'realtor'),
        'menu_name' => __('Property Types', 'realtor'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => __('property-type', 'realtor')),
    );

    register_taxonomy('property_types', 'property', $args);
}

add_action('init', 'realtor_property_type_taxonomy');

function realtor_property_status_taxonomy()
{
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x('Property Statuses', 'taxonomy general name', 'realtor'),
        'singular_name' => _x('Property Status', 'taxonomy singular name', 'realtor'),
        'search_items' => __('Search Property Statuses', 'realtor'),
        'popular_items' => __('Popular Property Statuses', 'realtor'),
        'all_items' => __('All Property Statuses', 'realtor'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Property Status', 'realtor'),
        'update_item' => __('Update Property Status', 'realtor'),
        'add_new_item' => __('Add New Property Status', 'realtor'),
        'new_item_name' => __('New Property Status', 'realtor'),
        'separate_items_with_commas' => __('Separate Property Statuses with commas', 'realtor'),
        'add_or_remove_items' => __('Add or remove property statuses', 'realtor'),
        'choose_from_most_used' => __('Choose from the most used property statuses', 'realtor'),
        'not_found' => __('No menu property statuses found.', 'realtor'),
        'menu_name' => __('Property Statuses', 'realtor'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => __('property-status', 'realtor')),
    );

    register_taxonomy('property_statuses', 'property', $args);
}
add_action('init', 'realtor_property_status_taxonomy');



//function realtor_page_function()
//{
//}
?>
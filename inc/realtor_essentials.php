<?php
//TGM Plugin Activation
add_action('tgmpa_register', 'realtor_register_required_plugins');

//Social Icons

function realtor_get_social_icons()
{
    $social_icons = '<ul class="social-media">';
    if (trim(get_theme_mod('realtor_social_icon_facebook', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_facebook') . '" class="fb"><i class="fa fa-facebook"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_twitter', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_twitter') . '" class="tt"><i class="fa fa-twitter"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_pinterest', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_pinterest') . '" class="tt"><i class="fa fa-pinterest-p"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_googleplus', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_googleplus') . '" class="tt"><i class="fa fa-googleplus"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_tumblr', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_tumblr') . '" class="tt"><i class="fa fa-tumblr"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_stumbleupon', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_stumbleupon') . '" class="tt"><i class="fa fa-stumbleupon"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_wordpress', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_wordpress') . '" class="tt"><i class="fa fa-wordpress"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_instagram', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_instagram') . '" class="tt"><i class="fa fa-instagram"></i></a></li>';

    }
    if (trim(get_theme_mod('realtor_social_icon_dribbble', '')) != '') {

        $social_icons = $social_icons . '<li><a href="' . get_theme_mod('realtor_social_icon_dribbble') . '" class="tt"><i class="fa fa-dribbble"></i></a></li>';

    }


    $social_icons = $social_icons . '</ul>';

    return $social_icons;
}

function realtor_register_required_plugins()
{

    $plugins = array(

        array(
            'name' => 'Meta Box',
            'slug' => 'meta-box',
            'required' => true,
        ),
        array(
            'name' => 'Kirki',
            'slug' => 'kirki',
            'required' => true,
        ),
        array(
            'name' => 'Display Tweets',
            'slug' => 'display-tweets-php',
            'required' => false,
        ),
        array(
            'name'               => 'Realtor Post Types', // The plugin name.
            'slug'               => 'realtor-post-types', // The plugin slug (typically the folder name).
            'source'             => get_template_directory() . '/inc/plugins/realtor-post-types.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),


        $config = array(
            'id' => 'realtor',             // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu' => 'tgmpa-install-plugins', // Menu slug.
            'has_notices' => true,                    // Show admin notices or not.
            'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message' => '',                      // Message to output right before the plugins table.

        ));

    tgmpa($plugins, $config);
}
?>
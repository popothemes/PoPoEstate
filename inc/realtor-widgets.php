<?php
require_once(dirname(__FILE__) .'/TwitterAPIExchange.php');

class Realtor_Property_Search extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'realtor-property-search',
            'description' => 'Property Search',
        );
        parent::__construct( 'realtor-property-search', 'Realtor Property Search', $widget_ops );
    }

    public function widget( $args, $instance ) {
        get_template_part("template-parts/property-search-sidebar");
    }


    public function form( $instance ) {
        // outputs the options form on admin
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'Realtor_Property_Search' );
});

class Realtor_Featured_Properties extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'realtor-featured-properties',
            'description' => __('Realtor Featured Properties','realtor'),
        );
        parent::__construct( 'realtor-featured-properties', __('Realtor Featured Properties','realtor'), $widget_ops );
    }

    public function widget( $args, $instance ) {
        include(locate_template('template-parts/featured-properties-sidebar.php'));
    }



    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Featured Properties', 'realtor' );
        $listing_link = ! empty( $instance['listing_link'] ) ? $instance['listing_link'] : esc_html__( '', 'realtor' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'listing_link' ) ); ?>"><?php esc_attr_e( 'Properties List URL:', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'listing_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'listing_link' ) ); ?>" type="text" value="<?php echo esc_attr( $listing_link ); ?>">
        </p>
    <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['listing_link'] = ( ! empty( $new_instance['listing_link'] ) ) ? strip_tags( $new_instance['listing_link'] ) : '';
        return $instance;
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'Realtor_Featured_Properties' );
});

class Realtor_Social_Icons extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'realtor-social-icons',
            'description' => 'Realtor Social Icons',
        );
        parent::__construct( 'realtor-social-icons', 'Realtor Social Icons', $widget_ops );
    }

    public function widget( $args, $instance ) {
        echo realtor_get_social_icons();
    }


    public function form( $instance ) {
        echo '<p>';
        echo __('Configure Social Icons by going to Appearance > Customizer.','realtor');
        echo '</p>';
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'Realtor_Social_Icons' );
});

class Realtor_Short_Description extends WP_Widget {


    public function __construct() {
        $widget_ops = array(
            'classname' => 'realtor-short-description',
            'description' => __('Realtor Short Description','realtor'),
        );
        parent::__construct( 'realtor-short-description', __('Realtor Short Description','realtor'), $widget_ops );
    }

    public function widget( $args, $instance ) {
        ?>
            <?php get_template_part('template-parts/logo'); ?>
            <p><?php echo $instance['description']; ?></p>
            <a href="<?php $instance['link']; ?>"><?php echo __('Read More', 'realtor'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
        <?php
    }


    public function form( $instance ) {

        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'realtor' );
        $link = ! empty( $instance['link'] ) ? $instance['link'] : esc_html__( '', 'realtor' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Short Description:', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="textarea" value="<?php echo esc_attr( $description ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php esc_attr_e( 'Read More Link:', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $link ); ?>">
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['description'] = ( ! empty( $new_instance['description'] ) ) ? strip_tags( $new_instance['description'] ) : '';
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
        return $instance;
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'Realtor_Short_Description' );
});
class Realtor_Latest_Tweets extends WP_Widget {


    public function __construct() {
        $widget_ops = array(
            'classname' => 'realtor-latest-tweets',
            'description' => __('Realtor Latest Tweets','realtor'),
        );
        parent::__construct( 'realtor-latest-tweets', __('Realtor Latest Tweets','realtor'), $widget_ops );
    }

    public function widget( $args, $instance ) {
        $settings = array(
            'oauth_access_token'        => $instance['oauth_access_token'],
            'oauth_access_token_secret' => $instance['oauth_access_token_secret'],
            'consumer_key'              => $instance['consumer_key'],
            'consumer_secret'           => $instance['consumer_secret']
        );

        $url = 'https://api.twitter.com/1.1/users/lookup.json';
        $requestMethod = 'POST';

        $postfields = array(
            'screen_name' => 'jadoon88',
        );
        $twitter = new TwitterAPIExchange($settings);
        echo $twitter->buildOauth($url, $requestMethod)
            ->setPostfields($postfields)
            ->performRequest();

    }


    public function form( $instance ) {

        $oauth_access_token = ! empty( $instance['oauth_access_token'] ) ? $instance['oauth_access_token'] : esc_html__( '', 'realtor' );
        $oauth_access_token_secret = ! empty( $instance['oauth_access_token_secret'] ) ? $instance['oauth_access_token_secret'] : esc_html__( '', 'realtor' );
        $consumer_key = ! empty( $instance['consumer_key'] ) ? $instance['consumer_key'] : esc_html__( '', 'realtor' );
        $consumer_secret = ! empty( $instance['consumer_secret'] ) ? $instance['consumer_secret'] : esc_html__( '', 'realtor' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'oauth_access_token' ) ); ?>"><?php esc_attr_e( 'Access Token:', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'oauth_access_token' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'oauth_access_token' ) ); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'oauth_access_token_secret' ) ); ?>"><?php esc_attr_e( 'Access Token Secret:', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'oauth_access_token_secret' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'oauth_access_token_secret' ) ); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token_secret ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'consumer_key' ) ); ?>"><?php esc_attr_e( 'Consumer Key (API Key):', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'consumer_key' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'consumer_key' ) ); ?>" type="text" value="<?php echo esc_attr( $consumer_key ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'consumer_secret' ) ); ?>"><?php esc_attr_e( 'Consumer Secret (API Secret):', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'consumer_secret' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'consumer_secret' ) ); ?>" type="text" value="<?php echo esc_attr( $consumer_secret ); ?>">
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['oauth_access_token'] = ( ! empty( $new_instance['oauth_access_token'] ) ) ? strip_tags( $new_instance['descoauth_access_tokenription'] ) : '';
        $instance['oauth_access_token_secret'] = ( ! empty( $new_instance['oauth_access_token_secret'] ) ) ? strip_tags( $new_instance['oauth_access_token_secret'] ) : '';
        $instance['consumer_key'] = ( ! empty( $new_instance['consumer_key'] ) ) ? strip_tags( $new_instance['consumer_key'] ) : '';
        $instance['consumer_secret'] = ( ! empty( $new_instance['consumer_secret'] ) ) ? strip_tags( $new_instance['consumer_secret'] ) : '';
        return $instance;
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'Realtor_Latest_Tweets' );
});


?>
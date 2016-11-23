<?php

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

class Realtor_Recent_Searches extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'realtor-recent-searches',
            'description' => __('Realtor Recent Searches','realtor'),
        );
        parent::__construct( 'realtor-recent-searches', __('Realtor Recent Searches','realtor'), $widget_ops );
    }

    public function widget( $args, $instance ) {

        echo '<h6 class="widgettitle">'.$instance['title'].'</h6>';

        ?>

        <div class="footer-tag">

            <?php
            $searches=get_option('realtor_last_searches');
            sort($searches);
                foreach($searches as $value) {
                    echo '<a href="">' . $value . '</a>';

                }

            ?>

        </div>

        <?php


    }

    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Featured Properties', 'realtor' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'realtor' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p> <?php _e("Show recent searches", 'realtor'); ?>
        </p>

        <?php

    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;

    }
}
add_action( 'widgets_init', function(){
    register_widget( 'Realtor_Recent_Searches' );
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
?>
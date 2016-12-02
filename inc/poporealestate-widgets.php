<?php

class poporealestate_Property_Search extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'poporealestate-property-search',
            'description' => 'PopoHomes Property Search',
        );
        parent::__construct( 'poporealestate-property-search', 'PopoHomes Property Search', $widget_ops );
    }

    public function widget( $args, $instance ) {
        get_template_part("template-parts/property-search-sidebar");
    }


    public function form( $instance ) {
        echo "<p>";
        _e('Property Search Form','poporealestate');
        echo "</p>";
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'poporealestate_Property_Search' );
});

class poporealestate_Recent_Searches extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'poporealestate-recent-searches',
            'description' => __('PopoHomes Recent Searches','poporealestate'),
        );
        parent::__construct( 'poporealestate-recent-searches', __('PopoHomes Recent Searches','poporealestate'), $widget_ops );
    }

    public function widget( $args, $instance ) {

        echo '<h6 class="widgettitle">'.$instance['title'].'</h6>';

        ?>

        <div class="footer-tag">

            <?php
            $searches=get_option('poporealestate_last_searches');

            if(empty($searches))
            {
                sort($searches);
                foreach($searches as $value) {
                    echo '<a href="">' . $value . '</a>';

                }

            }
            else
            {
                echo "<p>";
                _e('There are no recent searches to show.','poporealestate');
                echo "</p>";
            }


            ?>

        </div>

        <?php


    }

    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Recent Searches', 'poporealestate' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_attr( 'Title:', 'poporealestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p> <?php _e("Show recent searches", 'poporealestate'); ?>
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
    register_widget( 'poporealestate_Recent_Searches' );
});

class poporealestate_Featured_Properties extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'poporealestate-featured-properties',
            'description' => __('PopoHomes Featured Properties','poporealestate'),
        );
        parent::__construct( 'poporealestate-featured-properties', __('PopoHomes Featured Properties','poporealestate'), $widget_ops );
    }

    public function widget( $args, $instance ) {

        include(locate_template('template-parts/featured-properties-sidebar.php'));
    }



    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Featured Properties', 'poporealestate' );
        $listing_link = ! empty( $instance['listing_link'] ) ? $instance['listing_link'] : esc_html__( '', 'poporealestate' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_attr( 'Title:', 'poporealestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'listing_link' ) ); ?>"><?php echo esc_attr( 'Properties List URL:', 'poporealestate' ); ?></label>
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
    register_widget( 'poporealestate_Featured_Properties' );
});

class poporealestate_Social_Icons extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'poporealestate-social-icons',
            'description' => 'PopoHomes Social Icons',
        );
        parent::__construct( 'poporealestate-social-icons', 'PopoHomes Social Icons', $widget_ops );
    }

    public function widget( $args, $instance ) {
        echo poporealestate_get_social_icons();
    }


    public function form( $instance ) {
        echo '<p>';
        echo __('Configure Social Icons by going to Appearance > Customizer.','poporealestate');
        echo '</p>';
    }

    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
    }
}
add_action( 'widgets_init', function(){
    register_widget( 'poporealestate_Social_Icons' );
});

class poporealestate_Short_Description extends WP_Widget {


    public function __construct() {
        $widget_ops = array(
            'classname' => 'poporealestate-short-description',
            'description' => __('PopoHomes Short Description','poporealestate'),
        );
        parent::__construct( 'poporealestate-short-description', __('PopoHomes Short Description','poporealestate'), $widget_ops );
    }

    public function widget( $args, $instance ) {
        ?>
            <?php get_template_part('template-parts/logo'); ?>
            <p><?php echo $instance['description']; ?></p>
            <a href="<?php $instance['link']; ?>"><?php echo __('Read More', 'poporealestate'); ?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
        <?php
    }


    public function form( $instance ) {

        $description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'poporealestate' );
        $link = ! empty( $instance['link'] ) ? $instance['link'] : esc_html__( '', 'poporealestate' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php echo esc_attr( 'Short Description:', 'poporealestate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="textarea" value="<?php echo esc_attr( $description ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php echo esc_attr( 'Read More Link:', 'poporealestate' ); ?></label>
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
    register_widget( 'poporealestate_Short_Description' );
});
?>
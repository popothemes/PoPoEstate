	<div class="page-title">
    <div class="container">
    	<div class="row">
      	<div class="col-sm-6">
        	<h1>
            <?php 
            if(is_home()) {
                echo get_bloginfo();
            }
            elseif(is_author())
            {
                global $wp_query;
                $curauth = $wp_query->get_queried_object();
                echo __('Properties by ','realtor').$curauth->display_name;
            }
            if(is_category())
            {
                echo __('All posts in ', 'realtor');
                echo '"';
                single_cat_title();
                echo '"';
            }
            if(is_tag())
            {
                echo __('All posts tagged with ', 'realtor');
                echo '"';
                single_tag_title();
                echo '"';


            }
            else
            {
                echo get_the_title(); 
            }

            ?>
          </h1>
        </div>
        <div class="col-sm-6 breadcrumb">
            <?php custom_breadcrumbs(); ?>
        </div>
      </div>
      </div>
    </div>
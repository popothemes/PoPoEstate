	<div class="page-title">
    <div class="container">
    	<div class="row">
      	<div class="col-sm-6">
        	<h1>
            <?php 
            if(is_home()) {
                echo get_bloginfo();
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
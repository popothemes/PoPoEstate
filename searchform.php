<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div>
        <div class="search-section">
            <div class="input-group">
                <input type="text" name="s" class="form-control" placeholder="<?php _e("Search by keyword", 'poporealestate'); ?>">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="ti-search"></i></button>
              </span>
            </div><!-- /input-group -->
        </div>
    </div>
</form>
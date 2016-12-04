<?php global $poporealestate_default_options; ?>
<div>
            <!-- Nav tabs -->
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sale">
                <div class="sale-form">

                  <form method="get" action="<?php echo get_theme_mod('poporealestate_search_page'); ?>">
                    <div class="form-group"><label><?php echo __('Enter Your Keyword', 'popo-real-estate'); ?></label><input type="text" class="form-control" name="keyword" placeholder="Search by title, description or features" value="<?php if(isset($_GET['keyword'])) {echo $_GET['keyword'];
                   } ?>" /></div>
                      <div class="form-group"><label><?php echo __('Location', 'popo-real-estate'); ?></label><input type="text" class="form-control" name="location" placeholder="Search by location, area etc." value="<?php if(isset($_GET['location'])) {echo $_GET['location'];
                          } ?>" /></div>
                    <div class="form-group"><label><?php echo __('Property Status', 'popo-real-estate'); ?></label><select type="text" name="status" class="form-control" >
                      <option value="any"><?php echo __('Any', 'popo-real-estate'); ?></option>
                        <?php

                        if(isset($_GET['status'])) {
                            poporealestate_select_property_statuses($_GET['status']);
                        }
                        else
                        {
                            poporealestate_select_property_statuses("");

                        }

                        ?>

                    </select></div>
                    <div class="form-group"><label><?php echo __('Property Type', 'popo-real-estate'); ?></label><select name="type" type="text" class="form-control" >
                            <option value="any"><?php echo __('Any', 'popo-real-estate'); ?></option>
                        <?php

                        if(isset($_GET['type'])) {
                            poporealestate_select_property_types($_GET['type']);
                        }
                        else
                        {
                            poporealestate_select_property_types("");

                        }

                        ?>
                    </select></div>
                    <div class="row form-group">
                      <div class="col-sm-6"><label><?php echo __('Min Beds', 'popo-real-estate'); ?></label><select type="text" name="beds" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['beds'])) {
                                  poporealestate_get_min_beds($_GET['beds']);
                              }
                              else
                              {
                                  poporealestate_get_min_beds("");

                              }

                              ?>
                    </select></div>
                      <div class="col-sm-6"><label><?php echo __('Min Baths', 'popo-real-estate'); ?></label><select type="text" name="baths" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['baths'])) {
                                  poporealestate_get_min_baths($_GET['baths']);
                              }
                              else
                              {
                                  poporealestate_get_min_baths("");

                              }

                              ?>
                    </select></div>
                    </div>
                      <div class="row form-group">
                          <div class="col-sm-6"><label><?php echo __('Min Parking', 'popo-real-estate'); ?></label><select type="text" name="garage" class="form-control" >
                                  <option value="any">Any</option>
                                  <?php

                                  if(isset($_GET['parking'])) {
                                      poporealestate_get_min_parking($_GET['parking']);
                                  }
                                  else
                                  {
                                      poporealestate_get_min_parking("");

                                  }

                                  ?>
                              </select></div>
                      </div>

                    <div class="row form-group">
                      <div class="col-sm-6"><label><?php printf(__('Min. Area (%s)', 'popo-real-estate'),get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix'])); ?></label><select type="text" name="minarea" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['minarea'])) {
                                  poporealestate_get_min_area($_GET['minarea']);
                              }
                              else
                              {
                                  poporealestate_get_min_area("");

                              }

                              ?>
                    </select></div>
                      <div class="col-sm-6"><label><?php printf(__('Max. Area (%s)', 'popo-real-estate'),get_theme_mod('poporealestate_area_postfix', $poporealestate_default_options['poporealestate_area_postfix'])); ?></label><select type="text" name="maxarea" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['maxarea'])) {
                                  poporealestate_get_max_area($_GET['maxarea']);
                              }
                              else
                              {
                                  poporealestate_get_max_area("");

                              }

                              ?>
                    </select></div>
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-6"><label><?php printf(__('Price From (%s)', 'popo-real-estate'),get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix'])); ?></label><select type="text" name="pricefrom" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['pricefrom'])) {
                                  poporealestate_get_min_price($_GET['pricefrom']);
                              }
                              else
                              {
                                  poporealestate_get_min_price("");

                              }

                              ?>
                    </select></div>
                      <div class="col-sm-6"><label><?php printf(__('Price To (%s)', 'popo-real-estate'), get_theme_mod('poporealestate_currency_prefix', $poporealestate_default_options['poporealestate_currency_prefix'])); ?></label><select type="text" name="priceto" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['priceto'])) {
                                  poporealestate_get_max_price($_GET['priceto']);
                              }
                              else
                              {
                                  poporealestate_get_max_price("");

                              }

                              ?>
                    </select></div>
                    </div>


                    <div class="form-group">
                      <input type="submit" value="Find Properties" class="btn btn-success" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

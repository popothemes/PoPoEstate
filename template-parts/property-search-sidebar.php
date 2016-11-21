<?php global $realtor_default_options; ?>
<div>
            <!-- Nav tabs -->
            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sale">
                <div class="sale-form">

                  <form method="get" action="<?php echo get_theme_mod('realtor_search_page'); ?>">
                    <div class="form-group"><label><?php echo __('Enter Your Keyword', 'realtor'); ?></label><input type="text" class="form-control" name="keyword" placeholder="Search by title, description or features" value="<?php if(isset($_GET['keyword'])) {echo $_GET['keyword'];
                   } ?>" /></div>
                      <div class="form-group"><label><?php echo __('Location', 'realtor'); ?></label><input type="text" class="form-control" name="location" placeholder="Search by location, area etc." value="<?php if(isset($_GET['location'])) {echo $_GET['location'];
                          } ?>" /></div>
                    <div class="form-group"><label><?php echo __('Property Status', 'realtor'); ?></label><select type="text" name="status" class="form-control" >
                      <option value="any"><?php echo __('Any', 'realtor'); ?></option>
                        <?php

                        if(isset($_GET['status'])) {
                            realtor_select_property_statuses($_GET['status']);
                        }
                        else
                        {
                            realtor_select_property_statuses("");

                        }

                        ?>

                    </select></div>
                    <div class="form-group"><label><?php echo __('Property Type', 'realtor'); ?></label><select name="type" type="text" class="form-control" >
                            <option value="any"><?php echo __('Any', 'realtor'); ?></option>
                        <?php

                        if(isset($_GET['type'])) {
                            realtor_select_property_types($_GET['type']);
                        }
                        else
                        {
                            realtor_select_property_types("");

                        }

                        ?>
                    </select></div>
                    <div class="row form-group">
                      <div class="col-sm-6"><label><?php echo __('Min Beds', 'realtor'); ?></label><select type="text" name="beds" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['beds'])) {
                                  realtor_get_min_beds($_GET['beds']);
                              }
                              else
                              {
                                  realtor_get_min_beds("");

                              }

                              ?>
                    </select></div>
                      <div class="col-sm-6"><label><?php echo __('Min Baths', 'realtor'); ?></label><select type="text" name="baths" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['baths'])) {
                                  realtor_get_min_baths($_GET['baths']);
                              }
                              else
                              {
                                  realtor_get_min_baths("");

                              }

                              ?>
                    </select></div>
                    </div>
                      <div class="row form-group">
                          <div class="col-sm-6"><label><?php echo __('Min Parking', 'realtor'); ?></label><select type="text" name="garage" class="form-control" >
                                  <option value="any">Any</option>
                                  <?php

                                  if(isset($_GET['parking'])) {
                                      realtor_get_min_parking($_GET['parking']);
                                  }
                                  else
                                  {
                                      realtor_get_min_parking("");

                                  }

                                  ?>
                              </select></div>
                      </div>

                    <div class="row form-group">
                      <div class="col-sm-6"><label><?php printf(__('Min. Area (%s)', 'realtor'),get_theme_mod('realtor_area_postfix', $realtor_default_options['realtor_area_postfix'])); ?></label><select type="text" name="minarea" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['minarea'])) {
                                  realtor_get_min_area($_GET['minarea']);
                              }
                              else
                              {
                                  realtor_get_min_area("");

                              }

                              ?>
                    </select></div>
                      <div class="col-sm-6"><label><?php printf(__('Max. Area (%s)', 'realtor'),get_theme_mod('realtor_area_postfix', $realtor_default_options['realtor_area_postfix'])); ?></label><select type="text" name="maxarea" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['maxarea'])) {
                                  realtor_get_max_area($_GET['maxarea']);
                              }
                              else
                              {
                                  realtor_get_max_area("");

                              }

                              ?>
                    </select></div>
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-6"><label><?php printf(__('Price From (%s)', 'realtor'),get_theme_mod('realtor_currency_prefix', $realtor_default_options['realtor_currency_prefix'])); ?></label><select type="text" name="pricefrom" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['pricefrom'])) {
                                  realtor_get_min_price($_GET['pricefrom']);
                              }
                              else
                              {
                                  realtor_get_min_price("");

                              }

                              ?>
                    </select></div>
                      <div class="col-sm-6"><label><?php printf(__('Price To (%s)', 'realtor'), get_theme_mod('realtor_currency_prefix', $realtor_default_options['realtor_currency_prefix'])); ?></label><select type="text" name="priceto" class="form-control" >
                      <option value="any">Any</option>
                              <?php

                              if(isset($_GET['priceto'])) {
                                  realtor_get_max_price($_GET['priceto']);
                              }
                              else
                              {
                                  realtor_get_max_price("");

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

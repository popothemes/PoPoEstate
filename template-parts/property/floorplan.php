<?php if (!empty(get_post_meta(get_the_id(), 'attachments'))) { ?>
<div class="p-box p-floreplan">


                
                <h4>Floor Plan & Other Attachments</h4>
                <div class="owl-outer">
                  <div id="owl-floor-plan" class="owl-carousel owl-theme">

                    <?php

                    foreach (get_post_meta(get_the_id(), 'attachments') as $key => $value) {
                        echo '<div class="item"><img src="'.wp_get_attachment_image_src($value, 'poporealestate_attachments')[0].'" width="185" height="auto" alt="" /></div>                                ';
                    }

                    ?>
                  </div>
                  <a href="javascript:;" class="left-arrow"><span class="ti-arrow-circle-left"></span></a><a href="javascript:;" class="right-arrow"><span class="ti-arrow-circle-right"></span></a></div>
                <div class="custom-galery">
                  <div class="lower"></div>
                  <div class="overlay overlay-hugeinc">
                    <label for="op"></label>
                    <nav>
                      <!-- Owl carousel -->
                      <div class="owl-carousel owl-theme carousel-full-width owl-demo-3">
                        <?php

                        foreach (get_post_meta(get_the_id(), 'attachments') as $key => $value) {
                            echo '<div class="item" style="background-image: url(\''.wp_get_attachment_image_src($value, 'poporealestate_attachments')[0].'\');"></div>';
                        }
                        ?>

                      </div>
                      <!-- End Owl carousel -->
                      <div class="owl-nav"><div class="owl-prev" style=""><i class="fa fa-chevron-left"></i></div><div class="owl-next" style=""><i class="fa fa-chevron-right"></i></div></div>
                    </nav>
                  </div>
                </div>
              </div>
<?php } ?>
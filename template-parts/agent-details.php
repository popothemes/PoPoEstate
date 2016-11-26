<div class="p-box p-contact-agent">
              <h4><?php echo __('Contact Agent', 'poporealestate'); ?></h4>
              
              <div class="row">
                <div class="col-sm-6 agent-detail">
                  <div class="agent-image">
                    <?php echo get_avatar(get_the_author_meta('ID'), '369', null, "", array('height' => '193', 'width' => '369', 'class' => 'img-responsive')); ?> </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <h5><?php the_author_meta('display_name'); ?></h5>
                      <span class="company-broker"><?php the_author_meta('profile-tagline'); ?></span>
                    </div>
                    <div class="col-sm-6">
                      <ul class="social-media">

                        <?php
                        if (!empty(get_the_author_meta('facebook-url')))
                        {
                          ?>
                          <li><a href="<?php get_the_author_meta('facebook-url'); ?>" class="fb"><i class="fa fa-facebook"></i></a></li>

                          <?php


                        }
                        ?>
                        <?php
                        if (!empty(get_the_author_meta('twitter-url')))
                        {
                          ?>
                          <li><a href="<?php get_the_author_meta('twitter-url'); ?>" class="fb"><i class="fa fa-facebook"></i></a></li>

                          <?php


                        }
                        ?>
                        <?php
                        if (!empty(get_the_author_meta('pinterest-url')))
                        {
                          ?>
                          <li><a href="<?php get_the_author_meta('pinterest-url'); ?>" class="pin"><i class="fa fa-pinterest-p"></i></a></li>

                          <?php


                        }
                        ?>
                        <?php
                        if (!empty(get_the_author_meta('googleplus-url')))
                        {
                          ?>
                          <li><a href="<?php get_the_author_meta('googleplus-url'); ?>" class="gp"><i class="ei ei-social_googleplus"></i></a></li>

                          <?php


                        }
                        ?>
                        <?php
                        if (!empty(get_the_author_meta('tumblr-url')))
                        {
                          ?>
                          <li><a href="<?php get_the_author_meta('tumblr-url'); ?>" class="tm"><i class="fa fa-tumblr"></i></a></li>

                          <?php


                        }
                        ?>
                        <?php
                        if (!empty(get_the_author_meta('instagram-url')))
                        {
                          ?>
                          <li><a href="<?php get_the_author_meta('instagram-url'); ?>" class="fb"><i class="fa fa-instagram"></i></a></li>

                          <?php


                        }
                        ?></ul>
                    </div>
                  </div>
                  
                  <p><?php the_author_meta('description'); ?></p>

                  <div class="contacts">
                  <span><i class="fa fa-map-marker" aria-hidden="true"></i><?php the_author_meta('address'); ?></span>
                  <span><i class="fa fa-phone" aria-hidden="true"></i><?php the_author_meta('phonenumber'); ?></span>

                  <?php

                  if (get_the_author_meta('show-email-address') == "show-email") {
                    ?>


                      <span><i class="fa fa-envelope" aria-hidden="true"></i><?php the_author_meta('email'); ?></span>

                    <?php
                  }
                  ?>
                  </div>

                  
                </div>
                <div class="col-sm-5">
                    <div class="sale-form contact-form">
                    <form method="post" id="agent-form">

                      <?php

                      if(empty(get_theme_mod("poporealestate_agent_form_shortcode","")))
                      {
                        _e("Please add a Contact Form 7 shortcode in Agent settings of customizer to show a form here","poporealestate");

                      }
                      else
                      {
                        echo do_shortcode(get_theme_mod("poporealestate_agent_form_shortcode",''));

                      }


                      ?>
                      <div id="feedback"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
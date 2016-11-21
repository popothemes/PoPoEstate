<div class="p-box p-contact-agent">
              <h4><?php echo __('Contact Agent', 'realtor'); ?></h4>
              
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
                        <li><a href="<?php the_author_meta('instagram-url'); ?>" class="fb"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?php the_author_meta('facebook-url'); ?>" class="fb"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php the_author_meta('twitter-url'); ?>" class="tt"><i class="fa fa-twitter"></i></a></li>
                         <li><a href="<?php the_author_meta('pinterest-url'); ?>" class="pin"><i class="fa fa-pinterest-p"></i></a></li>
                        <li><a href="<?php the_author_meta('googleplus-url'); ?>" class="gp"><i class="ei ei-social_googleplus"></i></a></li>
                        <li><a href="<?php the_author_meta('tumblr-url'); ?>" class="tm"><i class="fa fa-tumblr"></i></a></li>
                      </ul>  
                    </div>
                  </div>
                  
                  <p><?php the_author_meta('description'); ?></p>
                  <div class="contacts"><span><i class="fa fa-map-marker" aria-hidden="true"></i><?php the_author_meta('address'); ?></span> <span><i class="fa fa-phone" aria-hidden="true"></i><?php the_author_meta('phonenumber'); ?></span>  <span><i class="fa fa-envelope" aria-hidden="true"></i><?php the_author_meta('email'); ?></span></div>
                  
                </div>
                <div class="col-sm-5">
                    <div class="sale-form contact-form">
                    <form method="post" id="agent-form">
                      <div class="form-group"><input name="full-name" type="text" class="form-control" placeholder="Full Name" /></div>
                      <div class="form-group"><input name="phone-number" type="text" class="form-control" placeholder="Phone Number" /></div>
                      <div class="form-group"><input name="email" type="text" class="form-control" placeholder="Email Address" /></div>
                      <div class="form-group"><input name="message" type="text" class="form-control" placeholder="Message" /></div>
                      <div class="form-group"><input name="author-id" type="hidden" class="form-control" value="<?php echo get_the_author_meta('ID');?>" /></div>
                      <input type="hidden" name="action" value="realtor_single_property_form_submit"/>
                      <div class="form-group"><div class="g-recaptcha" data-sitekey="6LeErQoUAAAAAJDlUcwakMDiwu6sQ1djvVqoYwAS"></div></div>
                      
                      <div class="form-group">
                        <input type="submit" value="Contact Agent" class="btn btn-success" id="single-property-form-submit-button" />
                      </div>
                      <div id="loader" class="loading-button" style="display:none;"><i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i></div>
                      <div id="feedback"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
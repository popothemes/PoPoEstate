<?php get_header(); ?>

<article>
  <div class="article">
    <?php get_template_part('template-parts/page-title'); ?>
    <div class="page-result">
    <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h4>Rencent News & Blog Section</h4>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever.</p>
          <span class="line"></span>
        </div>        
      </div>
      </div>
    </div>
     <section class="section-inner">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <div class="blog-section">
                  <div class="blog-page">
                    <div class="">

                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php if(has_post_thumbnail()) { ?>
                          <div class="b-image"><img src="<?php echo the_post_thumbnail_url('realtor_single_blog_thumbnail');?>" width="773" height="430" alt="" class="img-responsive" /></div>
                        <?php
                        }
                        ?>  
                        <div class="b-detail">
                          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                          <div class="blog-info"><span><?php echo __('By', 'realtor').' '; ?><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>   |   <span><?php the_category(', '); ?></span>   |   <span>
                                <?php
                                  $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

                                if (comments_open() ) {
                                    if ($num_comments == 0 ) {
                                        $comments = __('No Comments', 'realtor');
                                    } elseif ($num_comments > 1 ) {
                                        $comments = $num_comments . __(' Comments', 'realtor');
                                    } else {
                                        $comments = __('1 Comment');
                                    }
                                        $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
                                } else {
                                        $write_comments =  __('Comments Disabled');
                                }
                                echo $write_comments;
                                ?>

                              </span>   |        <span><a href="javascript:;"><i class="more"></i>Share this post</a></span></div>
                            <?php the_content(); ?>
                        <?php endwhile; wp_reset_query();?>
                          </div>
                      <div class="tags"> <?php __("Tags:", 'realtor'); the_tags();?> </div>
                    </div>
                  </div>
                </div>
                <div class="recent-blog">
                  <h2><?php echo __('Related Posts', 'realtor'); ?></h2>
                  <div class="row">

                    <?php get_template_part('template-parts/related-posts'); ?>
                    
                  </div>
                </div>
                <div class="comment-blog">
                    <?php if (comments_open()) {
                        comments_template();
                    } ?>
                  
                </div>
                <div class="leave-comment">
                  <h2>Leave a Comment</h2>
                  <form class="form-horizontal">
                    <div class="form-group">
                      <div class="col-sm-4"><input type="text" class="form-control" placeholder="Your Name" /></div>
                      <div class="col-sm-4"><input type="text" class="form-control" placeholder="Email" /></div>
                      <div class="col-sm-4"><input type="text" class="form-control" placeholder="http://" /></div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12"><textarea class="form-control" rows="5" placeholder="Your Comment"></textarea></div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12"><input type="button" class="btn btn-danger" value="Submit Comment" /></div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="search-section">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by keyword">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="ti-search"></i></button>
                    </span> </div>
                  <!-- /input-group --> 
                </div>
                <div> 
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#sale" aria-controls="home" role="tab" data-toggle="tab">Sale</a></li>
                    <li role="presentation"><a href="#rent" aria-controls="profile" role="tab" data-toggle="tab">Rent</a></li>
                    <li role="presentation"><a href="#aprtment" aria-controls="messages" role="tab" data-toggle="tab">Apparment</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="sale">
                    <div class="sale-form">
                      <form>
                        <div class="form-group"><label>Enter Your Keyword</label><input type="text" class="form-control" placeholder="Search by location, zip, area" /></div>
                        <div class="form-group"><label>Property Status</label><select type="text" class="form-control" >
                          <option>Select Property Status</option><option>Select Property Status</option>
                        </select></div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>No. Beds</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>No. Baths</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>Min. Area (Sqft)</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>Max. Area (Sqft)</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>Price From</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>Price To</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="form-group">
                          <input type="button" value="Find Properties" class="btn btn-success" />
                        </div>
                      </form>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="rent">
                    <div class="sale-form">
                      <form>
                        <div class="form-group"><label>Enter Your Keyword</label><input type="text" class="form-control" placeholder="Search by location, zip, area" /></div>
                        <div class="form-group"><label>Property Status</label><select type="text" class="form-control" >
                          <option>Select Property Status</option><option>Select Property Status</option>
                        </select></div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>No. Beds</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>No. Baths</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>Min. Area (Sqft)</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>Max. Area (Sqft)</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>Price From</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>Price To</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="form-group">
                          <input type="button" value="Find Properties" class="btn btn-success" />
                        </div>
                      </form>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="aprtment">
                    <div class="sale-form">
                      <form>
                        <div class="form-group"><label>Enter Your Keyword</label><input type="text" class="form-control" placeholder="Search by location, zip, area" /></div>
                        <div class="form-group"><label>Property Status</label><select type="text" class="form-control" >
                          <option>Select Property Status</option><option>Select Property Status</option>
                        </select></div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>No. Beds</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>No. Baths</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>Min. Area (Sqft)</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>Max. Area (Sqft)</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="row form-group">
                          <div class="col-sm-6"><label>Price From</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                          <div class="col-sm-6"><label>Price To</label><select type="text" class="form-control" >
                          <option>Any</option><option>Any</option>
                        </select></div>
                        </div>
                        <div class="form-group">
                          <input type="button" value="Find Properties" class="btn btn-success" />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                </div>
                <div class="left-container">
                  <h3>Featured Properties</h3>
                  <div class="s-property">
                    <div class="row">
                      <div class="col-xs-5"><img src="images/small-property.png" width="137" height="137" alt="" class="img-responsive" /></div>
                      <div class="col-xs-7 s-property-detail">
                        <h5>Awesome villa for sale</h5>
                        <span class="price">$625,000</span>
                        <div class="r-property-space">
                          <div class="row">
                            <div class="col-sm-6"><i class="sqm"></i>161 Sqm</div>
                            <div class="col-sm-6"><i class="bed"></i>Beds: 2</div>
                            <div class="col-sm-6"><i class="bath"></i>Baths: 2</div>
                            <div class="col-sm-6"><i class="garage"></i>Garage: 2</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="s-property">
                    <div class="row">
                      <div class="col-xs-5"><img src="images/small-property.png" width="137" height="137" alt="" class="img-responsive" /></div>
                      <div class="col-xs-7 s-property-detail">
                        <h5>Awesome villa for sale</h5>
                        <span class="price">$625,000</span>
                        <div class="r-property-space">
                          <div class="row">
                            <div class="col-sm-6"><i class="sqm"></i>161 Sqm</div>
                            <div class="col-sm-6"><i class="bed"></i>Beds: 2</div>
                            <div class="col-sm-6"><i class="bath"></i>Baths: 2</div>
                            <div class="col-sm-6"><i class="garage"></i>Garage: 2</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="s-property">
                    <div class="row">
                      <div class="col-xs-5"><img src="images/small-property.png" width="137" height="137" alt="" class="img-responsive" /></div>
                      <div class="col-xs-7 s-property-detail">
                        <h5>Awesome villa for sale</h5>
                        <span class="price">$625,000</span>
                        <div class="r-property-space">
                          <div class="row">
                            <div class="col-sm-6"><i class="sqm"></i>161 Sqm</div>
                            <div class="col-sm-6"><i class="bed"></i>Beds: 2</div>
                            <div class="col-sm-6"><i class="bath"></i>Baths: 2</div>
                            <div class="col-sm-6"><i class="garage"></i>Garage: 2</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="s-property">
                    <div class="row">
                      <div class="col-xs-5"><img src="images/small-property.png" width="137" height="137" alt="" class="img-responsive" /></div>
                      <div class="col-xs-7 s-property-detail">
                        <h5>Awesome villa for sale</h5>
                        <span class="price">$625,000</span>
                        <div class="r-property-space">
                          <div class="row">
                            <div class="col-sm-6"><i class="sqm"></i>161 Sqm</div>
                            <div class="col-sm-6"><i class="bed"></i>Beds: 2</div>
                            <div class="col-sm-6"><i class="bath"></i>Baths: 2</div>
                            <div class="col-sm-6"><i class="garage"></i>Garage: 2</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="s-property">
                    <div class="row">
                      <div class="col-xs-5"><img src="images/small-property.png" width="137" height="137" alt="" class="img-responsive" /></div>
                      <div class="col-xs-7 s-property-detail">
                        <h5>Awesome villa for sale</h5>
                        <span class="price">$625,000</span>
                        <div class="r-property-space">
                          <div class="row">
                            <div class="col-sm-6"><i class="sqm"></i>161 Sqm</div>
                            <div class="col-sm-6"><i class="bed"></i>Beds: 2</div>
                            <div class="col-sm-6"><i class="bath"></i>Baths: 2</div>
                            <div class="col-sm-6"><i class="garage"></i>Garage: 2</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="javascript:;" class="property-link">All Properties <i class="fa fa-caret-right" aria-hidden="true"></i></a> </div>
              </div>
            </div>
          </div>
        </section>
  </div>
  <h4 class="hidden">Realtor</h4>
</article>
<?php get_footer(); ?>


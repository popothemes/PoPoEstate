<?php

global $post;  
    // We should get the first category of the post  
    $categories = get_the_category($post->ID);  
    $first_cat = $categories[0]->cat_ID;  
  
    $args = array(  
        // It should be in the first category of our post:  
        'category__in' => array( $first_cat ),  
        // Our post should NOT be in the list:  
        'post__not_in' => array( $post->ID ),  
        'posts_per_page' => 3  
    );  
  
    $posts = get_posts($args);  
    if($posts ) {  
        foreach( $posts as $post ) {  

            ?>

          <div class="col-sm-6 related-posts">
                      <div class="row blog-box wow fadeInLeft animated" data-wow-delay="500ms">
                        <div class="blog-img"><?php
                            if(has_post_thumbnail())
                            {
                                the_post_thumbnail("poporealestate_related_posts_thumbnail", ['class' => 'img-responsive']);
                            }
                            else
                            {
                                echo '<img src="http://placehold.it/372x247" alt="place-holder" class="img-responsive"/>';
                            } ?></div>
                        <span class="lable-tag">31 Dec 15</span>
                        <div class="rblog-detail">
                          <h5><?php the_title(); ?></h5>
                          <p><?php the_excerpt(); ?></p>
                          <div class="blog-space">
                            <div class="row">
                              <div class="col-sm-4">
                                <?php
                                $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

                                if (comments_open() ) {
                                    if ($num_comments == 0 ) {
                                        $comments = __('No Comments', 'poporealestate');
                                    } elseif ($num_comments > 1 ) {
                                        $comments = $num_comments . __(' Comments', 'poporealestate');
                                    } else {
                                        $comments = __('1 Comment','poporealestate');
                                    }
                                    $write_comments = '<a href="' . get_comments_link() .'"><i class="fa fa-comment" aria-hidden="true"></i>'. $comments.'</a>';
                                } else {
                                    $write_comments =  __('Comments Disabled','poporealestate');
                                }
                                    echo $write_comments;
                                    ?>

                                  </div>
                                <div class="col-sm-5"><a href="<?php echo esc_url( get_category_link( get_the_category()[0]->term_id ) ) ?>"><i aria-hidden="true" class="fa fa-tag"></i><?php print_r(get_the_category()[0]->name); ?></a></div>
                                <div class="col-sm-3"><a href="<?php echo get_the_permalink(); ?>"><i class="fa fa-share"></i><?php _e('More', 'poporealestate') ?><span class="screen-reader-text">of <?php the_title(); ?></span></a></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


            <?php
        }

  
        
    }  
    else
    {
        echo __('No Related Posts Found', 'poporealestate');
    }



?>
</div>

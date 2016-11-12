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

          <div class="col-sm-6">
                      <div class="row blog-box wow fadeInLeft animated" data-wow-delay="500ms">
                        <div class="blog-img"><?php the_post_thumbnail("realtor_related_posts_thumbnail"); ?></div>
                        <span class="lable-tag">31 Dec 15</span>
                        <div class="rblog-detail">
                          <h5><?php the_title(); ?></h5>
                          <p><?php the_excerpt(); ?></p>
                          <div class="blog-space">
                            <div class="row">
                              <div class="col-sm-5">
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
                                    $write_comments = '<a href="' . get_comments_link() .'"><i class="ei ei-comment" aria-hidden="true"></i>'. $comments.'</a>';
                                } else {
                                    $write_comments =  __('Comments Disabled');
                                }
                                    echo $write_comments;
                                    ?>

                                  </div>
                                  <div class="col-sm-4"><a href="javascript:;"><i aria-hidden="true" class="ei ei-tag"></i>Property</a></div>
                                  <div class="col-sm-3"><a href="<?php the_permalink(); ?>"><i class="more"></i><?php echo __('More', 'realtor'); ?></a></div>
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
        echo __('No Related Posts Found', 'realtor');
    }


?>

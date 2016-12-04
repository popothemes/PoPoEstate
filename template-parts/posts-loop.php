<?php if($the_query->have_posts() ) : ?>

                        <?php while( $the_query->have_posts() ): $the_query->the_post(); ?>

                            <article class="blog_post_wrapper">

                <?php if(has_post_thumbnail()) { ?>

                                    <div <?php post_class('blog-item'); ?>>
                                          <div class="avtar"><?php echo get_avatar(get_the_author_meta('ID'), 75); ?><div><span><?php the_time('j'); ?></span><?php echo substr(get_the_time('F'), 0, 3); ?></div></div>
                                        <div class="blog-detail">
                                            <div class="b-image"><?php the_post_thumbnail("poporealestate_blog_thumbnail", ['class' => 'img-responsive']); ?></div>
                                            <div class="b-detail">
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                          <div class="blog-info"><span><?php echo __('By', 'popo-real-estate').' '; ?><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>   |   <span><?php the_category(', '); ?></span>   |   <span>
                        <?php
                        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

                        if (comments_open() ) {
                            if ($num_comments == 0 ) {
                                $comments = __('No Comments', 'popo-real-estate');
                            } elseif ($num_comments > 1 ) {
                                $comments = $num_comments . __(' Comments', 'popo-real-estate');
                            } else {
                                $comments = __('1 Comment', 'popo-real-estate');
                            }
                                     $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
                        } else {
                                     $write_comments =  __('Comments Disabled','popo-real-estate');
                        }
                        echo $write_comments;
                        ?>

                                          </span>  </div>
                                          <p><?php the_excerpt(); ?></p>
                                          <a href="<?php the_permalink(); ?>" class="blog-read-more"><?php echo __('READ MORE', 'popo-real-estate'); ?><span class="screen-reader-text">of <?php the_title(); ?></span> <i class="ti-arrow-right"></i></a>
                                        </div>
                                        </div>
                                      </div>

                                <?php
                }
                                
else { 

?>
<div class="blog-item">
  <div class="avtar"><?php echo get_avatar(get_the_author_meta('ID'), 75); ?><div><span><?php the_time('j'); ?></span><?php echo substr(get_the_time('F'), 0, 3); ?></div></div>
   <div class="blog-detail">
    <div class="b-detail">
    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
     <div class="blog-info"><span><?php echo __('By', 'popo-real-estate').' '; ?><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>   |   <span><?php the_category(', '); ?></span>   |   <span>
        <?php
               $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

        if (comments_open() ) {
            if ($num_comments == 0 ) {
                $comments = __('No Comments', 'popo-real-estate');
            } elseif ($num_comments > 1 ) {
                $comments = $num_comments . __(' Comments', 'popo-real-estate');
            } else {
                $comments = __('1 Comment', 'popo-real-estate');
            }
                 $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
        } else {
                 $write_comments =  __('Comments Disabled', 'popo-real-estate');
        }
        echo $write_comments;
                ?>

             </span>  </div>
             <p><?php the_excerpt(); ?></p>
                                          <a href="<?php the_permalink(); ?>" class="blog-read-more"><?php echo __('READ MORE', 'popo-real-estate'); ?> <span class="screen-reader-text">of <?php the_title(); ?></span><i class="ti-arrow-right"></i></a>
                                        </div>
                                        </div>
                                      </div>

<?php } ?>

                            </article><!-- blog_post_wrapper-->
                    
                        <?php endwhile;?>

        <?php poporealestate_pagination($the_query->max_num_pages); ?>

                    
                    
                        <?php else: ?>
                        <div class="not-found">
                            <h2><?php _e("Blog is empty", 'popo-real-estate'); ?></h2>
                            <span><?php _e("No posts were found", 'popo-real-estate'); ?> </span>
                        </div>

                        

                        <?php endif; wp_reset_postdata(); ?>
<?php get_header(); ?>

<article>
  <div class="article">
    <?php get_template_part('template-parts/page-title'); ?>
    <div class="page-result">
    <div class="container">
        <div class="row">
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
                                        $comments = __('1 Comment','realtor');
                                    }
                                        $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
                                } else {
                                        $write_comments =  __('Comments Disabled','realtor');
                                }
                                echo $write_comments;
                                ?>

                              </span>   |        <span><a href="javascript:;"><i class="more"></i>Share this post</a></span></div>
                            <?php the_content(); ?>
                            <?php
                            $defaults = array(
                                'before'           => '<li>',
                                'after'            => '</li>',
                                'link_before'      => '',
                                'link_after'       => '',
                                'next_or_number'   => 'number',
                                'separator'        => ' ',
                                'nextpagelink'     => __( 'Next page', 'realtor' ),
                                'previouspagelink' => __( 'Previous page', 'realtor' ),
                                'pagelink'         => '%',
                                'echo'             => 1
                            );

                            global $multipage;
                            if( $multipage)
                            {

                                ?>
                                <nav aria-label="Page navigation" id="blog-single">
                                        <?php wp_link_pages( 'before=<ul class="pagination">&after=</ul>&link_before=<li class="page-link">&link_after=</li>'); ?>
                                </nav>


                            <?php

                            }




                            ?>
                        <?php endwhile; wp_reset_query();?>
                          </div>
                        <?php
                        if(has_tag())
                        {
                            ?>
                            <div class="tags"> <?php __("Tags:", 'realtor'); the_tags();?> </div>

                        <?php

                        }
                        ?>

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
              </div>
              <div class="col-sm-4">
                <?php dynamic_sidebar( 'Blog' );?>
              </div>
            </div>
          </div>
        </section>
  </div>
  <h4 class="hidden">Realtor</h4>
</article>
<?php get_footer(); ?>


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
                                        <?php the_content(); ?>
                                        <?php endwhile; wp_reset_query();?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment-blog">
                            <?php if (comments_open()) {
                                comments_template();
                            } ?>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php dynamic_sidebar( 'Page' );?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <h4 class="hidden">Realtor</h4>
</article>
<?php get_footer(); ?>

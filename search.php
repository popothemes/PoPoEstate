<?php get_header(); ?>

<article>
    <div class="article">
        <?php get_template_part('template-parts/page-title'); ?>
        <div class="page-result">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
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
                            <?php
                            get_search_query();
                            ?>
                            <?php get_template_part("template-parts/posts-loop"); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php dynamic_sidebar( 'Sidebar' );?>
                    </div>


                </div>
            </div>
        </section>

    </div>
    <h4 class="hidden">Realtor</h4>
</article>
<?php get_footer(); ?>


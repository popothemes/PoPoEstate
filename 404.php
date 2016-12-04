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
                           <h1><?php echo __('404! Page Not found', 'popo-real-estate'); ?></h1>
                            <p><?php echo __('The page you might be looking for is not available. Please try the search.', 'popo-real-estate'); ?></p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <?php dynamic_sidebar( 'Sidebar' );?>
                    </div>


                </div>
            </div>
        </section>

    </div>
    <h4 class="hidden">Popo Real Estate</h4>
</article>
<?php get_footer(); ?>


<?php if ( get_theme_mod( 'realtor_logo' ) ) : ?>

    <?php global $realtor_default_options; ?>

<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-a" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
    <img src='<?php echo esc_url( get_theme_mod( 'realtor_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' width="<?php echo get_theme_mod('realtor_logo_width', $realtor_default_options['logo_width']); ?>px" rel='home' class="img-responsive" alt="Realtor" />
</a>
<?php else : ?>
    <hgroup>
        <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
    </hgroup>

<?php endif; ?>
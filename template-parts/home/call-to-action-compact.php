<?php global $realtor_default_options; ?>
<section class="section-purchase-now" id="purchase-now">
    <div class="container">
        <div class="row purchase-now-text">
            <div class="col-sm-8 call-to-action-compact-content">
                <?php echo get_theme_mod('realtor_home_call_to_action_compact_content'  ,$realtor_default_options['realtor_home_call_to_action_compact_content']); ?>
            </div>
            <div class="col-sm-4 text-right wow fadeInLeft animated call-to-action-compact-button" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInLeft;"><a href="<?php echo get_theme_mod('realtor_home_call_to_action_compact_button_url','#') ?>" class="btn btn-danger"><?php echo get_theme_mod('realtor_home_call_to_action_compact_button_text'  ,$realtor_default_options['realtor_home_call_to_action_compact_button_text']); ?></a></div>
        </div>
    </div>
</section>
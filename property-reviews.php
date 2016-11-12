<?php

if (post_password_required() ) {
    return;
}
?>
<div class="p-box">
<h4><?php echo __("Reviews", 'realtor'); ?></h4>

<div id="comments" class="comments-area">

    <?php if (have_comments() ) : ?>
        <h4 class="comments-title">
    <?php
                $comments_number = get_comments_number();
    if (1 === $comments_number ) {
        /* translators: %s: post title */
        printf(_x('One review', 'reviews title', 'realtor'));
    } else {
        printf(
            /* translators: 1: number of comments, 2: post title */
            _nx(
                '%1$s review',
                '%1$s reviews',
                $comments_number,
                'review title',
                'realtor'
            ),
            number_format_i18n($comments_number),
            ''
        );
    }
    ?>
        </h4>

    <?php the_comments_navigation(); ?>

        <ul class="comment-list media-list">
    <?php
                wp_list_comments(array( 'callback' => 'realtor_comments' ));
    ?>
        </ul><!-- .comment-list -->

    <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (! comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments') ) :
        ?>
      <p class="no-comments"><?php _e('Reviews are disabled.', 'realtor'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(
        array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>',
        ) 
    );
    ?>

</div><!-- .comments-area -->
</div>

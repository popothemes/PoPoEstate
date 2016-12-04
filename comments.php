<?php

if (post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments() ) : ?>
        <h2 class="comments-title">
    <?php
                $comments_number = get_comments_number();
    if (1 === $comments_number ) {
        /* translators: %s: post title */
        printf(_x('One comment', 'comments title', 'popo-real-estate'));
    } else {
        printf(
            /* translators: 1: number of comments, 2: post title */
            _nx(
                '%1$s comment',
                '%1$s comments',
                $comments_number,
                'comments title',
                'popo-real-estate'
            ),
            number_format_i18n($comments_number),
            ''
        );
    }
    ?>
        </h2>

    <?php the_comments_navigation(); ?>

        <ul class="comment-list media-list">
    <?php
                wp_list_comments(array( 'callback' => 'poporealestate_comments' ));
    ?>
        </ul><!-- .comment-list -->

    <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (! comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments') ) :
        ?>
      <p class="no-comments"><?php _e('Comments are closed.', 'popo-real-estate'); ?></p>
    <?php endif; ?>

    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required_text ="";



    $fields =  array(

        'author' =>
            '<p class="comment-form-author">' .
            '<input id="author" name="author" placeholder="'.__('Your Name (Required)', 'popo-real-estate').'" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
            '" size="30"' . $aria_req . ' /></p>',

        'email' =>
            '<p class="comment-form-email">' .
            '<input id="email" name="email" placeholder="'.__('Your email (Required)', 'popo-real-estate').'" type="text" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' /></p>',

        'url' =>
            '<p class="comment-form-url">' .
            '<input id="url" name="url" type="text" placeholder="'.__('http:// ', 'popo-real-estate').'" class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) .
            '" size="30" /></p>',
    );

    comment_form(
        array(
            'id_form'           => 'commentform',
            'title_reply_before'    => '<h2>',
            'title_reply_after'    => '</h2>',
            'class_form'      => 'form-horizontal',
            'id_submit'         => 'submit',
            'class_submit'      => 'submit',
            'name_submit'       => 'submit',
            'title_reply'       => __( 'Leave a comment', 'popo-real-estate' ),
            'title_reply_to'    => __( 'Leave a comment to %s', 'popo-real-estate' ),
            'cancel_reply_link' => __( 'Cancel comment', 'popo-real-estate' ),
            'label_submit'      => __( 'Post comment' , 'popo-real-estate' ),
            'format'            => 'xhtml',

            'comment_field' =>  '<p class="comment-form-comment"><textarea id="comment" class="form-control" placeholder="'.__('Your Comment', 'popo-real-estate').'" name="comment" rows="5" aria-required="true">' .
                '</textarea></p>',

            'must_log_in' => '<p class="must-log-in">' .
                sprintf(
                    __( 'You must be <a href="%s">logged in</a> to post a comment.', 'popo-real-estate' ),
                    wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                ) . '</p>',

            'logged_in_as' => '<p class="logged-in-as">' .
                sprintf(
                    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'popo-real-estate' ),
                    admin_url( 'profile.php' ),
                    $user_identity,
                    wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                ) . '</p>',

            'comment_notes_before' => '<p class="comment-notes">' .
                __( 'Your email address will not be published.', 'popo-real-estate' ) . ( $req ? $required_text : '' ) .
                '</p>',

            'comment_notes_after' => '<p class="form-allowed-tags">' .
                sprintf(
                    __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'popo-real-estate' ),
                    ' <code>' . allowed_tags() . '</code>'
                ) . '</p>',

            'fields' => apply_filters( 'comment_form_default_fields', $fields ),
        )
    );
    ?>

</div><!-- .comments-area -->

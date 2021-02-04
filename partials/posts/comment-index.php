<?php
if ( post_password_required() ) {
  return;
}

if ( have_comments() ) : ?>
  <section id="comments">
    <h3><?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number()), number_format_i18n(get_comments_number()), get_the_title()); ?></h3>

    <ul class="comment-list">
      <?php wp_list_comments(); ?>
    </ul>

    <?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
    <nav>
      <ul class="pager">
        <?php if ( get_previous_comments_link() ) : ?>
          <li class="previous"><?php previous_comments_link(__('&larr; Older comments')); ?></li>
        <?php endif; ?>
        <?php if (get_next_comments_link()) : ?>
          <li class="next"><?php next_comments_link(__('Newer comments &rarr;')); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
  <?php endif; ?>

  <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
  <div class="alert">
    <?php _e('Comments are closed.'); ?>
  </div>
<?php endif; ?>
</section>
<?php endif; ?>

<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
<section id="comments">
  <div class="alert">
    <?php _e('Comments are closed.'); ?>
  </div>
</section>
<?php endif; ?>

<?php if (comments_open()) : ?>
  <section id="respond">

    <div class="comment-intro">
      <h3>Leave A Comment:</h3>
      <p>Your email address will not be published. <br>
      Required fields are marked with a “*”.</p>
    </div>

    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
    <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form action="<?= get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.'), get_option('siteurl'), $user_identity); ?>
            <a href="<?= wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account'); ?>"><?php _e('Log out &raquo;'); ?></a>
          </p>
          <?php else : ?>
            <div class="comment-form-field">
              <label for="author"><?php _e('Name'); if ($req) _e(' (required)'); ?></label>
              <input type="text" class="text" name="author" id="author" value="<?= esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
            </div>
            <div class="comment-form-field">
              <label for="email"><?php _e('Email (will not be published)'); if ($req) _e(' (required)'); ?></label>
              <input type="email" class="text" name="email" id="email" value="<?= esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
            </div>
            <div class="comment-form-field">
              <label for="url"><?php _e('Website'); ?></label>
              <input type="url" class="text" name="url" id="url" value="<?= esc_attr($comment_author_url); ?>" size="22">
            </div>
          <?php endif; ?>
          <div class="comment-form-field">
            <label for="comment"><?php _e('Comment'); ?></label>
            <textarea name="comment" id="comment" class="input-xlarge" rows="5" aria-required="true"></textarea>
          </div>
          <input name="submit" class="btn btn-primary" type="submit" id="submit" value="<?php _e('Submit Comment'); ?>">
          <?php comment_id_fields(); ?>
          <?php do_action('comment_form', $post->ID); ?>
        </form>
      <?php endif; ?>
    </section>
  <?php endif; ?>

<div class="comment-entry">

  <div class="comment-header">
    <?= get_avatar($comment, $size = '64'); ?>
    <p class="comment-author"><?= get_comment_author_link(); ?></p>
    <div class="comment-time"><time datetime="<?= comment_date('c'); ?>"><?php printf(__('%1$s'), get_comment_date(),  get_comment_time()); ?></time>
      <?php edit_comment_link(__('(Edit)'), '', ''); ?></div>
    </div>


    <div class="comment-content">
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert">
          <p><?php _e('Your comment is awaiting moderation.'); ?></p>
        </div>
      <?php endif; ?>

      <?php comment_text(); ?>
    </div>

    <?php comment_reply_link(array_merge(array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
  </div>

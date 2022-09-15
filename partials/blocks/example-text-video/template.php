<?php
/*
Block Name: Text & Video
Block Description: 50/50 video popup, direction, text, heading & button
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: format-video
Block Toggle: true
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group     = blockFieldGroup(__FILE__); // REQUIRED
  $heading   = $group['heading'];
  $content   = $group['content'];
  $image     = $group['image'];
  $video_url = $group['video_url'];
  $direction = $group['direction'] === 'reverse' ? ' reverse' : NULL;
?>

  <?php if ( !empty($content) && !empty($video_url) ) : ?>
    <section <?php block_class_id( $block,'text-video-row' . $direction  ); ?>>
      <div class="wrapper">

        <?php if ( !empty($heading) ) echo "<div class='text-video-row--heading'><h2>{$heading}</h2></div>"; ?>

        <div class="text-video-row--content flex">
          <div class="video">
            <figure>
              <a 
                href  = "<?= $video_url; ?>"
                title = "Open video in popup"
                data-fancybox = "video-gallery">
                <?php echo wp_get_attachment_image( $image['id'], 'large' ); ?>
                <?php svg_inline('icon-play-video.svg'); ?>
              </a>
            </figure>
          </div>
          <div class="text">
            <div class="inner">
              <?= $content; ?>
              <?php get_template_part('partials/elements/button', null, [ 
                'button_group' => $group['button_group'],
              ]); ?>
            </div>
          </div>
        </div>

      </div>
    </section>
  <?php endif; ?>

<?php endif; ?>

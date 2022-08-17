<?php
/*
Block Name: Text & Image
Block Description: 50/50 image, text, direction & button
Block Category: Custom
Block Align: full
Block Icon: index-card
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group        = blockFieldGroup(__FILE__); // REQUIRED
  $image        = $group['image'];
  $content      = $group['content'];
  $direction    = $group['direction'] === 'reverse' ? ' reverse' : NULL;
?>

  <?php if ( !empty($content) && $image ) : ?>
    <section <?php block_class_id( $block,'text-image-medium-row' . $direction ); ?>>
      <div class="wrapper flex">

        <div class="text-image-medium-row--image">
          <figure>
            <?php echo wp_get_attachment_image( $image['id'], 'wide-small' ); ?>  
          </figure>
        </div>

        <div class="text-image-medium-row--content">
          <div class="inner">
            <?= $content; ?>
            <?php get_template_part('partials/elements/button', null, [ 
              'button_group' => $group['button_group'],
            ]); ?>
          </div>
        </div>

      </div>
    </section>
  <?php endif; ?>
  
<?php endif; ?>

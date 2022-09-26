<?php
/*
Block Name: Hero
Block Description: Large hero w background image, text, button & opt. side image
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: cover-image
Block Toggle: true
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group        = blockFieldGroup(__FILE__); // REQUIRED
  $content      = $group['content'];
  $image        = $group['image'];
  $image_bg     = $group['image_bg'];
  $image_bg_url = $group['image_bg']['sizes']['large'];
  $direction    = $group['direction'] === 'reverse' ? ' reverse' : NULL;
?>

  <?php if ( !empty($content) ) : ?>
    <section <?php block_class_id( $block,'hero-row' . $direction ); ?>
    <?php if ( $image_bg_url ) echo "style='background-image: url({$image_bg_url});'"; ?>>
      <div class="wrapper flex">

        <div class="hero-row--image">
          <?php if ( $image ) : ?>
            <figure>
              <?= wp_get_attachment_image( $image['id'], 'large' ); ?>  
            </figure>
          <?php endif; ?>
        </div>

        <div class="hero-row--content">
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

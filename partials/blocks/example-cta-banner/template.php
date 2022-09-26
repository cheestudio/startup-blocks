<?php
/*
Block Name: CTA - Banner
Block Description: Medium size image banner w text & dual buttons
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: editor-insertmore
Block Toggle: true
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group   = blockFieldGroup(__FILE__); // REQUIRED
  $content = $group['content'];
  $image   = $group['image'];
?>

  <?php if ( !empty($content) ) : ?>
    <section <?php block_class_id( $block,'cta-banner-row' ); ?> style="background-image: url(<?= $image['sizes']['large']; ?>);">
      <div class="wrapper">

        <div class="cta-banner-row--content">
          <div class="inner">
            <?= $content; ?>
            <?php get_template_part('partials/elements/buttons', null, [ 
              'button_primary_group'   => $group['button_primary_group'],
              'button_secondary_group' => $group['button_secondary_group'],
            ]); ?>
          </div>
        </div>

      </div>
    </section>
  <?php endif; ?>

<?php endif; ?>

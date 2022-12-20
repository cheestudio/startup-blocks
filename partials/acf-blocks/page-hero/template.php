<?php
  $group        = blockFieldGroup(__FILE__); // REQUIRED
  $image        = $group['image'];
  $image_bg     = $group['image_bg'];
  $image_bg_url = $group['image_bg']['sizes']['large'];
  $direction    = $group['direction'] === 'reverse' ? ' reverse' : NULL;
  $template = [
    ['core/heading', [
     'level' => 1,
     'placeholder' => 'Title Goes Here',
    ]],
    ['core/paragraph', [
     'placeholder' => 'Enter paragraph copy here...',
    ]],
   ];
?>

<div <?php block_class_id( $block,'hero-row' . $direction ); ?> <?php if ( $image_bg_url ) echo "style='background-image: url({$image_bg_url});'"; ?>>
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
        <InnerBlocks template="<?=esc_attr(wp_json_encode($template));?>" />
      </div>
    </div>

  </div>
</div>
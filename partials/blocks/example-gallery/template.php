<?php
/*
Block Name: Image Gallery
Block Description: Image gallery grid w popup & heading
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: screenoptions
Block Toggle: true
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group = blockFieldGroup(__FILE__); // REQUIRED
  $heading = $group['heading'];
  $gallery = $group['gallery'];
?>

  <?php if ( $gallery ) : ?>
    <section <?php block_class_id( $block,'image-gallery-row' ); ?>>
      <div class="wrapper">

        <?php if ( !empty($heading) ) : ?>
          <div class="image-gallery-row--heading">
            <h2><?= $heading; ?></h2>
          </div>
        <?php endif; ?>

        <div class="image-gallery-row--gallery grid">
          <?php foreach ( $gallery as $image ) : ?>
            <figure>
              <a 
              title         = "View larger image"
              data-fancybox = "gallery"
              data-src      = "<?= $image['sizes']['large']; ?>"
              ><?= wp_get_attachment_image( $image['id'], 'medium' ); ?></a>
            </figure>
          <?php endforeach; ?>
        </div>

      </div>
    </section>
  <?php endif; ?>

<?php endif; ?>

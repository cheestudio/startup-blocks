<?php
/*
Block Name: Image Carousel
Block Description: Image carousel slideshow w popup & heading
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: format-gallery
Block Toggle: true
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group   = blockFieldGroup(__FILE__); // REQUIRED
  $heading = $group['heading'];
  $gallery = $group['gallery'];
  ?>

  <?php if ( $gallery ) : ?>
    <section <?php block_class_id( $block,'image-carousel-row' ); ?>>
      <div class="wrapper">

        <?php if ( !empty($heading) ) echo "<div class='image-carousel-row--heading'><h2>{$heading}</h2></div>"; ?>

        <div class="image-carousel-row--gallery carousel">
          <?php foreach ( $gallery as $image ) : ?>
            <figure 
            class = "carousel__slide"
            data-fancybox = "carousel"
            data-lazy-src = "<?= $image['sizes']['large']; ?>"
            ></figure>
          <?php endforeach; ?>
        </div>

      </div>
    </section>
  <?php endif; ?>

<?php endif; ?>

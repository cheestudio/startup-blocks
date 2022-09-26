<?php
/*
Block Name: Testimonials
Block Description: Unlimited testimonial quotes w small image, text & author credit
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: testimonial
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
  $quotes  = $group['quotes_rep'];
?>

  <?php if ( $quotes ) : ?>
    <section <?php block_class_id( $block,'testimonials-row' ); ?>>
      <div class="wrapper">

        <?php if ( !empty($heading) ) : ?>
          <div class="testimonials-row--heading">
            <h2><?= $heading; ?></h2>
          </div>
        <?php endif; ?>

        <div class="testimonials-row--quotes carousel">
          <?php foreach ( $quotes as $quote ) : 
            $image   = $quote['image'];
            $content = $quote['content'];
            $author  = $quote['author']; ?>
            <blockquote class="carousel__slide">
              <div class="inner">
                <?php if ( $image ) : ?>
                  <figure>
                    <?= wp_get_attachment_image( $image['id'], 'thumbnail' ); ?>
                  </figure>
                <?php endif; ?>
                <?= $content; ?>
                <?php if ( !empty($author) ) { ?><p class="author"><?= $author; ?></p><?php } ?>
              </div>
            </blockquote>
          <?php endforeach; ?>
        </div>

      </div>
    </section>
  <?php endif; ?>

<?php endif; ?>

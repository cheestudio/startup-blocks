<?php
 $group = blockFieldGroup(__FILE__); // REQUIRED
 $heading = $group['heading'];
 $quotes = $group['quotes_rep'];
 ?>

<div <?php block_class_id($block, 'testimonials-row');?>>
  <div class="wrapper">
  <?php if ($quotes): ?>
    <div class="testimonials-row--quotes carousel">
      <?php foreach ($quotes as $quote):
 $image = $quote['image'];
 $content = $quote['content'];
 $author = $quote['author'];?>
      <div class="testimonial-entry carousel__slide">
        <div class="inner">
          <?php if ($image): ?>
          <figure>
            <?=wp_get_attachment_image($image['id'], 'thumbnail');?>
          </figure>
          <?php endif;?>
          <blockquote class="testimonial-content">
            <?=$content;?>
            <?php if (!empty($author)) {?><cite class="author"><?=$author;?></cite><?php }?>
          </blockquote>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    <?php endif;?>
  </div>
</div>
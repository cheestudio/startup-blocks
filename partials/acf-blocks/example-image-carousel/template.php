<?php
$group = blockFieldGroup(__FILE__); // REQUIRED
$heading = $group['heading'];
$gallery = $group['gallery'];
?>
<div <?php block_class_id($block, 'image-carousel-row');?>>
  <div class="wrapper">
  <?php if ( $gallery ) : ?>
    <div class="image-carousel-row--gallery carousel">
      <?php foreach ($gallery as $image): ?>
      <figure class="carousel__slide" data-fancybox="carousel" data-lazy-src="<?=$image['sizes']['large'];?>"></figure>
      <?php endforeach;?>
    </div>
    <?php endif; ?>
  </div>
</div>
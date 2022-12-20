<?php
$group = blockFieldGroup(__FILE__); // REQUIRED
$gallery = $group['gallery'];
?>

<div <?php block_class_id($block, 'image-gallery-row');?>>
  <div class="wrapper">
    <?php if ($gallery): ?>
    <div class="image-gallery-row--gallery grid">
      <?php foreach ($gallery as $image): ?>
      <figure>
        <a title="View larger image" data-fancybox="gallery" data-src="<?=$image['sizes']['large'];?>"><?=wp_get_attachment_image($image['id'], 'medium');?></a>
      </figure>
      <?php endforeach;?>
    </div>
    <?php endif;?>
  </div>
</div>
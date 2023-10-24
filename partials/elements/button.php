<?php
$custom = $args['custom'];
// ACF Field
if (!$custom) {
  $group  = $args['button_group'];
  $toggle = $group['toggle'];
  $color  = $group['color']; // optional
  $link   = $group['link'];
  $url    = $link['url'];
  $title  = $link['title'];
  $target = $link['target'];

  // Custom 
} else {
  $toggle = true;
  $color  = 'black'; // optional
  $url    = $args['url'];
  $title  = $args['title'];
  $target = isset($args['target']) ?: '';
} ?>

<?php if (isset($toggle) && $toggle && !empty($url)) : ?>
  <div class="button-wrap">
    <a class="button <?= $color; ?>" href="<?= esc_url($url); ?>" title="Link to <?= esc_attr($title); ?>" <?= !empty($target) ? "target='_blank'" : NULL; ?>><span><?= esc_html($title); ?></span></a>
  </div>
<?php endif; ?>

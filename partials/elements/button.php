<?php
$group  = $args['button_group'];
$toggle = $group['toggle'];
$link   = $group['link'];
$color  = $group['color'];
?>

<?php if ( isset($toggle) && $toggle && !empty($link) ) : ?>
  <div class="button-wrap">
    <a 
    class = "button <?= $color; ?>" 
    href  = "<?= esc_url( $link['url'] ); ?>" 
    title = "Link to <?= esc_attr( $link['title'] ); ?>" 
    <?= !empty( $link['target'] ) ? "target='_blank'" : NULL; ?>
    ><?= esc_html( $link['title'] ); ?></a>
  </div>
<?php endif; ?>

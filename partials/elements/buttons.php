<?php
$group_primary   = $args['button_primary_group'];
$group_secondary = $args['button_secondary_group'];
?>

<?php if ( $group_primary || $group_secondary ) : ?>
  <div class="buttons-wrap">
    <?php get_template_part('partials/elements/button', null, [ 
      'button_group' => $group_primary['button_group'],
    ]); ?>
    <?php get_template_part('partials/elements/button', null, [ 
      'button_group' => $group_secondary['button_group'],
    ]); ?>
  </div>
<?php endif; ?>

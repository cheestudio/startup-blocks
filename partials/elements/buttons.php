<?php
$buttons = $args['buttons_rep']; ?>

<?php if ($buttons) : ?>
  <div class="buttons-wrap">
    <?php foreach ($buttons as $button) : ?>
      <?php get_template_part('partials/elements/button', null, [
        'button_group' => $button['button_group']
      ]); ?>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

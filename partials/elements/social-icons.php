
<?php // Social Icons
if ( function_exists('get_field') ) :
  $icons = get_field('social_media_icons', 'option'); ?>

  <?php if ( $icons ) : ?>
    <div class="social-icons">
      <ul>
        <?php foreach ( $icons as $icon ) :
          $title = $icon['title'];
          $link  = $icon['link'];
          $class = $icon['class_name']; ?>
          <li>
            <a 
            href   = "<?= $link; ?>"
            class  = "icon"
            title  = "Link to <?= $title; ?> in new tab"
            target = "_blank"
            >
            <span class="fab fa-<?= $class; ?>"></span>
            </a>
          </li>

        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

<?php endif; ?>

<div class="mobile-nav-wrap">

  <div class="mobile-nav-header">

    <a href="<?= home_url(); ?>" class="mobile-brand" title="Tap to Go Home">
      <?php get_template_part('partials/elements/logo', null, [
        'location' => 'mobile',
      ]); ?>
    </a>

    <button class="navbar-toggle" title="Tap to Open Menu" aria-label="Open Menu">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <div class="mobile-nav">

    <?php if (has_nav_menu('mobile_nav') || has_nav_menu('primary_nav')) :

      // Use mobile nav if assigned, else use desktop nav instead
      $theme_location = has_nav_menu('mobile_nav') ? 'mobile_nav' : 'primary_nav';
      wp_nav_menu(array(
        'theme_location'       => $theme_location,
        'container'            => '',
        'container_class'      => '',
        'container_aria_label' => '',
        'menu_id'              => '',
        'menu_class'           => 'mobile-menu',
        'echo'                 => true,
        'fallback_cb'          => 'wp_page_menu',
        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'                => 10
      )); ?>
    <?php endif; ?>

  </div>

</div>

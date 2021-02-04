
<?php // Assign custom mobile logo path, or will use Desktop instead
$logo = url_exists( $logo_path . 'logo-mobile.svg' ) ? $logo_path . 'logo-mobile.svg' : $logo_desktop; ?>
<div class="mobile-nav-wrap">

  <div class="mobile-nav-header">
    <?php if ( $logo ) : ?>
      <a href="<?= home_url(); ?>" class="mobile-brand" title="Tap to Go Home" aria-label="Go Home">
        <?php svg( $logo, 'Home' ); ?>
      </a>
    <?php endif; ?>

    <button class="navbar-toggle" title="Tap to Open Menu" aria-label="Open Menu">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <div class="mobile-nav">

    <?php // Use custom mobile nav if assigned, or will use desktop instead
    $theme_location = has_nav_menu( 'mobile_nav' ) ? 'mobile_nav' : 'primary_nav';
    wp_nav_menu( array(
      'theme_location'  => $theme_location,
      'container'       => '',
      'container_class' => '',
      'menu_id'         => '',
      'menu_class'      => 'mobile-menu',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'depth'           => 2
    )); ?>
  </div>

</div>

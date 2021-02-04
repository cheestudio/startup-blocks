<div class="desktop-nav-wrap">
  <?php wp_nav_menu( array(
    'theme_location'  => 'primary_nav',
    'container'       => '',
    'container_class' => '',
    'menu_id'         => '',
    'menu_class'      => 'desktop-menu',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    'depth'           => 2
  )); ?>
</div>

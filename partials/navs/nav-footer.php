<?php if ( has_nav_menu( 'footer_nav' ) ) : ?>

    <div class="footer-nav-wrap">
      <?php wp_nav_menu( array(
        'theme_location'       => 'footer_nav',
        'container'            => '',
        'container_class'      => '',
        'container_aria_label' => '',
        'menu_id'              => '',
        'menu_class'           => 'footer-menu',
        'echo'                 => true,
        'fallback_cb'          => 'wp_page_menu',
        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'                => 2
    )); ?>
</div>

<?php endif; ?>

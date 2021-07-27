<?php // VARs & optional ACF code
$logo        = get_template_directory_uri() . '/assets/img/svg/logo.svg';
$footer_code = get_field('footer_code', 'option'); ?>

</main>

<footer class="footer">
  <div class="container">

    <?php if ( $logo ) : ?>
      <div class="footer--logo">
        <a href="#top-of-page" class="footer-brand" title="Go to Top of Page">
          <img src="<?= esc_html( $logo ); ?>" alt="Site Logo">
        </a>
      </div>
    <?php endif; ?>

    <div class="footer--menu">
      <?php include( locate_template('partials/navs/nav-footer.php') ); ?>
    </div>

    <div class="footer--social">
      <?php include( locate_template('partials/elements/social-icons.php') ); ?>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>

<?php if ( isset($footer_code) ) echo $footer_code; ?>
</body>
</html>

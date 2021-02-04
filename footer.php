<?php // VARs & optional ACF code
$logo        = get_template_directory_uri() . '/assets/img/svg/logo.svg';
$phone       = get_field('company_phone', 'option');
$email       = get_field('company_email', 'option');
$address     = get_field('company_address', 'option');
$copyright   = get_field('company_copyright', 'option');
$footer_code = get_field('footer_code', 'option'); ?>

</main>

<footer class="footer">
  <div class="container">

    <?php if ( $logo ) : ?>
      <div class="footer--logo">
        <a href="#top-of-page" class="footer-brand" title="Go to Top of Page">
          <?php svg( $logo, 'Home' ); ?>
        </a>
      </div>
    <?php endif; ?>

    <div class="footer--menu">
      <?php include( locate_template('partials/navs/nav-footer.php') ); ?>
    </div>

    <div class="footer--social">
      <?php include( locate_template('partials/elements/social-icons.php') ); ?>
    </div>

    <div class="footer--contact">
      <?php if ( $address ) : ?>
        <div class="address"><?= $address; ?></div>
      <?php endif; ?>
      <?php if ( $phone ) : ?>
        <p class="phone">
          <a href="tel:+1-<?= sanitize_title_with_dashes( $phone ); ?>" title="Link to Call Us"><?= $phone; ?></a>
        </p>
      <?php endif; ?>
      <?php if ( $email ) : ?>
        <p class="email">
          <a href="mailto:<?= $email; ?>" title="Link to Email Us"><?= $email; ?></a>
        </p>
      <?php endif; ?>
    </div>

    <div class="footer--copyright">
      <?= $copyright; ?>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>

<?php if ( isset($footer_code) ) echo $footer_code; ?>
</body>
</html>

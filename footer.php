
<?php // VARs & Optional ACF Footer Code
$logo = get_template_directory_uri() . '/assets/img/svg/logo.svg';
if ( function_exists('get_field') ) :
 $footer_code = get_field('footer_code', 'option');
endif; ?>

</main>

<footer class="footer">
  <div class="container">

    <?php if ($logo): ?>
      <div class="footer--logo">
        <a href="<?= home_url(); ?>" class="footer-brand" title="Go to Top of Page">
          <?php svg( $logo, 'Site Logo' ); ?>
        </a>
      </div>
    <?php endif;?>

    <div class="footer--menu">
      <?php include locate_template('partials/navs/nav-footer.php');?>
    </div>

    <div class="footer--social">
      <?php include locate_template('partials/elements/social-icons.php');?>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>

<?php if ( isset($footer_code) ) echo $footer_code; ?>

</body>
</html>

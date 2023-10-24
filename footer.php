<?php // VARs & Optional ACF Footer Code
if (function_exists('get_field')) :
  $footer_code = get_field('footer_code', 'option');
endif; ?>

</main>

<footer class="footer">
  <div class="container">

    <div class="footer--logo">
      <a href="<?= home_url(); ?>" class="footer-brand" title="Link to Go Home">
        <?php get_template_part('partials/elements/logo', null, [
          'location' => 'footer',
        ]); ?>
      </a>
    </div>

    <div class="footer--menu">
      <?php get_template_part('partials/navs/nav-footer'); ?>
    </div>

    <div class="footer--social">
      <?php get_template_part('partials/elements/social-icons'); ?>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>

<?php if (isset($footer_code)) echo $footer_code; ?>

</body>

</html>

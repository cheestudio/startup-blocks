<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>


<?php if ( have_posts() ):?>
  <section class="post-single">
    <div class="container">

      <div class="post-single--content">
        <?php while ( have_posts() ) : the_post();?>
          <?php get_template_part('partials/posts/post-single'); ?>
        <?php endwhile; ?>
      </div>

    </div>
  </section>
<?php endif; ?>


<?php get_footer(); ?>

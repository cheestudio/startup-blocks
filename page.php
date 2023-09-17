<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>


<div class="content-blocks">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php if (post_password_required()) : ?>
        <div class="password-protected-content">
          <h1><?php the_title(); ?></h1>
          <?= get_the_password_form(); ?>
        </div>
      <?php else : ?>
        <?php the_content(); ?>
      <?php endif; ?>
    <?php endwhile; ?>
  <?php endif; ?>
</div>


<?php get_footer();?>

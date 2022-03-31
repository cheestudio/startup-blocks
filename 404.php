<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>


<?php // Look for a page slug "error-404"
$errorPage = new WP_Query(array( 
 'post_type' => 'page',
 'name'      => 'error-404'
)); ?>

<div class="content-blocks">
  <?php if ( $errorPage->have_posts() ) : ?>
    <?php while ( $errorPage->have_posts() ) : $errorPage->the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <h1 style="text-align:center">404 - Page Not Found</h1>
    <p style="text-align:center"><a href="/" title="Link to homepage">Return to homepage</a></p>

  <?php endif; ?>
</div>


<?php get_footer(); ?>

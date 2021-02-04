<?php get_header(); ?>


<?php // Look for a page slug "error-404"
$errorPage = new WP_Query(array( 
 'post_type' => 'page',
 'name'      => 'error-404'
)); ?>

<section class="default-page">
  <div class="container">
    <div class="default-page--content">

      <?php if ( $errorPage->have_posts() ) : ?>
        <?php while ( $errorPage->have_posts() ) : $errorPage->the_post(); ?>
          <h1><?php the_title(); ?></h1>
          <?php the_content(); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

      <?php else : ?>
        <h1>404 - Page Not Found</h1>
        <h3>Do you think this is a site error?</h3>
        <p><strong><a href="/contact/" title="Contact us">Contact us</a></strong> and let us know so we can look into it!</p>
        <?php get_search_form(); ?>

      <?php endif; ?>
    </div>
  </div>
</section>


<?php get_footer(); ?>

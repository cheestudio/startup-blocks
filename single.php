<?php get_header(); ?>


<?php if ( have_posts() ) : ?>
  <section class="post-single">
    <div class="container">

      <div class="post-single--content">
        <?php while ( have_posts() ) : the_post();?>
          <?php include( locate_template('partials/posts/post-single.php') ); ?>
        <?php endwhile; ?>
      </div>

    </div>
  </section>
<?php endif; ?>


<?php get_footer(); ?>

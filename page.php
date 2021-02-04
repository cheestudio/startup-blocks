<?php get_header(); ?>

<?= get_field('title1');?>

<?php if ( have_posts() ) : ?>
  <div class="default-page">
    <div class="container">

      <div class="default-page--content">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content();?>
        <?php endwhile; ?>
      </div>

    </div>
  </div>
<?php endif; ?>


<?php get_footer(); ?>

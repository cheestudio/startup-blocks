<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>


<section class="posts-index">
  <div class="container">
    
    <div class="posts-index--title">
      <h1>Posts Index</h1>
    </div>

    <div class="posts-index--content">
      <?php if ( have_posts() ) : ?>
        <div class="posts-grid">
          <div class="grid">
            <?php while ( have_posts() ) : the_post(); ?>
              <?php get_template_part('partials/posts/post-entry'); ?>
            <?php endwhile; ?>
          </div>
        </div>

      <?php else :  ?>
        <h2>No Posts Found</h2>
        <?php get_search_form(); ?>

      <?php endif; ?>
    </div>

    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
      <div class="posts-index--pagination">
        <?php get_template_part('partials/posts/post-pagination'); ?>
      </div>
    <?php endif; ?>

  </div>
</section>


<?php get_footer(); ?>

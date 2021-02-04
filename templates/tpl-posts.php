<?php
/* Template Name: Posts Index
========================================================= */ ?>

<?php get_header(); ?>


<section class="posts-index">
  <div class="container">

    <div class="posts-index--title">
      <h1>Posts Index Page</h1>
    </div>

    <?php // WP_Query Loop
    $paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : 1;
    $args  = array(
      'post_type'      => 'post',
      'posts_per_page' => 6,
      'paged'          => $paged
    );
    $wp_query = new WP_Query( $args ); ?>

    <div class="posts-index--content">
      <?php if ( $wp_query->have_posts() ) : ?>
        <div class="posts-grid">
          <div class="grid">
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
              <?php include( locate_template('partials/posts/post-entry.php') ); ?>
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
        <?php include( locate_template('partials/posts/post-pagination.php') ); ?>
      </div>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

  </div>
</section>


<?php get_footer(); ?>

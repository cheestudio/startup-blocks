<?php get_header(); ?>


<section class="search-index">
  <div class="container">

    <div class="search-index--title">
      <h1>Search Results:</h1>
      <h3><em>"<?php the_search_query() ?>"</em></h3>
    </div>

    <div class="search-index--content">
      <?php if ( have_posts() ) : ?>
        <div class="posts-grid">
          <div class="flex">
            <?php while ( have_posts() ) : the_post(); ?>
              <?php include( locate_template('partials/posts/post-entry.php') ); ?>
            <?php endwhile; ?>

          <?php else : ?>
            <h3>No Posts Found</h3>
            <p>Try another search?</p>
            <?php get_search_form(); ?>

          </div>
        </div>
      <?php endif; ?>
    </div>

    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
      <div class="search-index--pagination">
        <?php include( locate_template('partials/posts/post-pagination.php') ); ?>
      </div>
    <?php endif; ?>

  </div>
</section>


<?php get_footer(); ?>

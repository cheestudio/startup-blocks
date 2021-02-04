<?php get_header(); ?>


<div class="archive-index">
  <div class="container">

    <div class="archive-index--title">
      <h1>
        <?php
        if ( is_category() ) :
          echo single_cat_title( '<strong>CATEGORY: </strong>');

        elseif ( is_tag() ) :
          echo single_tag_title( '<strong>TAG: </strong>' );

        elseif ( is_author() ) :
          the_post();
          echo '<strong>AUTHOR: </strong>' . get_the_author();
          rewind_posts();

        else :
          _e( 'Archives');

        endif; ?>
      </h1>
    </div>

    <div class="archive-index--content">
      <?php if ( have_posts() ) : ?>
        <div class="posts-grid">
          <div class="flex">
            <?php while ( have_posts() ) : the_post(); ?>
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

  </div>
</div>


<?php get_footer(); ?>

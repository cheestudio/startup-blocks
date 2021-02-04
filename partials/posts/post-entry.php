<article class="post-entry">

  <div class="post-entry__title">
    <h3>
      <a 
      href  = "<?php the_permalink();?>"
      title = "Read more about <?php the_title(); ?>"
      ><?php the_title(); ?></a>
    </h3>
  </div>

  <?php if ( has_post_thumbnail() ) : ?>
    <div class="post-entry__image">
      <a 
      href  = "<?php the_permalink();?>"
      title = "Read more about <?php the_title(); ?>"
      ><?php the_post_thumbnail('medium' ); ?></a>
    </div>
  <?php endif; ?>

  <div class="post-entry__meta">
    <?php include( locate_template('partials/posts/post-meta.php') ); ?>
  </div>

  <div class="post-entry__excerpt">
    <?php the_excerpt(); ?>
    <div class="button-wrap">
      <a 
      class = "button"
      href  = "<?php the_permalink(); ?>"
      title = "Read more about <?php the_title(); ?>"
      >Read More</a>
    </div>
  </div>

</article>

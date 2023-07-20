<article class="article-single">

  <div class="article-single__title">
    <h1><?php the_title(); ?></h1>
  </div>

  <?php if ( has_post_thumbnail() ) : ?>
    <div class="article-single__image"><?php the_post_thumbnail('large'); ?></div>
  <?php endif; ?>

  <div class="article-single__meta">
    <?php get_template_part('partials/posts/post-meta'); ?>
  </div>

  <div class="article-single__content">
    <?php the_content(); ?>
  </div>

</article>


<?php //comments_template('/partials/posts/comments.php'); ?>

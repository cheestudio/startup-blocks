
<?php // Do not display on Search Results page
if ( !is_search() ) : ?>
  <div class="post-meta">

    <p class="date">
      <time datetime="<?= get_the_time( 'c' ); ?>"><?= get_the_date(); ?></time>
    </p>

    <?php // Categories
    if ( get_the_category() ) : ?>
      <p class="categories">
        <strong>Categories: </strong><?php the_category( ', ' ); ?>
      </p>
    <?php endif; ?>

    <?php // Tags
    if ( get_the_tags() ): ?>
      <p class="tags">
        <strong>Tags: </strong><?php the_tags( '' ); ?>
      </p>
    <?php endif; ?>

    <?php // Author
    $name = get_the_author_meta('display_name');
    $url  = get_author_posts_url( get_the_author_meta('ID') ); ?>
    <p class="author">
      <strong>Author: </strong>
      <a 
      href  = "<?= $url; ?>"
      title = "View more posts by <?= $name; ?>"
      ><?= $name; ?></a>
    </p>

  </div>
<?php endif; ?>

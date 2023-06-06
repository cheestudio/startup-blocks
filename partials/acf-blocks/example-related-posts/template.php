<?php
$group = blockFieldGroup(__FILE__); // REQUIRED
$choice = $group['related_choice'];
?>

<div <?php block_class_id($block, 'related-posts-row');?>>
  <div class="wrapper">
    <div class="related-posts-row--grid grid">
      <?php if ($choice === 'manual'):
 $posts = $group['related_picker'];?>
      <?php if ($posts): ?>
      <?php foreach ($posts as $post): setup_postdata($post);
  $id = $post->ID;
  $title = get_the_title($id);
  $image_id = get_post_thumbnail_id($id);
  $permalink = get_the_permalink($id);
  $excerpt = get_the_excerpt($id);?>

      <article class="post">
        <?php if ($image_id != 0): ?>
        <figure class="image">
          <a href="<?=$permalink;?>" title="View The <?=$title;?> Article">
            <?=wp_get_attachment_image($image_id, 'medium');?>
          </a>
        </figure>
        <?php endif;?>
        <h3>
          <a href="<?=$permalink;?>" title="View The <?=$title;?> Article">
            <?=$title;?>
          </a>
        </h3>
        <p><?=$excerpt;?></p>
        <div class="button-wrap">
          <a href="<?php the_permalink();?>" class="button">Read More</a>
        </div>
      </article>

      <?php endforeach;?>
      <?php wp_reset_postdata();?>
      <?php endif;?>

      <?php elseif ($choice != 'manual'): ?>
      <?php switch ($choice):
case 'auto':
 $orderby = 'date';
 break;

case 'random':
 $orderby = 'rand';
 break;
 endswitch;?>

      <?php $posts = new WP_Query(array(
  'post_type' => 'post',
  'orderby' => $orderby,
  'order' => 'DESC',
  'posts_per_page' => 3,
 ));?>

      <?php if ($posts->have_posts()): ?>
      <?php while ($posts->have_posts()): $posts->the_post();?>

      <article class="post">
        <?php if (has_post_thumbnail()): ?>
        <figure class="image">
          <a href="<?php the_permalink();?>" title="View The <?=the_title();?> Article">
            <?php the_post_thumbnail('medium');?>
          </a>
        </figure>
        <?php endif;?>
        <h3>
          <a href="<?php the_permalink();?>" title="View The <?=the_title();?> Article">
            <?php the_title();?>
          </a>
        </h3>
        <?php the_excerpt();?>
        <div class="button-wrap">
          <a class="button" href="<?php the_permalink();?>" title="View The <?=the_title();?> Article">
            Read More
          </a>
        </div>
      </article>

      <?php endwhile;?>
      <?php endif;?>
      <?php wp_reset_postdata();?>
      <?php endif;?>
    </div>

  </div>
</div>
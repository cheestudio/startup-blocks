<?php 
  if ( !defined('ABSPATH') ) exit;
  get_header();
?>

<?php 
$settings = get_default_block_editor_settings();
?>
<pre>
	 <?php print_r($settings);?>
</pre>
<div class="content-blocks">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>

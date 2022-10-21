<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
  <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= home_url(); ?>/feed/">

  <?php // Logos & Optional ACF Header Code
  require_once locate_template('/init/shortcodes.php');
  $logo = get_template_directory_uri() . '/assets/img/svg/logo.svg';
  if ( function_exists('get_field') ) :
    $head_code = get_field('head_code', 'option');
    $body_code = get_field('body_code', 'option');
  endif;
  if ( isset( $head_code ) ) echo $head_code; ?>
</head>

<body <?php body_class(); ?> id="top-of-page">

  <!-- Accessibility Skip to Content -->
  <a class="skip-link screen-reader-text" href="#top-of-content"><?php esc_html_e( 'Skip to content', 'chee' ); ?></a>

  <?php // Optional ACF Body Code
  if ( isset($body_code) ) echo $body_code; ?>

  <header class="main-banner">
    <div class="container">

      <div class="logo-brand">
        <a href="<?= home_url(); ?>" class="brand" title="Home">
          <img src="<?= $logo; ?>" alt="Site Logo">
        </a>
      </div>

      <nav>
        <?php get_template_part('partials/navs/nav-desktop');?>
        <?php get_template_part('partials/navs/nav-mobile');?>
      </nav>

    </div>
  </header>

  <main id="top-of-content">

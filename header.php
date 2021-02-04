<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#00704a">
  <?php wp_head(); ?>
  <link rel="alternate" type="application/rss+xml" title="<?= get_bloginfo('name'); ?> Feed" href="<?= home_url(); ?>/feed/">

  <?php // Logos & Optional ACF code
  $logo_path    = get_template_directory_uri() . '/assets/img/svg/';
  $logo_desktop = $logo_path . 'logo.svg';
  $head_code    = get_field('head_code', 'option');
  $body_code    = get_field('body_code', 'option');
  if ( isset( $head_code ) ) echo $head_code; ?>
</head>

<body <?php body_class(); ?> id="top-of-page">
  <?php if ( isset($body_code) ) echo $body_code; ?>

  <header class="main-banner">
    <div class="container">
      <?php if ( $logo_desktop ) : ?>
        <a href="<?= home_url(); ?>" class="brand" title="Home">
          <?php svg( $logo_desktop, 'Home' ); ?>
        </a>
      <?php endif; ?>

      <nav>
        <?php include( locate_template('partials/navs/nav-desktop.php') ); ?>
        <?php include( locate_template('partials/navs/nav-mobile.php') ); ?>
      </nav>

    </div>
  </header>

  <main>

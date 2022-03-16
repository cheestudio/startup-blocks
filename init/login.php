<?php 

/* Custom Login Styles
========================================================= */
add_action('login_enqueue_scripts', 'custom_login_screen');
function custom_login_screen() { ?>
  <style type="text/css">
    body {
      background: #eee !important;
    }

    #loginform {
      border: none;
      box-shadow:0px 0px 10px rgba(0,0,0,0.3);
      background: #fff;
      border:2px solid white;
    }

    #loginform label {
      font-weight: 600;
      color: #555;
      margin-bottom: 5px;
    }

    #login h1 a {
      padding-bottom: 0px;
      background-image: url('<?= get_stylesheet_directory_uri(); ?>/assets/img/svg/logo.svg');
      background-size: contain;
      width: 320px;
      height: 200px;
    }

    #login a {
      transition: .6s cubic-bezier(.23, 1, .32, 1);
      color: #333 !important;
    }

    #login a:hover {
      color: #ccc !important;
    }

    #login #wp-submit {
      background: #333;
      border-radius: 0;
      border: 2px solid #333;
      box-shadow: none;
      color: white;
      cursor: pointer;
      display: inline-block;
      font-size: 16px;
      font-weight: 700;
      line-height: 1;
      padding: 10px 30px;
      text-align: center;
      text-shadow: none;
      transition: .6s cubic-bezier(.23, 1, .32, 1);
      user-select: none;
      vertical-align: baseline;
      white-space: nowrap;
      zoom: 1;
      -moz-user-select: none;
      -ms-user-select: none;
      -webkit-user-drag: none;
      -webkit-user-select: none;
    }

    #login #wp-submit:hover {
      border-color: #333;
      color: #333;
      background: white;
    }
  </style>
<?php }

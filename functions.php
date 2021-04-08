<?php
/* Theme Initialization
========================================================= */
require_once('acf-builder/autoload.php');
require_once locate_template('/init/shortcodes.php');    // Shortcodes
require_once locate_template('/init/constants.php');    // Initial theme setup and constants
require_once locate_template('/init/scripts.php');    // Theme Scripts and Stylesheets
require_once locate_template('/init/helpers.php');   // Other default theme functions
require_once locate_template('/init/custom.php');   // Custom function additions
require_once locate_template('/init/cpt.php');     // Custom Post Types
require_once locate_template('/init/acf.php');     // Advanced Custom Fields
require_once locate_template('/init/block-editor.php');     // Custom Block Editor Functions

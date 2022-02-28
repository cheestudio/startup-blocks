<?php
use Chee\PostTypeBuilder\CPT;


/* Custom Post Types
========================================================= */

$book = new CPT('book'); // Simple CPT Init

$movie = new CPT( // Custom CPT Init w/options
  [ // Names
 'post_type_name' => 'movie',
 'singular' => 'Movie',
 'plural' => 'Movies',
], 
[ // Options
  'publicly_queryable' => false,
  'taxonomies' => ['year'],
 ]
);

/* Taxonomies
========================================================= */

$book->register_taxonomy('genre'); // Simple Tax Init

$movie->register_taxonomy([ // Custom Tax Init 
 'taxonomy_name' => 'year',
 'singular' => 'Year',
 'plural' => 'Years',
 'slug' => 'movie-year',
]);

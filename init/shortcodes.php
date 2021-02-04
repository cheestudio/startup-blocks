<?php

/* Button
========================================================= */
add_shortcode('button', 'ebutton');
function ebutton($atts, $content = null) {
 extract(shortcode_atts(array(
  'align'  => '',
  'url'    => '',
  'target' => ''
), $atts));

  $output = '<div class="button-wrap"';
  if ( $align ) {
    $output .=' style="text-align: '.$align.'"';
  }
  $output .= '><a';
  if ( $target ) {
    $output .=' target="'.$target.'"';
  }
  $output .= ' href="'.$url.'" class="button">'.do_shortcode( $content ).'</a></div>';
  return $output;
}

/* Current Year (for use within WYSIWYG editor, such as a Copyright Date)
========================================================= */
add_shortcode( 'year', 'jr_cy_y' );
function jr_cy_y() {
  $date = getdate();
  return $date['year'];
}

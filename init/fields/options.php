<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$options = new FieldsBuilder('theme_options', ['style' => 'seamless']);

$options
  ->addTab('Social Media')
  ->addRepeater('social_media_icons', [
    'button_label' => 'Add Icon',
    'instructions' => '<p>If you are using FontAwesome icons: <br>
    Copy the icon name (upper left corner of the popup) you are wanting to use. (e.g. <em>facebook</em>)<br>
    A list of valid brand icons can be <a target="_blank" href="https://fontawesome.com/search?o=r&m=free&f=brands">viewed here</a></p>'
  ])
  ->addText('title')
  ->addUrl('link', [
    'required' => 1,
  ])
  ->addText('class_name', [
    'required' => 1,
  ])
  ->endRepeater()
  ->addTab('Custom Scripts')
  ->addTextarea('head_code')
  ->addTextarea('body_code')
  ->addTextarea('footer_code')

  ->setLocation('options_page', '==', 'theme-options');

return $options;

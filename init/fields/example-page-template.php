<?php

use StoutLogic\AcfBuilder\FieldsBuilder;

$templates = new FieldsBuilder(
  'template_example',
  [
    'style' => 'seamless', // or default
    'position' => 'normal' // or acf_after_title, side
  ]
);

$templates
  // ->setGroupConfig('hide_on_screen', [
  //   'the_content',
  //   'featured_image'
  // ])

  ->addGroup('template_example_group', [
    'label'        => 'Group Field for Templates',
    'instructions' => '',
    'layout'       => 'block',
  ])

  ->endGroup()

  ->setLocation('post_type', '==', 'page')
  ->and('page_template', '==', 'templates/tpl-DEFAULT.php');

return $templates;

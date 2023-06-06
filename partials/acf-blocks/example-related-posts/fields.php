<?php

/* Parse block.json */

$block_json = file_get_contents(__DIR__.'/block.json');
$block_data = json_decode($block_json,true);

/* Block Field Init */
use StoutLogic\AcfBuilder\FieldsBuilder;
$path        = basename(__DIR__);
$name        = str_replace('-', '_', $path);
$group_name  = $name . '_group';
$group_label = str_replace('-', ' ', $path);
$name        = new FieldsBuilder($name);
/* END Block Field Init */

$name
->addGroup($group_name, [
  'label'        => $block_data['title'] . ' Block',
  'instructions' => '',
  'layout'       => 'block',
]) // REQUIRED GROUP

->addButtonGroup('related_choice', [
  'label'         => 'Type',
  'layout'        => 'vertical',
  'default_value' => 'auto',
  'choices' => [
    ['auto'   => 'Recent'],
    ['random' => 'Random'],
    ['manual' => 'Manual Selection'],
  ],
  'wrapper' => [
    'class' => 'center',
  ]
])
->addRelationship('related_picker', [
  'label'        => 'Related Posts',
  'instructions' => 'Choose Three',
  'post_type'    => 'post',
  'filters'      => ['search', 'taxonomy', 'post_type'],
  'elements'     => ['featured_image'],
  'max'          => '3',
  'conditional_logic' => [
    [
      [
        'field' => 'related_choice',
        'operator' => '==',
        'value' => 'manual',
      ],
    ],
  ],
  'wrapper' => [
    'class' => 'center',
  ]
])

->endGroup() // END REQUIRED GROUP

->setLocation('block', '==', $block_data['name']);
// ->setLocation('post_type', '==', 'CPT');

return $name;

<?php

/* Parse block.json */

$block_json = file_get_contents(__DIR__.'/block.json');
$block_data = json_decode($block_json,true);
  
/* Block Field Init */
use StoutLogic\AcfBuilder\FieldsBuilder;
$path        = basename(__DIR__);
$name        = str_replace('-', '_', $path);
$group_name  = $name . '_group';
$name        = new FieldsBuilder($name);
/* END Block Field Init */

$name
->addGroup($group_name, [
  'label'        => $block_data['title'] . ' Block',
  'instructions' => '',
  'layout'       => 'block',
]) // REQUIRED GROUP

  ->addButtonGroup('direction', [
    'label'  => 'Image Side',
    'layout' => 'vertical',
    'choices' => [
      'normal'  => 'Left',
      'reverse' => 'Right',
    ],
    'wrapper' => [
      'width' => '20%',
    ]
  ])
  ->addImage('image_bg', [
    'label' => 'Background Image',
    'wrapper' => [
      'width' => '40%',
    ]
  ])
  ->addImage('image', [
    'label' => 'Side Image',
    'wrapper' => [
      'width' => '40%',
    ]
  ])

->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', $block_data['name']);

return $name;

<?php
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
  'label'        => ucwords($group_label).' Block',
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
      'class' => 'center',
      'width' => '20%',
    ]
  ])
  ->addImage('image_bg', [
    'label' => 'Background Image',
    'wrapper' => [
      'class' => 'center',
      'width' => '40%',
    ]
  ])
  ->addImage('image', [
    'label' => 'Side Image',
    'wrapper' => [
      'class' => 'center',
      'width' => '40%',
    ]
  ])
  ->addWysiwyg('content', [
    'media_upload' => 0,
    'wrapper' => [
      'class' => 'center',
    ]
  ])
  ->addFields($button)

->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', 'acf/'.$path);

return $name;

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
    'layout' => 'vertical',
    'choices' => [
      'normal'  => 'Normal',
      'reverse' => 'Reverse',
    ],
    'wrapper' => [
      'class' => 'center',
      'width' => '20%',
    ]
  ])
  ->addImage('image', [
    'wrapper' => [
      'class' => 'center',
      'width' => '30%',
    ]
  ])
  ->addWysiwyg('content', [
    'media_upload' => 0,
    'wrapper' => [
      'class' => 'center',
      'width' => '50%',
    ]
  ])
  ->addFields($button)

->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', 'acf/'.$path);

return $name;

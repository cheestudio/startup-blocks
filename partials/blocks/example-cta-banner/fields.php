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
  'label'        => ucwords($group_label) . ' Block',
  'instructions' => '',
  'layout'       => 'block',
]) // REQUIRED GROUP

  ->addWysiwyg('content', [
    'media_upload' => 0,
    'wrapper' => [
      'class' => 'center',
      'width' => '60%',
    ]
  ])
  ->addImage('image', [
    'wrapper' => [
      'class' => 'center',
      'width' => '40%',
    ]
  ])
  ->addFields($buttons)

->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', 'acf/'.$path);

return $name;
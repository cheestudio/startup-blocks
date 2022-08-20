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

  ->addText('heading', [
    'label' => 'Section Heading',
    'wrapper' => [
      'class' => 'center',
    ]
  ])
  ->addRepeater('quotes_rep',[
    'label' => 'Quotes',
    'layout' => 'table',
    'button_label' => 'Add Testimonial',
    'wrapper' => [
      'class' => 'center',
    ]
  ])
    ->addImage('image', [
      'wrapper' => [
        'width' => '30%',
      ]
    ])
    ->addWysiwyg('content', [
      'media_upload' => 0,
      'wrapper' => [
        'width' => '40%',
      ]
    ])
    ->addText('author', [
      'wrapper' => [
        'width' => '30%',
      ]
    ])
  ->endRepeater()

->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', 'acf/'.$path);

return $name;

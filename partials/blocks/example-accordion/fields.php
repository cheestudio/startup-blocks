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
  'label' => ucwords($group_label) . ' Block',
  'instructions' => '',
  'layout' => 'block',
])
  ->addText('heading', [
    'label' => 'Section Heading',
    'wrapper' => [
      'class' => 'center',
    ]
  ])
  ->addRepeater('sections_rep', [
    'label' => 'Entries',
    'layout' => 'block',
    'button_label' => 'Add Entry',
    'wrapper' => [
      'class' => 'center',
    ]
  ])
    ->addText('title')
    ->addWysiwyg('content')
  ->endRepeater()

->endGroup() // required
->setLocation('block', '==', 'acf/' . $path);

return $name;

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

  ->addRepeater('quotes_rep',[
    'label' => 'Quotes',
    'layout' => 'block',
    'button_label' => 'Add Testimonial',
  ])
    ->addImage('image')
    ->addWysiwyg('content', [
      'media_upload' => 0,
    ])
    ->addText('author')
  ->endRepeater()

->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', 'acf/'.$path);

return $name;

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

  ->addRepeater('bios_rep',[
    'label' => '',
    'layout' => 'block',
    'button_label' => 'Add Bio',
  ])
    ->addImage('image', [
      'wrapper' => [
        'class' => 'center',
        'width' => '33%',
      ]
    ])
    ->addText('name', [
      'wrapper' => [
        'class' => 'center',
        'width' => '33%',
      ]
    ])
    ->addText('title', [
      'wrapper' => [
        'class' => 'center',
        'width' => '33%',
      ]
    ])
    ->addWysiwyg('bio_short', [
      'label' => 'Bio (short)',
      'media_upload' => 0,
      'wrapper' => [
        'class' => 'center',
        'width' => '50%',
      ]
    ])
    ->addWysiwyg('bio_long', [
      'label' => 'Bio (long)',
      'media_upload' => 0,
      'wrapper' => [
        'class' => 'center',
        'width' => '50%',
      ]
    ])
  ->endRepeater()

->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', $block_data['name']);

return $name;

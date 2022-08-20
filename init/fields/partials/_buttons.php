<?php
// Example of a partial field
// 
// Usage: ->addFields($buttons)

use StoutLogic\AcfBuilder\FieldsBuilder;

$buttons = new FieldsBuilder('buttons');

$buttons
->addGroup('button_primary_group', [
  'label'        => 'Button (primary)',
  'layout'       => 'block',
  'wrapper' => [
    'class' => 'center',
  ]
])
  ->addFields($button)
->endGroup()

->addGroup('button_secondary_group', [
  'label'        => 'Button (secondary)',
  'layout'       => 'block',
  'wrapper' => [
    'class' => 'center',
  ]
])
  ->addFields($button)
->endGroup();

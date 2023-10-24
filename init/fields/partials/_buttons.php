<?php
// Example of a partial field
// 
// Usage: ->addFields($buttons)

use StoutLogic\AcfBuilder\FieldsBuilder;

$buttons = new FieldsBuilder('buttons');

$buttons
  ->addRepeater('buttons_rep', [
    'label' => 'Buttons',
    'layout' => 'table',
    'button_label' => 'Add Button'
  ])
  ->addFields($button)

  ->endRepeater();

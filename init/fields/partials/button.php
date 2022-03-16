<?php
// Usage: ->addFields($button)

use StoutLogic\AcfBuilder\FieldsBuilder;

$button = new FieldsBuilder('button');

$button

->addTrueFalse('button_toggle', [
  'label'         => 'Show Button',
  'default_value' => 0,
  'ui'            => '1',
  'wrapper' => [
    'class' => 'center',
    'width' => '25%',
  ]
])
->addLink('button', [
  'label' => 'Link',
  'wrapper' => [
    'class' => 'center',
    'width' => '25%',
  ],
  'conditional_logic' => [
    [[
      'field' => 'button_toggle',
      'operator' => '==',
      'value' => '1',
    ]]
  ]
])
->addButtonGroup('color', [
  'choices' => [
    'black'  => 'Black',
    'white'  => 'White',
  ],
  'default_value' => 'black',
  'wrapper' => [
    'class' => 'center',
    'width' => '25%',
  ],
  'conditional_logic' => [
    [[
      'field' => 'button_toggle',
      'operator' => '==',
      'value' => '1',
    ]]
  ]
])
;

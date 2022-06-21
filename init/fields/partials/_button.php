<?php
// Usage: ->addFields($button)

use StoutLogic\AcfBuilder\FieldsBuilder;

$button = new FieldsBuilder('button');

$button
->addGroup('button_group', [
  'label'        => '',
  'instructions' => '',
  'layout'       => 'block',
  'wrapper' => [
    'class' => 'center',
  ]
])
  ->addTrueFalse('toggle', [
    'label'         => 'Show Button',
    'default_value' => 0,
    'ui'            => '1',
    'wrapper' => [
      'class' => 'center',
      'width' => '25%',
    ]
  ])
  ->addLink('link', [
    'wrapper' => [
      'class' => 'center',
      'width' => '25%',
    ],
    'conditional_logic' => [
      [[
        'field'    => 'toggle',
        'operator' => '==',
        'value'    => '1',
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
        'field'    => 'toggle',
        'operator' => '==',
        'value'    => '1',
      ]]
    ]
  ])
->endGroup();

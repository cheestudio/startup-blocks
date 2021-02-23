<?php
// Example of a partial field
// 
// Usage: ->addFields($partial_reuse)

use StoutLogic\AcfBuilder\FieldsBuilder;

$partial_reuse = new FieldsBuilder('partial_reuse');

$partial_reuse

->addText('example_field');
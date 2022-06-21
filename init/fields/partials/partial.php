<?php
// Example of a partial field

// Usage: ->addFields($partial)

use StoutLogic\AcfBuilder\FieldsBuilder;

$partial = new FieldsBuilder('partial');

$partial

->addText('example_field')
;

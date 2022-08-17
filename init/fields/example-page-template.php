<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$templates = new FieldsBuilder('template_example');

$templates
->addGroup('template_example_group', [
  'label'        => 'Group Field for Templates',
  'instructions' => '',
  'layout'       => 'block',
])

->endGroup()

->setLocation('post_type', '==', 'page')
->and('page_template', '==', 'templates/tpl-DEFAULT.php');

return $templates;

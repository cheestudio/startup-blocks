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


/* 
Reference all available field options here:
https://github.com/Log1x/acf-builder-cheatsheet
https://github.com/tdwesten/acf-fieldattributes-cheatsheet/blob/master/acf-fieldattributes-cheatsheet.md
https://github.com/StoutLogic/acf-builder/wiki/field-types
*/


->endGroup() // END REQUIRED GROUP
->setLocation('block', '==', 'acf/'.$path);

return $name;

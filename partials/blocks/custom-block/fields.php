<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$path = basename(__DIR__);
$name = str_replace('-', '_', $path);
$group_name = $name.'_group';
$group_label = str_replace('-', ' ', $path);

$name = new FieldsBuilder($name);

$name
->addGroup($group_name, [
	'label' => ucwords($group_label).' Block',
	'instructions' => '',
	'layout' => 'block',
]) //REQUIRED



/* Reference all field options here:
https://github.com/tdwesten/acf-fieldattributes-cheatsheet/blob/master/acf-fieldattributes-cheatsheet.md
*/



->endGroup() // REQUIRED
->setLocation('block', '==', 'acf/'.$path);

return $name;
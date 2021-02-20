<?php
use StoutLogic\AcfBuilder\FieldsBuilder;

$path = pathinfo(__FILE__, PATHINFO_FILENAME);
$name = str_replace('-', '_', $path);
$group_name = $name.'_group';
$group_label = str_replace('-', ' ', $path);

$name = new FieldsBuilder($name);

$name
->addGroup($group_name, [
	'label' => ucwords($group_label).' Block',
	'instructions' => '',
	'layout' => 'block',
])

/* Reference all field options here:

https://github.com/tdwesten/acf-fieldattributes-cheatsheet/blob/master/acf-fieldattributes-cheatsheet.md

*/

->endGroup()
->setLocation('block', '==', 'acf/'.$path);

return $name;
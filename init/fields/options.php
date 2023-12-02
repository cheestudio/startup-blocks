<?php
use StoutLogic\AcfBuilder\FieldsBuilder;
$options = new FieldsBuilder('theme_options');

$options
->addTab('Social Media')
  ->addRepeater('social_media_icons', [
    'button_label' => 'Add Icon',
    'instructions' => '<p>If you are using FontAwesome icons: <br>
    Copy the <strong><em>end</em></strong> of the class name of the icon you’re wanting to use. (e.g. <em>facebook</em>) <br>
    A list of valid brand icons <a target="_blank" href="https://fontawesome.com/v5/search?o=r&m=free&f=brands">can be viewed here</a></p>'
  ])
    ->addText('title')
    ->addURL('link')
    ->addText('class_name')
  ->endRepeater()
->addTab('Custom Scripts')
  ->addTextarea('head_code')
  ->addTextarea('body_code')
  ->addTextarea('footer_code')

->setLocation('options_page', '==', 'theme-options');

return $options;

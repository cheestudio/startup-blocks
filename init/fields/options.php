<?php
use StoutLogic\AcfBuilder\FieldsBuilder;
$options = new FieldsBuilder('theme_options');

$options
->addTab('Social Media')
->addRepeater('social_media_icons',[
'button_label' => 'Add Icon',
'instructions' => '<p>If using FontAwesome icons: <br>
Copy/paste the class name of the icon you’re wanting to use. <br>
A list of valid icons can be found <a target="_blank" href="https://fontawesome.com/icons?d=gallery&amp;s=brands&amp;m=free">HERE</a>.</p>'
])
->addText('title')
->addURL('link')
->addText('class')
->endRepeater()
->addTab('Custom Scripts')
->addTextarea('head_code')
->addTextarea('body_code')
->addTextarea('footer_code')
->setLocation('options_page', '==', 'theme-options');

return $options;
<?php
$group = blockFieldGroup(__FILE__); // REQUIRED
$heading = $group['heading'];
$sections = $group['sections_rep'];
?>
<div <?php block_class_id($block, 'accordion-row');?>>
  <div class="wrapper">
    <div class="accordion-row--content">
      <?php foreach ($sections as $section): $i++; // title, content ?>
      <div class="entry" id="entry-<?=$i;?>">
        <div class="toggle">
          <a href="#" title="<?=$section['title'];?>">
            <h3><?=$section['title'];?></h3>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="plus" width="24" height="27.42">
              <path stroke="ff0000" d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="minus" width="24" height="27.42">
                <path fill="ff0000" d="M400 288h-352c-17.69 0-32-14.32-32-32.01s14.31-31.99 32-31.99h352c17.69 0 32 14.3 32 31.99S417.7 288 400 288z" />
              </svg>
          </a>
        </div>
        <div class="inner"><?=$section['content'];?></div>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
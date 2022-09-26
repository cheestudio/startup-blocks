<?php
/*
Block Name: Accordion / FAQs
Block Description: Unlimited items w title & basic text content
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: list-view
Block Toggle: true
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group    = blockFieldGroup(__FILE__); // REQUIRED
  $heading  = $group['heading'];
  $sections = $group['sections_rep'];
?>

  <?php if ( $sections ) : $i = 0; ?>
    <section <?php block_class_id( $block,'accordion-row' ); ?>>
      <div class="wrapper">

        <?php if ( !empty($heading) ) : ?>
          <div class="accordion-row--heading">
            <h2><?= $heading; ?></h2>
          </div>
        <?php endif; ?>

        <div class="accordion-row--content">
          <?php foreach ( $sections as $section ) : $i++; // title, content ?>
            <div class="entry" id="entry-<?= $i; ?>">
              <div class="toggle">
                <a href="#" title="<?= $section['title']; ?>">
                  <h3><?= $section['title']; ?></h3>
                  <?php svg_inline('icon-plus.svg'); ?>
                  <?php svg_inline('icon-minus.svg'); ?>
                </a>
              </div>
              <div class="inner"><?= $section['content']; ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

<?php endif; ?>

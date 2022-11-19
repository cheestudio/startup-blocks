<?php
/*
Block Name: Biographies
Block Description: Unlimited bios w image, text, button & popup
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: id-alt
Block Toggle: true
Post Types: post, page
*/

// -- NOTE: Requires Fancybox -- 

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group   = blockFieldGroup(__FILE__); // REQUIRED
  $heading = $group['heading'];
  $bios    = $group['bios_rep']; // image, name, title, bio_short, bio_long 
?>

  <?php if ( $bios ) : ?>
    <section <?php block_class_id( $block,'bios-row' ); ?>>
      <div class="wrapper">

        <?php if ( !empty($heading) ) { ?><div class="bios-row--title"><h2><?= $heading; ?></h2></div><?php } ?>

        <div class="bios-row--content">
          <div class="bio-toggles grid">
            <?php foreach ( $bios as $bio ) : 
              $image     = $bio['image'];
              $name      = $bio['name'];
              $name_slug = sanitize_title_with_dashes($name);
              $title     = $bio['title'];
              $bio_short = $bio['bio_short']; ?>
              <div class="bio">
                <figure>
                  <?= wp_get_attachment_image( $image['id'], 'medium' ); ?>
                </figure>

                <?php if ( !empty($name) ) { ?><h3><?= $name; ?></h3><?php } ?>
                <?php if ( !empty($title) ) { ?><p class="title"><?= $title; ?></p><?php } ?>
                <?php if ( !empty($bio_short) ) { ?><div class="text"><?= $bio_short; ?></div><?php } ?>

                <div class="button-wrap">
                  <a 
                  class = "button"
                  title = "Read more about <?= $name; ?>"
                  data-fancybox = "dialog"
                  data-src = "#bio-<?= $name_slug; ?>"
                  >Read More</a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          
          <div class="bio-modals">
            <?php foreach ( $bios as $bio ) : 
              $image     = $bio['image'];
              $name      = $bio['name'];
              $name_slug = sanitize_title_with_dashes($name);
              $title     = $bio['title'];
              $bio_long  = $bio['bio_long']; ?>
              <div class="bio-modal" id="bio-<?= $name_slug; ?>">
                <div class="flex">
                  <div class="image">
                    <figure>
                      <?= wp_get_attachment_image( $image['id'], 'square' ); ?>
                    </figure>
                  </div>
                  <div class="inner">
                <?php if ( !empty($name) ) { ?><h3><?= $name; ?></h3><?php } ?>
                <?php if ( !empty($title) ) { ?><p class="title"><?= $title; ?></p><?php } ?>
                <?php if ( !empty($bio_long) ) { ?><div class="text"><?= $bio_long; ?></div><?php } ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

      </div>
    </section>
  <?php endif; ?>
<?php endif; ?>

<?php
/*
Block Name: Biographies
Block Description: Bios row w image, text, button & popup
Block Category: Custom
Block Align: full
Block Icon: id
Post Types: post, page
*/

// -- NOTE: Requires LityJS -- 

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group   = blockFieldGroup(__FILE__); // REQUIRED
  $heading = $group['heading'];
  $bios    = $group['bios_rep']; // image, name, title, bio_short, bio_long ?>

  <?php if ( $bios ) : ?>
    <section <?php block_class_id( $block,'bios-row' ); ?>>
      <div class="wrapper">

        <?php if ( !empty($heading) ) echo "<div class='bios-row--title'><h2>{$heading}</h2></div>"; ?>

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
                  <?php echo wp_get_attachment_image( $image['id'], 'medium' ); ?>
                </figure>
                <?php if ( !empty($name) ) echo "<h3>{$name}</h3>"; ?>
                <?php if ( !empty($title) ) echo "<p class='title'>{$title}</p>"; ?>
                <?php if ( !empty($bio_short) ) echo "<div class='text'>{$bio_short}</div>"; ?>
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
                      <?php echo wp_get_attachment_image( $image['id'], 'square' ); ?>
                    </figure>
                  </div>
                  <div class="inner">
                    <?php if ( !empty($name) ) echo "<h3>{$name}</h3>"; ?>
                    <?php if ( !empty($title) ) echo "<p class='title'>{$title}</p>"; ?>
                    <?php if ( !empty($bio_long) ) echo "<div class='text'>{$bio_long}</div>"; ?>
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

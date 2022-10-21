<?php
/*
Block Name: Custom Block Title
Block Description: DESCRIPTION NEEDED
Block Category: Custom {CLIENT} Blocks
Block Align: full
Block Icon: block-default
Block Toggle: true
Post Types: post, page
*/

// Block Image Preview
if ( isset($block['data']['block_preview']) ) :
  block_preview(__FILE__);

// Block Content
else :
  $group = blockFieldGroup(__FILE__); // REQUIRED
  // $example_field = $group['example_field'];
?>

  <section <?php block_class_id( $block,'CUSTOM-BLOCK-CLASS' ); ?>>
    <div class="wrapper">
      
      <div class="CUSTOM-BLOCK-CLASS--content">
        
      </div>

    </div>
  </section>

<?php endif; ?>

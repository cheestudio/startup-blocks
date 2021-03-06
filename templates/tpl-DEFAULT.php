<?php
/* Template Name: DEFAULT STYLES
========================================================= */ ?>

<?php get_header(); ?>
<link rel="stylesheet" id="gform_basic-css" href="http://localhost/startup-blocks/wp-content/plugins/gravityforms/css/basic.min.css?ver=2.5.5.1" type="text/css" media="all">
<link rel="stylesheet" id="gform_theme_ie11-css" href="http://localhost/startup-blocks/wp-content/plugins/gravityforms/css/theme-ie11.min.css?ver=2.5.5.1" type="text/css" media="all">
<link rel="stylesheet" id="gform_theme-css" href="http://localhost/startup-blocks/wp-content/plugins/gravityforms/css/theme.min.css?ver=2.5.5.1" type="text/css" media="all">

<!-- PLACEHOLDER BEGIN-->
<div class="DELETE-ME">
  <div class="container">

    <h1>Heading #1</h1>
    <h2>Heading #2</h2>
    <h3>Heading #3</h3>
    <h4>Heading #4</h4>
    <h5>Heading #5</h5>
    <h6>Heading #6</h6>

    <hr>
    
    <p style="font-weight: 300">Font Weight: 300</p>
    <p style="font-weight: 400">Font Weight: 400</p>
    <p style="font-weight: 500">Font Weight: 500</p>
    <p style="font-weight: 600">Font Weight: 600</p>
    <p style="font-weight: 700">Font Weight: 700</p>
    <p style="font-weight: 800">Font Weight: 800</p>

    <hr>
    
    <ul>
      <li>Unordered list item 1</li>
      <li>Unordered list item 2</li>
      <li>Unordered list item 3</li>
    </ul>
    <hr>

    <ol>
      <li>Ordered list item 1</li>
      <li>Ordered list item 2</li>
      <li>Ordered list item 3</li>
    </ol>

    <hr>

    <p><strong>Bold Bold Bold</strong></p>

    <p><em>Italics Italics Italics</em></p>

    <p><span style="text-decoration: underline;">Underline</span> <span style="text-decoration: underline;">Underline</span> </p>

    <hr>

    <p><a href="tel:123-456-7890">123-456-7890</a></p>

    <p><a href="mailto:email@email.com">email@example.com</a></p>

    <p>Inline Links: <a href="">Link 1</a> <a href="">Link 2</a></p>

    <p style="display:inline">Non-Inline Links: </p> <a href="">Link 3</a> <a href="">Link 4</a>

    <div class="button-wrap">
      <a href="#" class="button">I'm a Button</a>
    </div>

    <hr>

    <blockquote>
      <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
      <p>- Author Name</p>
    </blockquote>

    <hr>

    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium <a href="">ut lacinia in elementum</a> id enim. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
    <p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla quis lorem ut libero malesuada feugiat. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Donec rutrum congue leo eget malesuada.</p>
    <p>Donec rutrum congue leo eget malesuada. Nulla porttitor accumsan tincidunt. Nulla quis lorem ut libero malesuada feugiat. Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta dapibus.</p>

    <hr>

    <div class="gf_browser_chrome gform_wrapper gravity-theme" id="gform_wrapper_1"><form method="post" enctype="multipart/form-data" id="gform_1" action="/startup-blocks/home/">
      <div class="gform_body gform-body"><div id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below"><fieldset id="field_1_1" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><legend class="gfield_label gfield_label_before_complex">Name<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></legend><div class="ginput_complex ginput_container no_prefix has_first_name no_middle_name has_last_name no_suffix gf_name_has_2 ginput_container_name" id="input_1_1">

        <span id="input_1_1_3_container" class="name_first">
          <input type="text" name="input_1.3" id="input_1_1_3" value="" aria-label="First name" aria-required="true">
          <label for="input_1_1_3">First</label>
        </span>

        <span id="input_1_1_6_container" class="name_last">
          <input type="text" name="input_1.6" id="input_1_1_6" value="" aria-label="Last name" aria-required="true">
          <label for="input_1_1_6">Last</label>
        </span>

      </div></fieldset><div id="field_1_2" class="gfield gfield--width-half gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_2">First Half<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></label><div class="ginput_container ginput_container_text"><input name="input_2" id="input_1_2" type="text" value="" class="large" aria-required="true" aria-invalid="false"> </div></div><div id="field_1_3" class="gfield gfield--width-half field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_3">Last Half</label><div class="ginput_container ginput_container_text"><input name="input_3" id="input_1_3" type="text" value="" class="large" aria-invalid="false"> </div></div><fieldset id="field_1_4" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><legend class="gfield_label gfield_label_before_complex">Address<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></legend>    
        <div class="ginput_complex ginput_container has_street has_street2 has_city has_state has_zip ginput_container_address" id="input_1_4">
         <span class="ginput_full address_line_1 ginput_address_line_1" id="input_1_4_1_container">
          <input type="text" name="input_4.1" id="input_1_4_1" value="" aria-required="true">
          <label for="input_1_4_1" id="input_1_4_1_label">Street Address</label>
        </span><span class="ginput_full address_line_2 ginput_address_line_2" id="input_1_4_2_container">
          <input type="text" name="input_4.2" id="input_1_4_2" value="" aria-required="false">
          <label for="input_1_4_2" id="input_1_4_2_label">Address Line 2</label>
        </span><span class="ginput_left address_city ginput_address_city" id="input_1_4_3_container">
          <input type="text" name="input_4.3" id="input_1_4_3" value="" aria-required="true">
          <label for="input_1_4_3" id="input_1_4_3_label">City</label>
        </span><span class="ginput_right address_state ginput_address_state" id="input_1_4_4_container">
          <input type="text" name="input_4.4" id="input_1_4_4" value="" aria-required="true">
          <label for="input_1_4_4" id="input_1_4_4_label">State / Province / Region</label>
        </span><span class="ginput_left address_zip ginput_address_zip" id="input_1_4_5_container">
          <input type="text" name="input_4.5" id="input_1_4_5" value="" aria-required="true">
          <label for="input_1_4_5" id="input_1_4_5_label">ZIP / Postal Code</label>
        </span><input type="hidden" class="gform_hidden" name="input_4.6" id="input_1_4_6" value="">
        <div class="gf_clear gf_clear_complex"></div>
      </div></fieldset><div id="field_1_5" class="gfield gfield--width-half gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_5">Phone<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></label><div class="ginput_container ginput_container_phone"><input name="input_5" id="input_1_5" type="text" value="" class="large" aria-required="true" aria-invalid="false"></div></div><div id="field_1_6" class="gfield gfield--width-half field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_6">Email</label><div class="ginput_container ginput_container_email">
        <input name="input_6" id="input_1_6" type="text" value="" class="large" aria-invalid="false">
      </div></div><div id="field_1_7" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_7">Message<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></label><div class="ginput_container ginput_container_textarea"><textarea name="input_7" id="input_1_7" class="textarea medium" aria-required="true" aria-invalid="false" rows="10" cols="50"></textarea></div></div><div id="field_1_11" class="gfield gsection field_sublabel_below field_description_below gfield_visibility_visible"><h3 class="gsection_title">Section Break</h3></div><fieldset id="field_1_9" class="gfield gfield--width-third gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><legend class="gfield_label gfield_label_before_complex">Untitled<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></legend><div class="ginput_container ginput_container_checkbox"><div class="gfield_checkbox" id="input_1_9"><div class="gchoice gchoice_1_9_1">
        <input class="gfield-choice-input" name="input_9.1" type="checkbox" value="First Choice" id="choice_1_9_1">
        <label for="choice_1_9_1" id="label_1_9_1">First Choice</label>
      </div><div class="gchoice gchoice_1_9_2">
        <input class="gfield-choice-input" name="input_9.2" type="checkbox" value="Second Choice" id="choice_1_9_2">
        <label for="choice_1_9_2" id="label_1_9_2">Second Choice</label>
      </div><div class="gchoice gchoice_1_9_3">
        <input class="gfield-choice-input" name="input_9.3" type="checkbox" value="Third Choice" id="choice_1_9_3">
        <label for="choice_1_9_3" id="label_1_9_3">Third Choice</label>
      </div></div></div></fieldset><div id="field_1_8" class="gfield gfield--width-third gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_8">Dropdown<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></label><div class="ginput_container ginput_container_select"><select name="input_8" id="input_1_8" class="large gfield_select" aria-required="true" aria-invalid="false"><option value="First Choice">First Choice</option><option value="Second Choice">Second Choice</option><option value="Third Choice">Third Choice</option></select></div></div><fieldset id="field_1_10" class="gfield gfield--width-third gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><legend class="gfield_label">Untitled<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></legend><div class="ginput_container ginput_container_radio"><div class="gfield_radio" id="input_1_10">
        <div class="gchoice gchoice_1_10_0">
          <input class="gfield-choice-input" name="input_10" type="radio" value="First Choice" id="choice_1_10_0" onchange="gformToggleRadioOther( this )">
          <label for="choice_1_10_0" id="label_1_10_0">First Choice</label>
        </div>
        <div class="gchoice gchoice_1_10_1">
          <input class="gfield-choice-input" name="input_10" type="radio" value="Second Choice" id="choice_1_10_1" onchange="gformToggleRadioOther( this )">
          <label for="choice_1_10_1" id="label_1_10_1">Second Choice</label>
        </div>
        <div class="gchoice gchoice_1_10_2">
          <input class="gfield-choice-input" name="input_10" type="radio" value="Third Choice" id="choice_1_10_2" onchange="gformToggleRadioOther( this )">
          <label for="choice_1_10_2" id="label_1_10_2">Third Choice</label>
        </div></div></div></fieldset><div id="field_1_12" class="gfield gfield--width-third gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_12">Date<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></label><div class="ginput_container ginput_container_date">
          <input name="input_12" id="input_1_12" type="text" value="" class="datepicker mdy datepicker_no_icon gdatepicker-no-icon hasDatepicker initialized" placeholder="mm/dd/yyyy" aria-describedby="input_1_12_date_format" aria-invalid="false" aria-required="true">
          <span id="input_1_12_date_format" class="screen-reader-text">MM slash DD slash YYYY</span>
        </div>
        <input type="hidden" id="gforms_calendar_icon_input_1_12" class="gform_hidden" value="http://localhost/startup-blocks/wp-content/plugins/gravityforms/images/datepicker/datepicker.svg"></div><fieldset id="field_1_13" class="gfield gfield--width-third gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><legend class="gfield_label gfield_label_before_complex">Time<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></legend><div class="ginput_complex">
          <div class="gfield_time_hour ginput_container ginput_container_time" id="input_1_13">
            <input type="text" maxlength="2" name="input_13[]" id="input_1_13_1" value="" placeholder="HH" aria-required="true"> 
            <label class="hour_label screen-reader-text" for="input_1_13_1">Hours</label>
          </div>
          <div class="below hour_minute_colon">:</div>
          <div class="gfield_time_minute ginput_container ginput_container_time">
            <input type="text" maxlength="2" name="input_13[]" id="input_1_13_2" value="" placeholder="MM" aria-required="true">
            <label class="minute_label screen-reader-text" for="input_1_13_2">Minutes</label>
          </div>
          <div class="gfield_time_ampm ginput_container ginput_container_time below">

            <select name="input_13[]" id="input_1_13_3" aria-label="AM/PM">
              <option value="am">AM</option>
              <option value="pm">PM</option>
            </select> 
          </div>
        </div></fieldset><div id="field_1_14" class="gfield gfield--width-third gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_14">File<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></label><div class="ginput_container ginput_container_fileupload"><input type="hidden" name="MAX_FILE_SIZE" value="8388608"><input name="input_14" id="input_1_14" type="file" class="large" aria-describedby="gfield_upload_rules_1_14" onchange="javascript:gformValidateFileSize( this, 8388608 );"><span class="gform_fileupload_rules" id="gfield_upload_rules_1_14">Max. file size: 8 MB.</span><div class="validation_message validation_message--hidden-on-empty" id="live_validation_message_1_14"></div></div></div><fieldset id="field_1_15" class="gfield gfield--width-full gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible"><legend class="gfield_label gfield_label_before_complex">Consent<span class="gfield_required"><span class="gfield_required gfield_required_asterisk">*</span></span></legend><div class="ginput_container ginput_container_consent"><input name="input_15.1" id="input_1_15_1" type="checkbox" value="1" aria-required="true" aria-invalid="false"> <label class="gfield_consent_label" for="input_1_15_1">I agree to the privacy policy.</label><input type="hidden" name="input_15.2" value="I agree to the privacy policy." class="gform_hidden"><input type="hidden" name="input_15.3" value="1" class="gform_hidden"></div></fieldset>
        <div id="field_1_17" class="gfield gform_validation_container field_sublabel_below field_description_below gfield_visibility_visible"><label class="gfield_label" for="input_1_17">Email</label><div class="ginput_container"><input name="input_17" id="input_1_17" type="text" value=""></div><div class="gfield_description" id="gfield_description_1_17">This field is for validation purposes and should be left unchanged.</div></div></div></div>
        <div class="gform_footer top_label"> <button class="button gform_button" id="gform_submit_button_1">Submit</button> 

        </div>
      </form>
    </div>

  </div>
</div>
<!-- PLACEHOLDER END -->


<?php get_footer(); ?>

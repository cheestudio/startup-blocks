## Chee Studio: Startup Theme - Blocks

[chee.studio](https://cheewebdevelopment.com)

Chee Blocks is a "framework" that was developed to streamline custom WordPress theme development, preferably using [ACF Builder](https://github.com/StoutLogic/acf-builder) and [ACF Blocks](https://www.advancedcustomfields.com/resources/blocks/). When fully utilized, it's most useful feature is the automatic registration of Blocks and ACF Fields based on a folder structure, which enable **self-contained Blocks** and a portable approach to Block development *(e.g. you can copy a "block" from one project to another and retain all it's fields, style and functionality).*

Whereas many frameworks focus on WordPress' blogging capabilities, this framework is meant for sites where WordPress will be used primarily as a *content framework*, as well as a blogging tool. The structure is fairly self explanatory, and also contains a collection of various helpers and functions that are useful in every day WordPress development. 

It assumes GULP will be used for asset compiling, and SCSS for all CSS management. The workflows for ACF Builder and ACF Blocks can be easily disabled without impacting the functionality of the rest of the framework (although you'd be missing out on the best parts!).

**Important Note:** This framework is not meant to be a *turn-key* theme, and won't offer many options beyond being an organized and streamlined way to develop a custom site using WordPress/ACF/Blocks. It's a way to stay consistent and organized and provide a solid jumping off point for each project, utilizing native WordPress functionality as much as possible. 

Since it's very unassuming, it should also blend easily with any particular development style, as well as integrate into other platforms such as WooCommerce, Elementor and Beaver Builder, if one chooses to use them.

There's absolutely nothing proprietary here, but there is a specific organization/architecture that needs to be understood, especially if you're inheriting a site built using it. 🙂 

### Setup

1) [Setting up the Build System (GULP)](#setup-gulpfilejs)
2) [Setting up the SCSS and JS Compiling](#compile-styles--js)
3) [Registering Fields Groups via ACF Builder](#registering-acf-field-groups)
4) [Registering Blocks](#registering-acf-blocks)
5) [Connecting Field Groups to Blocks](#connecting-fields-to-blocks-if-using-acf-builder)

### Setup gulpfile.js

**Note:** Both NodeJS and NPM are required to be installed in order to run the commands below.

1. In the root of the theme directory, run `npm install` to install needed packages to run gulp
2. Set the `PROJECT_NAME` variable in `gulpfile.js` to the folder name of your localhost install
3. If localhost is not being used, set `DEVELOPER_MODE` to `false` to disable the live BrowserSync refresh
4. If Blocks are being utilized, set `BLOCK_MODE` to `true` to enable SCSS compiling for individual Block folders
5. Once packages are installed and `gulpfile.js` is setup, run `gulp`
6. File watching is enabled as long as gulp is running

### Compile Styles & JS

**Note:** `.scss` files are found in `assets/scss/`

1. The `core` folder is loaded in a specific order controlled by `main.scss`. Any additional files added to the `core` folder will need to be manually added to `main.scss` or they will not be included when compiled
2. All other `.scss` files found in other folders, such as `elements, layout, pages` are automatically included when compiled and do not need to be added to `main.scss`
3. All `.scss` files will compile to `style.css` (easy to read format for dev only) and `style.min.css` that is served to the public
4. All `.js` files from `assets/js/src/` compile to `all.min.js`
5. Any JS scripts added to the `assets/js/src/plugins` folder will be included first and then compiled into the minified `all.min.js` file


### Registering ACF Field Groups

This framework will automatically register field groups located in `init/fields`. 
*This workflow is optional.*

1) Within the `init/acf.php` contains a loop that will grab all field includes and automatically register them
2) Within the `init/fields` folder is where includes for various field types would be located, with the *exception* of `blocks`
3) File names should be unique, as well as the `FieldsBuilder` names
4) Partials that are re-used should be placed under `init/fields/partials`
**Note:** Partials are parsed alphabetically. If you need to load one prior to others, add a `_` prefix to the filename (*see `_button.php` as an example*)

*To disable ACF Builder workflow:* Set `$acf_builder` to `FALSE` in `init/acf.php`.

### Registering ACF Blocks

This framework will automatically register [ACF Blocks](https://www.advancedcustomfields.com/resources/blocks/) based off their path name and template tags. *This workflow is optional.*

1. Inside `partials/blocks` are various boilerplate blocks ready to be modified. Delete any block folders you do not wish to include. The function in `init/acf.php` will loop through all sub-folders in this directory and automatically register the blocks based off their folder path name
2. Each Block contains 5 or 6 (*optional JS*) components:
* **fields.php -** This file contains the ACF Builder fields for the block. **Note:** All fields for Blocks are automatically placed into a Group field for organization and easy retreival within `template.php` by default
* **template.php -** This file contains all the markup and logic of the block, as well as the template tags to determine its Block attributes (e.g.. Title, Icon, Alignments). The name of the block that is displayed in Gutenberg is found here. Located at the top of `template.php` (following the template tags) is a simple function which will automatically establish the `$group` variable for all fields:

```php
$group = blockFieldGroup(__FILE__); // REQUIRED

/* Usage */
$example_field = $group['example_field];
```

* **style.scss -** This is the SCSS that will compile to `style.css` that is used in both the frontend and backend Gutenberg Block Editor preview views
* **script.js -** This file contains all the JS specific code for the individual block. *This file is optional*
* You can create an optional 450 x 250 pixel image named `preview.jpg` add it to the Block folder to automatically display a preview in the backend Gutenberg editor when hovering over the list of Blocks to add (*recommended*)
* Duplicate the `example-default` folder to create new Blocks. There are URL links in the `template.php` file that provide examples for the proper syntax to use to register ACF fields in the `fields.php` file
* The GULP Workflow (if `BLOCK_MODE` is set to `TRUE`), will automatically compile all SCSS files it finds in these block directories

*To disable ACF Blocks workflow:* Set `$acf_blocks` to `FALSE` in `init/acf.php`.

### Connecting Fields to Blocks (if using ACF Builder)

As stated above, this framework uses the folder/path name of the block to register and automatically connects the ACF Field Group to a Block by creating a `fields.php` inside the block folder.

**This file will do a number of things:**

```php
use StoutLogic\AcfBuilder\FieldsBuilder;
$path        = basename(__DIR__);
$name        = str_replace('-', '_', $path);
$group_name  = $name . '_group';
$group_label = str_replace('-', ' ', $path);
$name        = new FieldsBuilder($name);
```

* Import ACF Builder Class
* Set up the paths required, based off the file name
* Create a formatted string based on the path
* Create an ACF Group name based off the string
* Create a "human readable" Group Label, based off the string (this can be overwritten, as well)
* Create a Block Title that will be formatted nicely when used within the Block Editor

That's it. 👌🏻 Go build something cool.


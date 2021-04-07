## Chee Studio: Startup Theme - Blocks

[chee.studio](https://cheewebdevelopment.com)


### Setup gulpfile.js

**Note:** Both NodeJS and NPM are required to be installed in order to run the commands below.

1. In root of the theme folder, run `npm install` to install needed packages to run gulp
2. Set `PROJECT_NAME` variable to the folder name of your localhost install
3. If localhost is not being used, set `DEVELOPER_MODE` to `false` to disable BrowserSync refresh
4. If Blocks are being utilized, set `BLOCK_MODE` to `true` to enable SCSS for individual Blocks
5. Once packages are installed and `gulpfile.js` is setup, run `gulp`
6. File watching is enabled as long as gulp is running

### Compile Styles & JS

**Note:** `.scss` files are found in `assets/scss/`

1. The `core` folder is loaded in a specific order controlled by `main.scss`. Any additional files added to the `core` folder will need to be manually added to `main.scss` or they will not be included when compiled
2. All other `.scss` files found in other folders, such as `elements, layout, pages` are automatically included when compiled and do not need to be added to `main.scss`
3. All `.scss` files will compile to `style.css` (easy to read format for dev only) and `style.min.css`
4. All `.js` files from `assets/js/src/` compile to `all.min.js`


### Registering ACF Field Groups

This framework will automatically register field groups, based off their path, using [ACF Builder](https://github.com/StoutLogic/acf-builder) to construct the fields. *This workflow is optional.*

1) Within the `init/fields` folder is where includes for various field types would be located. 
2) Within the `init/acf.php` contains a loop that will grab all field includes and automatically register them. 
3) File names should be unique, as well as the `FieldsBuilder` names.


### Registering ACF Blocks

This framework will automatically register ACF Blocks based off their simple path name and template tags. *This workflow is optional.*

1. The `partials/blocks` is the folder where all custom Blocks should be located. The function in `init/acf.php` will loop through all sub-folders in this directory and register the blocks based off their folder path name. 
2. Each Block contains three components:

a) **template.php -** This file contains all the markup and logic of the block, as well as the template tags to determine it's attributes
b) **style.scss -** This is the SCSS that will compile to CSS for both the front end view and Block Editor preview
c) **script.js -** This file contains all the JS specific code for the individual block. *This file is optional.*
d) The GULP Workflow, if `BLOCK_MODE` is set to `TRUE`, will automatically compile all SCSS files it finds in these block directories.

### Connecting Fields to Blocks (if using ACF Builder)

This framework can easily connect custom field groups to blocks, purely based off the file/path names outlined above. 

1. Add a Field Group file in `/init/fields` using `custom-block.php` as an example. This field group template will do a number of things:

a) Set up the paths required, based off the file name
b) Create a formatted string based on the path
c) Create an ACF Group name based off the string
d) Create a "human readable" Group Label, based off the string (this can be overwritten, as well)
e) Create a Block Title that will be formatted nicely when used within the Block Editor

Notice near the end of the file is where the location gets automatically set, based off the file name itself: 

`->setLocation('block', '==', 'acf/'.$path);`

2. Inside `partials/blocks`, create a `/custom-block/` *folder*. 

3. Since the ACF Group name matches the block folder name. the fields will be automatically attributed to this block.

**That's it!** You're ready to start building with ACF Builder/ACF Blocks.
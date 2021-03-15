## Chee Studio: Startup Theme - Blocks

[chee.studio](https://cheewebdevelopment.com)


### Setup gulpfile.js

**Note:** Both NodeJS and NPM are required to be installed in order to run the commands below.

1. In root of the theme folder, run `npm install` to install needed packages to run gulp
2. Set `PROJECT_NAME` variable to the folder name of your localhost install
3. If localhost is not being used, set `DEVELOPER_MODE` to `false` to disable BrowserSync refresh
4. Once packages are installed and `gulpfile.js` is setup, run `gulp`
5. File watching is enabled as long as gulp is running

### Compile Styles & JS

**Note:** `.scss` files are found in `assets/scss/`

1. The `core` folder is loaded in a specific order controlled by `main.scss`. Any additional files added to the `core` folder will need to be manually added to `main.scss` or they will not be included when compiled
2. All other `.scss` files found in other folders, such as `elements, layout, pages` are automatically included when compiled and do not need to be added to `main.scss`
3. All `.scss` files will compile to `style.css` (easy to read format for dev only) and `style.min.css`
4. All `.js` files from `assets/js/src/` compile to `all.min.js`





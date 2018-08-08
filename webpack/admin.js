const mix = require('laravel-mix');
const webpack = require('webpack');
const { resolve } = require('path');
const { plugins, postCss } = require('./common');
const { globify } = require('./helpers');

// Load Javascript
globify('js/admin/pages/*.js', 'assets/pages', 'js');

// Load Sass
globify('sass/admin/core.scss', 'assets', 'sass');
globify('sass/admin/pages/*.scss', 'assets/pages', 'sass');
globify('codebase/scss/codebase/themes/*.scss', 'assets/pages/themes', 'sass');

// Load Plugins
mix.autoload({
  jquery: ['$', 'jQuery', 'window.jQuery'],
  'popper.js/dist/umd/popper.js': ['Popper']
});

// Copy files
mix.copyDirectory('resources/assets/images/admin/static', 'public/admin/assets/images/static');

// Other Options
mix.setPublicPath('public/admin/')
  .setResourceRoot('/admin/')
  .webpackConfig({
  resolve: {
    alias: {
      codebase: resolve(process.cwd(), 'resources/assets/codebase/js/codebase.js'),
      common: resolve(process.cwd(), 'resources/assets/js/common'),
      'lodash-es': 'lodash'
    }
  },
  plugins: [
    ...plugins,
    new webpack.optimize.CommonsChunkPlugin({
      // The order of this array matters
      names: ['assets/common'],
      minChunks: 2
    }),
    new webpack.optimize.CommonsChunkPlugin({
      name: 'assets/manifest',
      minChunks: Infinity,
    })
  ],
}).options({
  fileLoaderDirs: {
    images: 'assets/images',
    fonts: 'assets/fonts'
  },
  postCss: [
    ...postCss
  ]
}).version();

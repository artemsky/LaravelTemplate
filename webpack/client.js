const mix = require('laravel-mix');
const webpack = require('webpack');
const { plugins, postCss } = require('./common');
const { resolve } = require('path');
const { globify } = require('./helpers');

// Load Javascript
globify('js/client/pages/*.js', 'assets/pages', 'js');

// Load Sass
globify('sass/client/core.scss', 'assets', 'sass');
globify('sass/client/pages/*.scss', 'assets/pages', 'sass');

// Load Plugins
mix.autoload({
  jquery: ['$', 'jQuery', 'window.jQuery'],
  'popper.js/dist/umd/popper.js': ['Popper']
});

// Copy files
mix.copyDirectory('resources/assets/images/client/static', 'public/client/assets/images/static');

// Other Options
mix.setPublicPath('public/client/')
  .setResourceRoot('/client/')
  .webpackConfig({
    resolve: {
      alias: {
        'lodash-es': 'lodash',
        common: resolve(process.cwd(), 'resources/assets/js/common'),
      }
    },
    plugins: [
      ...plugins,
      new webpack.optimize.CommonsChunkPlugin({
        // The order of this array matters
        names: ["assets/common"],
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

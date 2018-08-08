const { resolve } = require('path');

// Minimal Webpack config to supply to Eslint.
// the resolve and loader rules.
module.exports = {
  resolve: {
    extensions: ['.js', '.vue'],
    alias: {
      codebase: resolve(process.cwd(), 'resources/assets/codebase/js/codebase.js'),
      common: resolve(process.cwd(), 'resources/assets/js/common'),
      // your aliases go here.
    },
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader',
      },
      {
        test: /\.vue$/,
        exclude: /node_modules/,
        loader: 'vue-loader',
      },
    ],
  },
};

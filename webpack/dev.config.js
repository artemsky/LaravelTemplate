const mix = require('laravel-mix');
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const formatter = require('eslint-friendly-formatter');

const config = {
  module: {
    rules: [
      {
        test: /\.(js|vue)$/,
        loader: 'eslint-loader',
        exclude: /(node_modules|bower_components)/,
        enforce: 'pre',
        options: {
          formatter
        }
      }
    ]
  },
  plugins: []
};

if (process.env.BUNDLE_ANALYZER) {
  config.plugins.push(
    new BundleAnalyzerPlugin({
      openAnalyzer: false
    })
  )
}

mix
  .webpackConfig({
    devtool: 'inline-source-map'
  })
  .sourceMaps();
module.exports = config;

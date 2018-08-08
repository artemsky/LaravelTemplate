// const MomentLocalesPlugin = require('moment-locales-webpack-plugin');

const plugins = [
  // new MomentLocalesPlugin({
  //   localesToKeep: ['ru'],
  // }),
];

const postCss = [
  require('postcss-preset-env')()
];

module.exports = {
  plugins,
  postCss
};
